<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResources;
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
    public function store(Request $request)
    {
        
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
