<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Preorder;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexDashboard()
    {
        $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])->get();
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

        $preorderRecently = Preorder::latest()->limit(3)->get();
        $productRecently = Product::with('fotos', 'transaksis')
            ->latest()->limit(5)->get();

        $foto = Foto::join('transaksis', 'fotos.product_id', '=', 'transaksis.product_id')
            ->where('transaksis.is_complete', 0)
            ->select('fotos.product_id', DB::raw('MAX(fotos.id) as id'), DB::raw('MAX(fotos.foto) as foto'))
            ->groupBy('fotos.product_id')
            ->get();

        $dataPenjualan = $data->where('is_complete', 1)
            ->pluck('total_harga');
        $tanggalPenjualan = $data->where('is_complete', 1)
            ->pluck('created_at');
        $dates = $tanggalPenjualan->map(function ($dateString) {
            return Carbon::parse($dateString);
        });

        // Format the dates as desired (e.g., "2023-12-03 10:39:37" will be converted to "3 December 2023")
        $formattedDates = $dates->map(function ($date) {
            return $date->format('j F Y H:i:s');
        });

        // Print the results

        // dd($salesData);
        return view('pages.admin.dashboard', compact(
            'data',
            'totalPendapatan',
            'totalProductTerjual',
            'totalPreorder',
            'dataJumlahOrder',
            'topSalesProducts',
            'preorderRecently',
            'namaPembeli',
            'foto',
            'productRecently',
            'dataPenjualan',
            'formattedDates'
        ));
    }

}
