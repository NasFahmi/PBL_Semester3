<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Varian;
use App\Models\BeratJenis;
use App\Models\Foto;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->get();
        return view('pages.admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        dd($request->all());
        $this->validate($request, [
            'nama_product' => 'required',
            'harga_rendah' => 'required',
            'harga_tinggi' => 'required',
            'deskripsi' => 'required',
            'link_shopee' => 'required',
            'stok' => 'required',
            'spesifikasi_product' => 'required',

        ]);
        $request->session()->put('product_data', [
            'nama_product' => $request->input('nama_product'),
            'harga_rendah' => $request->input('harga_rendah'),
            'harga_tinggi' => $request->input('harga_tinggi'),
            'deskripsi' => $request->input('deskripsi'),
            'link_shopee' => $request->input('link_shopee'),
            'stok' => $request->input('stok'),
            'spesifikasi_product' => $request->input('spesifikasi_product'),
        ]);
        $request->session()->put('berat_jenis',[
            'berat_jenis' => $request->input('berat_jenis')
        ]);
        $request->session()->put('varian',[
            'varian' => $request->input('varian'),
        ]);
        return redirect()->route('product.storeImage');
    }

    public function storeImage(StoreProductRequest $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->time(). $extension;
        $path = $request->file('image')->storeAs('images/product', $filename);

        $request->session()->put('image_data', [
            'image' => $filename
        ]);
        return redirect()->route('product.finalStore');
    }
    public function finalStore(Request $request)
    {
        DB::beginTransaction();

        try{
            $productData = $request->session()->get('product_data');
            $product = Product::create($productData);
            $productID = $product->id;
            $beratJenis = $request->session()->get('berat_jenis');
            $varian = $request->session()->get('varian');
            $image = $request->session()->get('image_data');
            BeratJenis::create([
                $beratJenis,
                'product_id' => $productID
            ]);
            Varian::create([
                $varian,
                'product_id' => $productID
            ]);
            Foto::create([
                $image,
                'product_id' => $productID
            ]);
            DB::commit();

        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            DB::rollBack();

            // Handle kesalahan sesuai kebutuhan Anda, misalnya:
            return redirect()->back()->with('error', 'Gagal menyimpan data Product.');
        }
        $request->session()->forget(['product_data','berat_jenis','varian','image_data']);
        return redirect()->route('product.index')->with(['succes','Data Berhasil Disimpan']);
    }

    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
