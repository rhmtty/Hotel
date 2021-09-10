<style>
table { position: relative; border-collapse:collapse; width: 100%; }
table td { border:1px solid #000; padding: 5px; }
h1,h2,p { margin: 0; text-align: center;}
p { padding-bottom: 15px; margin-bottom: 15px; border-bottom: 8px double #000; }
.title { background: #ccc; }
</style>

<h1>GUEST HOUSE</h1>
<h2>PERUM PERHUTANI</h2>
<p>Jl Rimbamulya No.11 Kartoharjo Madiun, Telp: (021) 0351453094  
<br>www.perhutani-corpu.com</p>
<h2>DATA PELANGGAN</h2>
<br>
<table>
    <tr class="title">
        <td>No KTP</td>
        <td>Nama</td>
        <td>No Telp</td>
        <td>Alamat</td>
    </tr>
    @foreach($pelanggan as $data)
    <tr>
        <td>{{ $data->no_ktp }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->telp }}</td>
        <td>{{ $data->alamat }}</td>
    </tr>    
    @endforeach
</table>
