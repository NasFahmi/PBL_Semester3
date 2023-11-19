<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

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
        
        return view('pages.admin.dashboard', compact('data', 'totalPendapatan', 'totalProductTerjual', 'totalPreorder', 'dataJumlahOrder'));
    }


}
