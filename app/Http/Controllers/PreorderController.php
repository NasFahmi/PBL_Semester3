<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pembeli;
use App\Models\Product;
use App\Models\Preorder;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePreorderRequest;
use App\Http\Requests\UpdatePreorderRequest;

class PreorderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])
        ->where('is_Preorder',1)
        ->search(request('search'))
        ->get();
        // dd($data);
        return view('pages.admin.preorder.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Product::get();
        return view('pages.admin.preorder.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'tanggal' => 'required',
            'product' => 'required',
            'methode_pembayaran' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
             // bisa iya bisa tidak jika iya ada tanggal_dp dan jumlah_dp
            // opsional
            // tanggal_dp
            // jumlah_dp
        ]);

        try {
            DB::beginTransaction();
            $data = $request->all();

            $dataTanggal = $request->tanggal;
            $dateTime = DateTime::createFromFormat('d/m/Y', $dataTanggal);
            $tanggal = $dateTime->format('Y-m-d');

            $totalharga = $request->total;
            $totalHargaTanpaTitik = str_replace(".", "", $totalharga);

            $jumlahDP = $request->jumlah_dp;
            $jumlahDPTanpaTitik = $jumlahDP ? str_replace(".", "", $jumlahDP) : 0;
            
            $dataTanggalDP = $request->tanggal_dp;
            $dateTimeTanggalDp = DateTime::createFromFormat('d/m/Y', strval($dataTanggalDP));
            $tanggalDP = $dateTimeTanggalDp->format('Y-m-d');
            

            $dataPembeli = Pembeli::create([
                "nama" => $data['nama'],
                "email" => $data['email'],
                'alamat' => $data['alamat'],
                "no_hp" => $data['telepon'],
            ]);
            $idPembeli = $dataPembeli->id;

            $dataPreorder = Preorder::create([
                'is_DP' => '1',
                'down_payment' => $jumlahDPTanpaTitik,
                'tanggal_pembayaran_preoreder' => $tanggal,
                'tanggal_pembayaran_down_payment' => $tanggalDP,
            ]);
            $idPreorder = $dataPreorder->id;

            Transaksi::create([
                "tanggal" => $tanggal,
                "pembeli_id" => $idPembeli,
                "product_id" => $data['product'],
                "methode_pembayaran_id" => $data['methode_pembayaran'],
                "jumlah" => $data['jumlah'],
                "total_harga" => $totalHargaTanpaTitik,
                "keterangan" => $data['keterangan'],
                "is_Preorder" => '1',
                "Preorder_id" => $idPreorder,
                "is_complete" => '0',
            ]);
            DB::commit();
            return redirect()->route('preorder.index')->with('success', 'Transaksi has been created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            // return redirect()->back()->with('error', 'Failed to create transaksi data.');

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Preorder $preorder)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($preorder)
    {
        // dd($preorder);
        $data = Product::get();
        $dataTransaksi = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])
            ->findOrFail($preorder);
        return view('pages.admin.preorder.edit', compact('data', 'dataTransaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePreorderRequest $request, Preorder $preorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($preorder)
    {
        try {

            DB::beginTransaction();
            $dataTransaksi = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])
            ->findOrFail($preorder);

            $dataPembeli = $dataTransaksi->pembelis;

            $dataTransaksi->delete();
            $dataPembeli->delete();

            DB::commit();

            return redirect()->route('preorder.index')->with('success', 'Transaksi has been deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            // return redirect()->back()->with('error', 'Failed to delete transaksi data.');
        }
    }
}
