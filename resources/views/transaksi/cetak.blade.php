<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
<style type="text/css">
                        table tr td,
                        table tr th{
                            font-size: 9pt;
                        }
                    </style>
                    <center>
                        <h5>Laporan Laundry</h4>
                    </center>

                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>id_transaksi</th>
                                <th>Nama</th>
                                <th>Jenis Cucian</th>
                                <th>Tipe Laundry</th>
                                <th>Jenis Pencuci</th>
                                <th>Berat Cucian</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @foreach($transaksi as $row)
                            <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->id_transaksi }}</td>
                            <td>{{ $row->user->nama }}</td>
                            <td>{{ $row->jenis_cucian->jenis_cucian }}</td>
                            <td>{{ $row->tipe_laundry->tipe_laundry }}</td>
                            <td>{{ $row->jenis_pencuci->jenis_pencuci }}</td>
                            <td>{{ $row->berat_cucian}}</td>
                            <td>Rp{{ number_format(($row->berat_cucian * $row->jenis_cucian->harga) + ($row->berat_cucian * $row->tipe_laundry->harga) + ($row->berat_cucian * $row->jenis_pencuci->harga)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
</body>
</html>