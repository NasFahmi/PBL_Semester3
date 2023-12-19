<?php

namespace App\Http\Controllers;

use App\Models\HistoryProduct;
use DateTime;
use App\Models\Pembeli;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Events\TransaksiSelesai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // TransaksiController.php
    public function index()
    {
        $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran'])
            ->search(request('search'))
            ->get();
            // dd($data);
        return view('pages.admin.transaksi.index', compact('data'));
    }

    public function cetakTransaksi()
    {
        $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran'])
            ->where('is_complete', 1)
            ->get();
        return view('pages.admin.transaksi.cetak', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Product::get();
        $dataHistory = HistoryProduct::get();
        // dd($data);
        return view('pages.admin.transaksi.create', compact('data', 'dataHistory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'product' => 'required',
            'methode_pembayaran' => 'required',
            'jumlah' => 'required',
            // 'total' => 'required',
            'is_complete' => 'required',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors() ); // Mencetak pesan kesalahan
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd($request->all());
        try {
            DB::beginTransaction();
            $data = $request->all();
            // dd($data);
            $dataTanggal = $request->tanggal;
            $dateTime = Carbon::parse($dataTanggal, 'Asia/Jakarta'); // Ganti 'Asia/Jakarta' sesuai dengan timezone yang sesuai
            $tanggal = $dateTime->format('Y-m-d');
            // dd($tanggal);
            $totalharga = $request->total;
            $totalHargaTanpaTitik = str_replace(".", "", $totalharga);

            $dataKeterangan = null;
            if (isset($data['keterangan'])) {
                $dataKeterangan = $data['keterangan'];
            }

            // dd($totalharga);
            $transaksi = Transaksi::create([
                "tanggal" => $tanggal,
                "product_id" => $data['product'],
                "methode_pembayaran_id" => $data['methode_pembayaran'],
                "jumlah" => $data['jumlah'],
                "total_harga" => $totalHargaTanpaTitik,
                "keterangan" => $dataKeterangan,
                "is_Preorder" => '0',
                "Preorder_id" => null,
                "is_complete" => $data['is_complete'],
            ]);


            if ($transaksi->is_complete == 1) {
                event(new TransaksiSelesai($transaksi->id));
            }


            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi has been created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', 'Failed to create transaksi data.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {

        $data = Transaksi::with(['products', 'methode_pembayaran', 'preorders'])
            ->findOrFail($transaksi->id);
        // dd($data->methode_pembayaran->methode_pembayaran);

        // dd($data); // Uncomment this line for debugging
        return view('pages.admin.transaksi.detail', compact('data'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $data = Product::get();
        $dataTransaksi = Transaksi::with(['products', 'methode_pembayaran', 'preorders'])
            ->findOrFail($transaksi->id);
        return view('pages.admin.transaksi.edit', compact('data', 'dataTransaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {

        try {
            DB::beginTransaction();
            $dataInput = $request->all();
            // dd($request->all());
            // Update Pembeli information


            $dataTransaksi = [
                "is_Preorder" => '0',
                "Preorder_id" => null,
                "is_complete" => $dataInput['is_complete'],
            ];

            $transaksi->update($dataTransaksi);

            if ($transaksi->is_complete == 1) {
                event(new TransaksiSelesai($transaksi->id));
            }
            DB::commit();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi has been updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', 'Failed to update transaksi data.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        try {
            DB::beginTransaction();

            $transaksi->delete();

            DB::commit();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi has been deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return redirect()->back()->with('error', 'Failed to delete transaksi data.');
        }
    }

    public function cetakForm()
    {
        return view('pages.admin.transaksi.cetak-transaksi-form');
    }
}
