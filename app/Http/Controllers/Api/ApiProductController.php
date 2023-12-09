<?php

namespace App\Http\Controllers\Api;

use App\Models\Foto;
use App\Models\Varian;
use App\Models\Product;
use App\Models\BeratJenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResources;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->get();
        $transformedData = $data->map(function ($product) {
            return new ProductResources($product);
        });

        return response()->json(['success' => true, 'data' => $transformedData], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {   
        // $data = $request->validated();
        $data = $request->all();
        dd($data);
        try {
            DB::beginTransaction();
            $product = Product::create([
                'nama_product' =>$data['nama_product'],
                'harga_rendah'=>$data['harga_rendah'],
                'harga_tinggi'=>$data['harga_tinggi'],
                'deskripsi'=>$data['deskripsi'],
                'link_shopee'=>$data['link_shopee'],
                'stok'=>$data['stok'],
                'spesifikasi_product'=>$data['spesifikasi_product'],
            ]);
            $productID = $product->id;
            $varians= $data['varian'];

            foreach ($varians as $varian) {
                Varian::create([
                    'jenis_varian' => $varian,
                    'product_id' => $productID,
                ]);
            }

            $beratJenis = $data['beratjenis'];

            foreach ($beratJenis as $berat) {
                BeratJenis::create([
                    "berat_jenis" => $berat,
                    "product_id" => $productID
                ]);
            }

            // Proses setiap file yang diunggah
            $images = [];
            foreach ($request->file('image') as $file) {
                $img = $file->store("images");
                $images[] = $img;
            }

            // Simpan informasi gambar ke dalam tabel Foto
            foreach ($images as $image) {
                Foto::create([
                    'foto' => $image,
                    'product_id' => $productID
                ]);
            }

            DB::commit();

            $request->session()->forget(['product_data', 'berat_jenis', 'varian', 'image_data']);
            return redirect()->route('product.index')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            DB::rollBack();
            // throw $e;
            // dd('gagal ');
            // Handle kesalahan sesuai kebutuhan Anda, misalnya:
            return redirect()->back()->with('error', 'Gagal menyimpan data Product.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($id);
            $transformedData = new ProductResources($data);
            return response()->json(['success' => true, 'data' => $transformedData]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($id);
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Product has deleted']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong'], 404);
        }
    }
}
