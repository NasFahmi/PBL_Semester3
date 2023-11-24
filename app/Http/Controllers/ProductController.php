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
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->get();
        return view('pages.admin.product.index', compact('data'));
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
        // dd($request->all());
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
        $request->session()->put('berat_jenis', $request->beratjenis);
        $request->session()->put('varian', $request->varian);
        return redirect()->route('product.storeImage'); //! go to file upload
        // dd(session()->all());
    }

    public function viewstoreImage()
    {
        return view('pages.admin.product.store_image');
    }
    public function viewupdateImage()
    {
        return view('pages.admin.product.update_image');
    }
    public function finalStore(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        // dd('awdw');
        try {
            DB::beginTransaction();
            $productData = $request->session()->get('product_data');
            $product = Product::create($productData);
            $productID = $product->id;

            $varians = $request->session()->get('varian');

            foreach ($varians as $varian) {
                Varian::create([
                    'jenis_varian' => $varian,
                    'product_id' => $productID,
                ]);
            }

            $beratJenis = $request->session()->get('berat_jenis');

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
            dd('berhasil');
            return redirect()->route('product.index')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            DB::rollBack();
            dd('gagal ');
            // Handle kesalahan sesuai kebutuhan Anda, misalnya:
            return redirect()->back()->with('error', 'Gagal menyimpan data Product.');
        }
    }


    public function edit($id)
    {
        $data = Product::with(['varians', 'beratJenis'])->findOrFail($id);
        $berat_jenis = $data->beratJenis;
        return view('pages.admin.product.update', compact('data', 'berat_jenis'));
    }

    public function viewDetail($id)
    {
        $data = Product::with(['fotos', 'varians', 'beratJenis'])->findOrFail($id);
        $berat_jenis = $data->beratJenis;
        return view('pages.admin.product.detail', compact('data', 'berat_jenis'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = Product::with(['varians', 'beratJenis'])->findOrFail($product->id);
        $berat_jenis = $data->beratJenis;
        $request->session()->put('product_data', [
            'nama_product' => $request->input('nama_product'),
            'harga_rendah' => $request->input('harga_rendah'),
            'harga_tinggi' => $request->input('harga_tinggi'),
            'deskripsi' => $request->input('deskripsi'),
            'link_shopee' => $request->input('link_shopee'),
            'stok' => $request->input('stok'),
            'spesifikasi_product' => $request->input('spesifikasi_product'),
        ]);
        $request->session()->put('berat_jenis', $request->beratjenis);
        $request->session()->put('varian', $request->varian);
        return redirect()->route('product.storeImage', compact('data', 'berat_jenis'));
    }
    public function finalUpdate(UpdateProductRequest $request, Product $product)
    {
        DB::beginTransaction();

        try {
            // Update product data
            $product->update([
                'nama_product' => $request->input('nama_product'),
                'harga_rendah' => $request->input('harga_rendah'),
                'harga_tinggi' => $request->input('harga_tinggi'),
                'deskripsi' => $request->input('deskripsi'),
                'link_shopee' => $request->input('link_shopee'),
                'stok' => $request->input('stok'),
                'spesifikasi_product' => $request->input('spesifikasi_product'),
            ]);

            // Update related records
            $product->beratJenis()->update([
                'berat_jenis' => $request->input('berat_jenis'),
            ]);

            $product->varians()->update([
                'varian' => $request->input('varian'),
            ]);

            // Handle image update (if needed)
            if ($request->hasFile('image')) {
                $this->validate($request, [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);

                // Delete existing image (if exists)
                Storage::delete('images/product/' . $product->foto->image);

                // Upload and update new image
                $extension = $request->file('image')->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = $request->file('image')->storeAs('images/product', $filename);

                $product->foto()->update([
                    'image' => $filename,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();

            // Handle the error as needed
            return redirect()->back()->with('error', 'Failed to update product data.');
        }

        return redirect()->route('product.index')->with('success', 'Product has been updated successfully');
    }
    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            // Delete related records
            $product->fotos()->delete();
            $product->varians()->delete();
            $product->beratJenis()->delete();

            // Delete the product itself
            $product->delete();

            DB::commit();
        } catch (\Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();

            // Handle the error as needed
            return redirect()->back()->with('error', 'Failed to delete the product.');
        }

        return redirect()->route('product.index')->with('success', 'Product has been deleted successfully');
    }
}
