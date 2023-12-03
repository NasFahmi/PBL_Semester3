<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pembeli;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // TransaksiController.php
    public function index()
    {
        $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])
            ->where('is_Preorder', 0)
            ->search(request('search'))
            ->get();

        return view('pages.admin.transaksi.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Product::get();
        // dd($data);
        return view('pages.admin.transaksi.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'product' => 'required',
            'methode_pembayaran' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'is_complete' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',

        ]);

        // dd($request->all());
        try {
            DB::beginTransaction();
            $data = $request->all();

            $dataTanggal = $request->tanggal;
            $dateTime = DateTime::createFromFormat('d/m/Y', $dataTanggal);
            $tanggal = $dateTime->format('Y-m-d');

            $totalharga = $request->total;
            $totalHargaTanpaTitik = str_replace(".", "", $totalharga);


            $dataPembeli = Pembeli::create([
                "nama" => $data['nama'],
                "email" => $data['email'],
                'alamat' => $data['alamat'],
                "no_hp" => $data['telepon'],
            ]);
            $idPembeli = $dataPembeli->id;

            Transaksi::create([
                "tanggal" => $tanggal,
                "pembeli_id" => $idPembeli,
                "product_id" => $data['product'],
                "methode_pembayaran_id" => $data['methode_pembayaran'],
                "jumlah" => $data['jumlah'],
                "total_harga" => $totalHargaTanpaTitik,
                "keterangan" => $data['keterangan'],
                "is_Preorder" => '0',
                "Preorder_id" => null,
                "is_complete" => $data['is_complete'],
            ]);
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

        $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])
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
        $dataTransaksi = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])
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
        $this->validate($request, [
            'product' => 'required',
            'methode_pembayaran' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'is_complete' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $dataInput = $request->all();
            // dd($request->all());
            // Update Pembeli information
            $dataPembeli = [
                "nama" => $dataInput['nama'],
                "email" => $dataInput['email'],
                'alamat' => $dataInput['alamat'],
                "no_hp" => $dataInput['telepon'],
            ];

            $transaksi->pembelis->update($dataPembeli);


            $totalharga = $request->input('total');
            $totalHargaTanpaTitik = str_replace(".", "", $totalharga);

            $dataTransaksi = [
                "product_id" => $dataInput['product'],
                "methode_pembayaran_id" => $dataInput['methode_pembayaran'],
                "jumlah" => $dataInput['jumlah'],
                "total_harga" => $totalHargaTanpaTitik,
                "keterangan" => $dataInput['keterangan'],
                "is_Preorder" => '0',
                "Preorder_id" => null,
                "is_complete" => $dataInput['is_complete'],
            ];

            $transaksi->update($dataTransaksi);

            DB::commit();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi has been updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            // return redirect()->back()->with('error', 'Failed to update transaksi data.');
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
            throw $th;
            // return redirect()->back()->with('error', 'Failed to delete transaksi data.');
        }
    }
}
