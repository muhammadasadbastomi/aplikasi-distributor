<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h4,
        h2 {
            font-family: serif;
        }

        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }

        br {
            margin-bottom: 5px !important;
        }

        .judul {
            text-align: center;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 110px;
            padding: 0px;
        }

        .pemko {
            margin-top: -50px !important;
            width: 100%;
            height: 180px;
        }

        .logo {
            float: left;
            margin-right: 0px;
            width: 18%;
            padding: 0px;
            text-align: right;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 72%;
            padding-left: 0px;
            padding-right: 10%;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
            width: 100%;
        }

        .ttd {
            margin-left: 65%;
            text-align: center;
            text-transform: uppercase;
        }

        .text-right {
            text-align: right;
        }

        .isi {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="ART.png">
        </div>
        <div class="headtext">
            <h2 style="margin:0px;">PT. PULAU BARU JAYA </h2>
            <h3 style="margin:0px;">KECAMATAN BANJARMASIN TIMUR </h3>
            <p style="margin:0px;">Jl. A.Yani Km 5.5 No.56, Pemurus Luar, Banjarmasin Timur, Kota Banjarmasin, Kalimantan Selatan 70238
            </p>
        </div>
        <br>
    </div>
    <div class="container">
        <hr style="margin-top:1px;">
        <div class="isi">
            <h2 style="text-align:center;">LAPORAN DATA PENGIRIMAN/PERJALANAN SOPIR</h2>
            <br>
            <table id="myTable" class="table table-bordered table-striped dataTable no-footer text-center" style="font-size: 10px !important; " role="grid"
                aria-describedby="myTable_info">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Supir</th>
                        <th>Biaya Pengiriman (makan,minum dll)</th>
                        <th>Alamat Pengiriman</th>
                        <th>Status Verifikasi</th>
                        {{-- <th>Kode Binbox</th> --}}
                        {{-- <th>Keterangan</th> --}}
                        <!-- <th>No</th>
                        <th>No</th>
                        <th>No</th>
                        <th>No</th> -->
                    </tr>
                </thead>
                 <tbody >
                     @foreach($data as $d)
                     <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$d->user->nama}}</td>
                         <td>@currency($d->biaya)
                             </td>
                         <td>{{$d->alamat}}</td>
                         
                         <td>
                             @if ($d->status == 0)
                                 Menunggu verifikasi manager
                                 @else
                                 Sudah diverifikasi
                                     
                                 @endif
                         </td>
                     </tr>
                     @endforeach
                 </tbody>
              
            </table>
            <br>
            <br>
            <div class="ttd">
                <p style="margin:0px"> Banjarmasin, {{$now}}</p>
                <h6 style="margin:0px">Mengetahui</h6>
                <h5 style="margin:0px">Manager</h5>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">{{$ttdName}}</h5>
                {{-- <h5 style="margin:0px">NIP. 19710830 199101 1 002</h5> --}}
            </div>
        </div>
    </div>
</body>

</html>