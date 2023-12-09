<?php

namespace App\Http\Controllers\Api;
use App\Models\Preorder;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResources;

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
    public function store(Request $request)
    {
        //
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
    public function destroy(Preorder $preorder)
    {
        //
    }
}
