<?php

namespace App\Http\Controllers\Api;
use DateTime;
use App\Models\Pembeli;
use App\Models\Product;
use App\Models\Preorder;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\MethodePembayaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResources;
use App\Http\Requests\StorePreorderRequest;

class ApiPreorderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])
        ->where('is_Preorder',1)
        ->get();
        $transformedData = $data->map(function ($transaksi) {
            return new TransaksiResources($transaksi);
        });
        return response()->json(['success' => true, 'data' => $transformedData], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePreorderRequest $request)
    {
        $request->validated();

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
            $dataProduct = Product::find($data['product']);
            $dataMethodePembayaran = MethodePembayaran::find($data['methode_pembayaran']);
            DB::commit();
            return response()->json(
                [
                    'success'=>true,
                    'message'=>'Preorder has been created',
                    'data'=>[
                        'id'=>$idPreorder,
                        "tanggal" => $tanggal,
                        "product" => $dataProduct,
                        "methode_pembayaran" => $dataMethodePembayaran,
                        "jumlah" => $data['jumlah'],
                        "total_harga" => $totalHargaTanpaTitik,
                        "keterangan" => $data['keterangan'],
                        "is_Preorder" => '1',
                        "Preorder_id" => $idPreorder,
                        'is_DP' => '1',
                        'down_payment' => $jumlahDPTanpaTitik,
                        'tanggal_pembayaran_preoreder' => $tanggal,
                        'tanggal_pembayaran_down_payment' => $tanggalDP,
                        "is_complete" => '0',
                        "pembeli" => $dataPembeli
                    ]
                ]
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return response()->json(['succes'=>false,'message'=>'Something Went Wrong']);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Preorder $preorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Preorder $preorder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            DB::beginTransaction();
            $dataTransaksi = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])
            ->where('is_Preorder',1)
            ->find($id);
            
            $dataPembeli = $dataTransaksi->pembelis;

            $dataTransaksi->delete();
            $dataPembeli->delete();

            DB::commit();
            return response()->json(
                [
                    'succes'=>true,
                    'message'=>'Preorder has been deleted',
                ]
            );
            // return redirect()->route('preorder.index')->with('success', 'Transaksi has been deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return response()->json(['success' => false, 'message' => 'Preorder has been deleted'], 404);
            // return redirect()->back()->with('error', 'Failed to delete transaksi data.');
        }
    }
}
