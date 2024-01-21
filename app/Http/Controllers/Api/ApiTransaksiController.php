<?php

namespace App\Http\Controllers\Api;

use DateTime;
use App\Models\Pembeli;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Events\TransaksiSelesai;
use App\Models\MethodePembayaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResources;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Transaksi::with(['products', 'products.fotos'])
            ->get();
        $transformedData = $data->map(function ($transaksi) {
            return new TransaksiResources($transaksi);
        });
        // dd($transformedData);
        return response()->json(['success' => true, 'data' => $transformedData], 200);
    }
    public function chart()
{
    $startDate = Carbon::now()->subYear()->startOfDay();
    $endDate = Carbon::now()->endOfDay();

    $dataPenjualan = Transaksi::where('is_complete', 1)
        ->whereBetween('tanggal', [$startDate, $endDate])
        ->orderBy('tanggal', 'asc')
        ->selectRaw('DATE_FORMAT(tanggal, "%Y-%m") as month, sum(total_harga) as total_penjualan')
        ->groupBy('month')
        ->pluck('total_penjualan', 'month')
        ->toArray();

    // Create an array to map numeric months to Indonesian month names
    $monthNames = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];

    // Initialize the array with 0 values for each month as strings
    $dataPenjualanWithMonthNames = array_fill_keys(array_values($monthNames), "0");

    // Replace numeric months with Indonesian month names and update values
    foreach ($dataPenjualan as $month => $value) {
        $monthNumber = substr($month, 5, 2); // Extract the month part
        $monthName = $monthNames[$monthNumber] ?? $monthNumber; // Get the Indonesian month name or use the numeric month
        $dataPenjualanWithMonthNames[$monthName] = (string) $value;
    }

    // Extract only the values
    $dataPenjualanValues = array_values($dataPenjualanWithMonthNames);

    // Extract only the keys (months)
    $dataBulan = array_keys($dataPenjualanWithMonthNames);

    return response()->json(
        [
            'success' => true,
            'data' => [
                'data_penjualan' => $dataPenjualanValues,
                'bulan' => $dataBulan,
                'start_date' => $startDate,
                'endDay' => $endDate,
                'tahun' => Carbon::now()->year, // Adding the current year to the response
            ],
        ],
        200
    );
}






    public function chartAsli()
    {
        $startDate = Carbon::now()->subDays(30)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $dataPenjualan = Transaksi::where('is_complete', 1)
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->orderBy('tanggal', 'asc')
            ->selectRaw('tanggal, sum(total_harga) as total_penjualan')
            ->groupBy('tanggal')
            ->pluck('total_penjualan', 'tanggal')
            ->toArray();

        $groupedData = array_chunk($dataPenjualan, 5, true);

        // Separate dates and values within each group and calculate sum
        $separatedGroupedData = [];

        foreach ($groupedData as $group) {
            $dates = array_keys($group);
            $values = array_values($group);
            $sum = array_sum($values); // Calculate the sum

            $separatedGroupedData[] = [
                'dates' => $dates,
                'values' => $values,
                'sum' => $sum, // Include the sum in the result
            ];
        }

        return response()->json(
            [
                'success' => true,
                'data' => [
                    'data_penjualan' => $separatedGroupedData,
                    'start_date' => $startDate,
                    'endDay' => $endDate,
                ],
            ],
            200
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        $request->validated();
        $data = $request->all();
        // return response()->json($data);
        try {
            DB::beginTransaction();
            $data = $request->all();

            $dataTanggal = $request->tanggal;
            $dateTime = DateTime::createFromFormat('m/d/Y', $dataTanggal);
            $tanggal = $dateTime->format('Y-m-d');

            $totalharga = $request->total;
            $totalHargaTanpaTitik = str_replace(".", "", $totalharga);


            $dataPembeli = Pembeli::create([
                "nama" => $data['nama'],
                "email" => $data['email'],
                'alamat' => $data['alamat'],
                "no_hp" => $data['telepon'],
            ]);
            $idPembeli = $dataPembeli->id;
            $dataKeterangan = null;
            if (isset($data['keterangan'])) {
                $dataKeternagan = $data['keterangan'];
            }

            $dataProduct = Product::find($data['product']);
            $dataMethodePembayaran = MethodePembayaran::find($data['methode_pembayaran']);
            // return response()->json([
            //     'product_id' => $data['product'],
            //     'methode_pembayaran_id' => $data['methode_pembayaran'],
            //     'product' => $dataProduct,
            //     'methode_pembayaran' => $dataMethodePembayaran
            // ]);

            $transaksi = Transaksi::create([
                "tanggal" => $tanggal,
                "pembeli_id" => $idPembeli,
                "product_id" => $data['product'],
                "methode_pembayaran_id" => $data['methode_pembayaran'],
                "jumlah" => $data['jumlah'],
                "total_harga" => $totalHargaTanpaTitik,
                "keterangan" => $dataKeterangan,
                "is_Preorder" => '0',
                "Preorder_id" => null,
                "is_complete" => filter_var($data['is_complete'], FILTER_VALIDATE_BOOLEAN),

            ]);
            if ($transaksi->is_complete == 1) {
                event(new TransaksiSelesai($transaksi->id));
            }
            DB::commit();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Transaction has been created',
                    'data' => [
                        'tangal' => $tanggal,

                        'product' => $dataProduct,
                        'methode_pembauaran' => $dataMethodePembayaran,
                        'jumlah' => $data['jumlah'],
                        'total_harga' => $totalHargaTanpaTitik,
                        'is_complete' => $data['is_complete'],
                        'pembeli' => $dataPembeli,
                    ]
                ],
                200
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            // return redirect()->back()->with('error', 'Failed to create transaksi data.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])->find($id);
            $transformedData = new TransaksiResources($data);
            return response()->json(
                [
                    'success' => true,
                    'data' => $transformedData
                ],
                200
            );
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Transaksi not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        $request->validated();
        // $data = $request->all();
        try {
            DB::beginTransaction();
            $dataInput = $request->all();

            $dataPembeli = [
                "nama" => $dataInput['nama'],
                "email" => $dataInput['email'],
                'alamat' => $dataInput['alamat'],
                "no_hp" => $dataInput['telepon'],
            ];

            $transaksi->pembelis->update($dataPembeli);


            $totalharga = $request->input('total');
            $totalHargaTanpaTitik = str_replace(".", "", $totalharga);

            $dataTransaksi = [
                "product_id" => $dataInput['product'],
                "methode_pembayaran_id" => $dataInput['methode_pembayaran'],
                "jumlah" => $dataInput['jumlah'],
                "total_harga" => $totalHargaTanpaTitik,
                "keterangan" => $dataInput['keterangan'],
                "is_Preorder" => '0',
                "Preorder_id" => null,
                "is_complete" => $dataInput['is_complete'],
            ];

            $dataProduct = Product::find($dataInput['product']);
            $dataMethodePembayaran = MethodePembayaran::find($dataInput['methode_pembayaran']);

            $transaksi->update($dataTransaksi);

            if ($transaksi->is_complete == 1) {
                event(new TransaksiSelesai($transaksi->id));
            }
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi has been updated successfully',
                'data' => [
                    "nama" => $dataInput['nama'],
                    "email" => $dataInput['email'],
                    'alamat' => $dataInput['alamat'],
                    "no_hp" => $dataInput['telepon'],
                    'product' => $dataProduct,
                    'methode_pembauaran' => $dataMethodePembayaran,
                    'jumlah' => $dataInput['jumlah'],
                    'total_harga' => $totalHargaTanpaTitik,
                    'is_complete' => $dataInput['is_complete'],
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            // throw $th;
            return response()->json(
                [
                    'success' => false,
                    'message' => 'something went wrong',
                ],
                404
            );
            // return redirect()->back()->with('error', 'Failed to update transaksi data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Transaksi::with(['pembelis', 'products', 'methode_pembayaran', 'preorders'])->find($id);
            if (!$data) {
                return response()->json(['success' => false, 'message' => 'Product not found'], 404);
            }
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Transaksi has deleted']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong'], 404);
        }
    }
}
