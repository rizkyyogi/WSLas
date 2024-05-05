<!DOCTYPE html>
<html>
<head>
	<title>Laporan Proyek {{$data->nama_proyek}}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Proyek {{$data->nama_proyek}}</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Produk</th>
				<th>Proyek</th>
				<th>Pelanggan</th>
				<th>Telepon</th>
				<th>Lokasi</th>
                <th>Status</th>
				<th>Harga Jual</th>
				<th>Modal</th>
				<th>Laba</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$data->produk->nama_produk}}</td>
				<td>{{$data->nama_proyek}}</td>
				<td>{{$data->nama_pelanggan}}</td>
				<td>{{$data->telp}}</td>
				<td>{{$data->lokasi}}</td>
                <td>{{$data->status}}</td>
				<td>Rp.{{ number_format($data->harga_jual, 0, ',', '.') }}</td>
				<td>Rp.{{ number_format($data->modal, 0, ',', '.') }}</td>
                <td>Rp.{{ number_format($data->keuntungan, 0, ',', '.') }}</td>
			</tr>
		</tbody>
	</table>
 
</body>
</html>





