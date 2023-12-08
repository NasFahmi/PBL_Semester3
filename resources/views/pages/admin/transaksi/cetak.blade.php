<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left: 3% */
            border: 1px solid #543535;
        }
    </style>
    <title> CETAK DATA TRANSAKSI</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Transaksi</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <!-- Data transaksi dapat ditambahkan di sini -->
            <tr>
                <th> No. </th>
                <th> Product </th>
                <th> Pembeli </th>
                <th> Jumlah </th>
                <th> Total Harga </th>
                <th> Tanggal </th>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
