<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Preorder;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexDashboard()
    {
        $data = Transaksi::with(['pembelis','products','methode_pembayaran','preorders'])->get();
        $totalPendapatan = Transaksi::where('is_complete', 1)->sum('total_harga');
        $totalProductTerjual = Transaksi::where('is_complete', 1)->sum('jumlah');
        $totalPreorder = Transaksi::where('is_complete', 0)->sum('is_Preorder');
        $dataJumlahOrder = $data->count();
        $namaPembeli = $data->where('is_complete', 0)
            ->sortByDesc('created_at')
            ->pluck('pembelis.nama');

        $topSalesProducts = Transaksi::where('is_complete', 1)
            ->whereNotNull('product_id')
            ->groupBy('product_id')
            ->select('product_id', DB::raw('SUM(jumlah) as totalJumlah'))
            ->orderByDesc('totalJumlah')
            ->with('products') 
            ->limit(5)
            ->get();


        $preorderRecently = Preorder::latest()
        ->limit(3)
        ->get();
        
        $foto= Foto::join('transaksis', 'fotos.product_id', '=', 'transaksis.product_id')
            ->where('transaksis.is_complete', 0)
            ->select('fotos.product_id', DB::raw('MAX(fotos.id) as id'), DB::raw('MAX(fotos.foto) as foto'))
            ->groupBy('fotos.product_id') 
            ->get();
        // dd($foto);
        return view('pages.admin.dashboard', compact(
            'data', 
            'totalPendapatan',
            'totalProductTerjual',
            'totalPreorder', 
            'dataJumlahOrder',
            'topSalesProducts',
            'preorderRecently',
            'namaPembeli',
            'foto'
    ));
    }


}
