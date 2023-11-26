<?php

namespace App\Http\Controllers;

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
        $data = Transaksi::with(['pembelis','products','methodePembayarans','preorders'])->get();
        $totalPendapatan = Transaksi::where('is_complete', 1)->sum('total_harga');
        $totalProductTerjual = Transaksi::where('is_complete', 1)->sum('jumlah');
        $totalPreorder = Transaksi::where('is_complete', 0)->sum('is_Preorder');
        $dataJumlahOrder = $data->count();
        
        $topSalesProducts = Transaksi::where('is_complete', 1)
            ->groupBy('product_id')
            ->select('product_id', DB::raw('SUM(jumlah) as totalJumlah'))
            ->orderByDesc('totalJumlah')
            ->with('products') // Order in descending order by total quantity
            ->limit(5)
            ->get();
        // dd($data);
        // $topSalesProductsArray = $topSalesProducts->toArray();
        // dd($topSalesProductsArray);

        return view('pages.admin.dashboard', compact('data', 'totalPendapatan', 'totalProductTerjual', 'totalPreorder', 'dataJumlahOrder','topSalesProducts'));
    }


}
