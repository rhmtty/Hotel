<title>Laporan Booking</title>
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
<h2>DATA BOOKING {{$data->formatLocalized('%B %Y')}}</h2>
<br>
<table>
    <tr class="title">
        <td>No</td>
        <td>Kamar</td>
        <td>Pelanggan</td>
        <td>Tgl Pesan</td>
        <td>Tgl Check In</td>
        <td>Tgl Check Out</td>
        <td>Lama Menginap</td>
        <td>Total</td>
        <td>Keterangan</td>
        <td>Operator</td>
    </tr>
    @foreach($bookings as $no => $data)
    <tr>
        <td>{{ $no+1 }}</td>
        <td>No. {{ $data->nomer_kamar }}</td>
        <td>{{ $data->nama_pelanggan }}</td>
        <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
        <td>{{ date('d-m-Y', strtotime($data->checkin_time)) }}</td>
        <td>{{ date('d-m-Y', strtotime($data->checkout_time)) }}</td>
        <td>{{ $data->lama_menginap }} Hari</td>
        <td>Rp.{{ number_format($data->total) }}</td>
        <td>{{ $data->keterangan }}</td>
        <td>{{ $data->operator }}</td>

    </tr>    
    @endforeach
</table>
