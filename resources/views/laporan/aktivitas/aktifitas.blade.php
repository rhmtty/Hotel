<title>Laporan Aktivitas</title>
<style>
table { position: relative; border-collapse:collapse; width: 100%; }
table td { border:1px solid #000; padding: 5px; }
h1,h2,p { margin: 0; text-align: center;}
p { padding-bottom: 15px; margin-bottom: 15px; border-bottom: 8px double #000; }
.title { background: #ccc; }
</style>

<h1>GUEST HOUSE EBONI</h1>
<h2>PERUM PERHUTANI</h2>
<p>Jl Rimbamulya No.11 Kartoharjo Madiun, Telp : (021) 0351453094 
<br>www.perhutani-corpu.com</p>
<h2>AKTIFITAS KARYAWAN</h2>
<br>
<table>
    <tr class="title">
        <td>Nama</td>
        <td>Info</td>
        <td>Aktifitas</td>
        <td>Tanggal</td>
    </tr>
    @foreach($aktifitas as $data)
    <tr>
        <td>{{ $data->nama_kary }}</td>
        <td>{{ $data->info_kary }}</td>
        <td>{{ $data->aktivitas }}</td>
        <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
    </tr>    
    @endforeach
</table>
