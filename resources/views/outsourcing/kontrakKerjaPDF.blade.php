<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kontrak</title>
    <style>
        th {
            text-align: left;
            height: 30px;
        }

        td {
            text-align: left;
        }
    </style>
</head>

<body>
    <div style="text-align: center">
        <h4 style="font-size: 25px">{{$kontraks->outsourcing->nama_outsourcing}}</h4>
        <p>{{$kontraks->outsourcing->alamat}}</p>
        <hr>
    </div>
    <div style="text-align: center">
        <h5 style="font-size: 18px">Surat Perjanjian Kontrak Kerja</h5>
        {{-- <p>{{$kontraks->outsourcing->alamat}}</p>
        <hr> --}}
    </div>

    <div style="text-align: left">
        <h5 style="font-size: 15px">Yang bertanda tangan di bawah ini:</h5>
        {{-- <p>{{$kontraks->outsourcing->alamat}}</p>
        <hr> --}}
    </div>
    <table>
        <thead>
            <tr>
                <td width="20px"><strong>Nama Pemilik</strong></td>
                <td width="20px">:</td>
                <td>{{$kontraks->outsourcing->nama_pemilikRekening}}</td>
            </tr>
            <tr>
                <td width="20px"><strong>Pimpinan Mitra</strong></td>
                <td width="20px">:</td>
                <td>{{$kontraks->outsourcing->nama_outsourcing}}</td>
            </tr>
            <tr>
                <td width="20px"><strong>Alamat</strong> </td>
                <td width="20px">:</td>
                <td>{{$kontraks->outsourcing->alamat}} </td>
            </tr>
    </table>

    <div style="text-align: left">
        <p style="font-size: 15px">Dalam hal ini bertindak atas nama direksi {{$kontraks->outsourcing->nama_outsourcing}} yang berkedudukan
            di {{$kontraks->outsourcing->alamat}} dan selanjutnya disebut <b>PIHAK PERTAMA</b>
        </p>
        {{-- <p>{{$kontraks->outsourcing->alamat}}</p>
        <hr> --}}
    </div> <br>

    <table>
        <thead>
            <tr>
                <td width="20px"><strong>Nama Customer</strong></td>
                <td width="20px">:</td>
                <td>{{$kontraks->customer->nama_customer}}</td>
            </tr>
            <tr>
                <td width="20px"><strong>Alamat</strong> </td>
                <td width="20px">:</td>
                <td>{{$kontraks->customer->alamat}} </td>
            </tr>
            <tr>
                <td width="20px"><strong>Nomor Telephone</strong></td>
                <td width="20px">:</td>
                <td>{{$kontraks->customer->no_telp}}</td>
            </tr>
            <tr>
                <td width="20px"><strong>Email</strong> </td>
                <td width="20px">:</td>
                <td>{{$kontraks->customer->email}} </td>
            </tr>
    </table>
    <div style="text-align: left">
        <p style="font-size: 15px">Dalam hal ini bertindak untuk dan atas nama diri pribadi dan selanjutnya
            disebut <b>PIHAK KEDUA</b>
        </p>
    </div>
    <br> <br> <br>
    <div style="text-align: right">
        <p style="font-size: 15px">Indramayu, ... ............. ......</p>
        <p style="font-size: 15px">Yang menyatakan,</p>
        <br> <br> <br> <br>
        <p style="font-size: 15px">(_____________________)</p>

    </div>

</body>

</html>
