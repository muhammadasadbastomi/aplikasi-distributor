<?php

namespace App\Http\Controllers;


use PDF;
use Carbon\Carbon;
use App\Models\Rak;
use App\Models\Stok;
use App\Models\User;
use App\Models\Retur;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Models\PenjualanSales;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now()->translatedFormat('d F Y');

        $this->ttdName = 'Pramudya Ananda';
    }
    public function kegiatanIndex()
    {
        return view('admin.report.kegiatanIndex');
    }
    public function userAll()
    {
        $data = User::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.user.report.userAll', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.user.report.userAll', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua User.pdf');
    }

    public function barangAll()
    {
        $data = Barang::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.barang.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.barang.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Barang.pdf');
    }

    public function rakAll()
    {
        $data = Rak::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.rak.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.rak.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Rak.pdf');
    }

    public function returAll()
    {
        $data = Retur::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.retur.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.retur.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Retur.pdf');
    }

    public function pengirimanAll()
    {
        $data = Pengiriman::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.pengiriman.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.pengiriman.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Retur.pdf');
    }

    public function stokAll()
    {
        $data = Stok::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.stok.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $apdf = PDF::loadView('admin.stok.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Stok.pdf');
    }

    public function targetPenjualan()
    {
        $data = PenjualanSales::all();
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.penjualan.report.target', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.penjualan.report.target', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Target Penjualan.pdf');
    }

    public function barangLaku()
    {
        $data = PenjualanSales::all();
        $data = $data->sortByDesc('jumlah')->first();
        // dd($data);
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.penjualan.report.barangLaku', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.penjualan.report.barangLaku', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Barang Paling Laku.pdf');
    }

    public function stokLow()
    {
        $data = Stok::where('stok', '<', 5)->get();
        $now = $this->now;
        $ttdName = $this->ttdName;

        return view('admin.stok.report.low', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.stok.report.low', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Stok Menipis.pdf');
    }

    public function pembelianAll()
    {
        $data = Pembelian::all();

        $data->map(function ($item) {
            $item['span'] = $item->pembelian_detail->count() + 1;
            $item->pembelian_detail->map(function ($i) {
                $harga = $i->hargaBeli * $i->jumlah;
                $i['hargaTotal'] = $harga;
            });
            $item['total'] = $item->pembelian_detail->sum('hargaTotal');
            return $item;
        });
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.pembelian.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.pembelian.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Pembelian.pdf');
    }

    public function penjualanAll()
    {
        $data = Penjualan::all();

        $data->map(function ($item) {
            $item['span'] = $item->penjualan_detail->count() + 1;
            $item->penjualan_detail->map(function ($i) {
                // dd($i);
                $harga = $i->hargaJual * $i->jumlah;
                $i['hargaTotal'] = $harga;
                return $i;
            });
            $item['total'] =  $item->penjualan_detail->sum('hargaTotal');
            return $item;
        });
        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.penjualan.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.penjualan.report.all', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Penjualan.pdf');
    }


    public function penjualanDate(Request $req)
    {
        $year = $req->year;
        $month = $req->month;
        if (!$month) {
            $data = Penjualan::whereYear('created_at', $year)->get();
            $month = NULL;
        } else {
            $data = Penjualan::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
            $month = strtoupper(Carbon::parse('01-' . $month . '-' . $year)->translatedFormat('F'));
            // dd($month);
        }

        $data->map(function ($item) {
            $item['span'] = $item->penjualan_detail->count() + 1;
            $item->penjualan_detail->map(function ($i) {
                // dd($i);
                $harga = $i->hargaJual * $i->jumlah;
                $i['hargaTotal'] = $harga;
                return $i;
            });
            $item['total'] =  $item->penjualan_detail->sum('hargaTotal');
            return $item;
        });



        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.penjualan.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.kendaraanSekda.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kendaraan Sekda Filter.pdf');
    }

    public function penjualanDay(Request $req)
    {
        $tanggal = $req->tanggal;
        $data = Penjualan::whereDate('tanggalPenjualan', $tanggal)->get();
        // $month = $req->month;
        // if (!$month) {
        //     $month = NULL;
        // } else {
        //     $data = Penjualan::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        //     $month = strtoupper(Carbon::parse('01-' . $month . '-' . $year)->translatedFormat('F'));
        //     // dd($month);
        // }
        $data->map(function ($item) {
            $item['span'] = $item->penjualan_detail->count() + 1;
            $item->penjualan_detail->map(function ($i) {
                // dd($i);
                $harga = $i->hargaJual * $i->jumlah;
                $i['hargaTotal'] = $harga;
                return $i;
            });
            $item['total'] =  $item->penjualan_detail->sum('hargaTotal');
            return $item;
        });



        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.penjualan.report.one', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName, 'tanggal' => $tanggal]);
        // $pdf = PDF::loadView('admin.kendaraanSekda.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kendaraan Sekda Filter.pdf');
    }

    public function returDate(Request $req)
    {
        $year = $req->year;
        $month = $req->month;
        if (!$month) {
            $data = Retur::whereYear('created_at', $year)->get();
            $month = NULL;
        } else {
            $data = Retur::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
            $month = strtoupper(Carbon::parse('01-' . $month . '-' . $year)->translatedFormat('F'));
            // dd($month);
        }





        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.retur.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.kendaraanSekda.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kendaraan Sekda Filter.pdf');
    }

    public function returDay(Request $req)
    {
        $tanggal = $req->tanggal;
        $data = Retur::whereDate('created_at', $tanggal)->get();
        // $month = $req->month;
        // if (!$month) {
        //     $month = NULL;
        // } else {
        //     $data = Retur::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        //     $month = strtoupper(Carbon::parse('01-' . $month . '-' . $year)->translatedFormat('F'));
        //     // dd($month);
        // }




        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.retur.report.one', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName, 'tanggal' => $tanggal]);
        // $pdf = PDF::loadView('admin.kendaraanSekda.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kendaraan Sekda Filter.pdf');
    }

    public function pembelianDate(Request $req)
    {
        $year = $req->year;
        $month = $req->month;
        if (!$month) {
            $data = Pembelian::whereYear('created_at', $year)->get();
            $month = NULL;
        } else {
            $data = Pembelian::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
            $month = strtoupper(Carbon::parse('01-' . $month . '-' . $year)->translatedFormat('F'));
            // dd($month);
        }
        $data->map(function ($item) {
            $item['span'] = $item->pembelian_detail->count() + 1;
            $item->pembelian_detail->map(function ($i) {
                $harga = $i->hargaBeli * $i->jumlah;
                $i['hargaTotal'] = $harga;
            });
            $item['total'] = $item->pembelian_detail->sum('hargaTotal');
            return $item;
        });



        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.pembelian.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf = PDF::loadView('admin.kendaraanSekda.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kendaraan Sekda Filter.pdf');
    }

    public function pembelianDay(Request $req)
    {
        $tanggal = $req->tanggal;
        $data = Pembelian::whereDate('tanggalPembelian', $tanggal)->get();
        $data->map(function ($item) {
            $item['span'] = $item->pembelian_detail->count() + 1;
            $item->pembelian_detail->map(function ($i) {
                $harga = $i->hargaBeli * $i->jumlah;
                $i['hargaTotal'] = $harga;
            });
            $item['total'] = $item->pembelian_detail->sum('hargaTotal');
            return $item;
        });
        // $month = $req->month;
        // if (!$month) {
        //     $month = NULL;
        // } else {
        //     $data = Pembelian::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        //     $month = strtoupper(Carbon::parse('01-' . $month . '-' . $year)->translatedFormat('F'));
        //     // dd($month);
        // }



        $now = $this->now;
        $ttdName = $this->ttdName;
        return view('admin.pembelian.report.one', ['data' => $data, 'now' => $now, 'ttdName' => $ttdName, 'tanggal' => $tanggal]);
        // $pdf = PDF::loadView('admin.kendaraanSekda.report.all', ['data' => $data, 'year' => $year, 'month' => $month, 'now' => $now, 'ttdName' => $ttdName]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kendaraan Sekda Filter.pdf');
    }

    public function kegiatanYear(Request $request)
    {
        $data = Kegiatan::whereYear('tanggal_kegiatan', '=', $request->year)->get();
        $now = $this->now;
        $year = $request->year;
        return view('admin.report.kegiatanYear', ['data' => $data, 'now' => $now, 'year' => $year]);
        // $pdf = PDF::loadView('admin.report.kegiatanYear', ['data' => $data, 'now' => $now, 'year' => $year]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kegiatan Tahunan.pdf');
    }

    public function kegiatanMonth(Request $request)
    {
        $data = Kegiatan::whereYear('tanggal_kegiatan', '=', $request->year)->whereMonth('tanggal_kegiatan', '=', $request->month)->get();
        $now = $this->now;
        $year = $request->year;
        switch ($request->month) {
            case '01':
                $month = 'Januari';
                break;
            case '02':
                $month = 'Februari';
                break;
            case '03':
                $month = 'Maret';
                break;
            case '04':
                $month = 'April';
                break;
            case '05':
                $month = 'Mei';
                break;
            case '06':
                $month = 'Juni';
                break;
            case '07':
                $month = 'Juli';
                break;
            case '08':
                $month = 'Agustus';
                break;
            case '09':
                $month = 'September';
                break;
            case '10':
                $month = 'Oktober';
                break;
            case '11':
                $month = 'November';
                break;
            case '12':
                $month = 'Desember';
                break;

            default:
                # code...
                break;
        }
        $month = strToUpper($month);
        return view('admin.report.kegiatanMonth', ['data' => $data, 'now' => $now, 'year' => $year, 'month' => $month]);
        // $pdf = PDF::loadView('admin.report.kegiatanMonth', ['data' => $data, 'now' => $now, 'year' => $year, 'month' => $month]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kegiatan Bulanan.pdf');
    }

    public function konflikIndex()
    {
        return view('admin.report.konflikIndex');
    }
    public function konflikAll()
    {
        $data = Konflik::all();
        $now = $this->now;
        return view('admin.report.konflikAll', ['data' => $data, 'now' => $now]);
        // $pdf = PDF::loadView('admin.report.konflikAll', ['data' => $data, 'now' => $now]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Konflik.pdf');
    }

    public function konflikYear(Request $request)
    {
        $data = Konflik::whereYear('tanggal_konflik', '=', $request->year)->get();
        $now = $this->now;
        $year = $request->year;
        return view('admin.report.konflikYear', ['data' => $data, 'now' => $now, 'year' => $year]);
        // $pdf = PDF::loadView('admin.report.konflikYear', ['data' => $data, 'now' => $now, 'year' => $year]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Konflik Tahun.pdf');
    }

    public function konflikMonth(Request $request)
    {
        $data = Konflik::whereYear('tanggal_konflik', '=', $request->year)->whereMonth('tanggal_konflik', '=', $request->month)->get();
        $now = $this->now;
        $year = $request->year;
        switch ($request->month) {
            case '01':
                $month = 'Januari';
                break;
            case '02':
                $month = 'Februari';
                break;
            case '03':
                $month = 'Maret';
                break;
            case '04':
                $month = 'April';
                break;
            case '05':
                $month = 'Mei';
                break;
            case '06':
                $month = 'Juni';
                break;
            case '07':
                $month = 'Juli';
                break;
            case '08':
                $month = 'Agustus';
                break;
            case '09':
                $month = 'September';
                break;
            case '10':
                $month = 'Oktober';
                break;
            case '11':
                $month = 'November';
                break;
            case '12':
                $month = 'Desember';
                break;

            default:
                # code...
                break;
        }
        $month = strToUpper($month);
        return view('admin.report.konflikMonth', ['data' => $data, 'now' => $now, 'year' => $year, 'month' => $month]);
        // $pdf = PDF::loadView('admin.report.konflikMonth', ['data' => $data, 'now' => $now, 'year' => $year, 'month' => $month]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Konflik Bulanan.pdf');
    }

    public function gangguanIndex()
    {
        return view('admin.report.gangguanIndex');
    }
    public function gangguanAll()
    {
        $data = Gangguan::all();
        $now = $this->now;
        return view('admin.report.gangguanAll', ['data' => $data, 'now' => $now]);
        // $pdf = PDF::loadView('admin.report.gangguanAll', ['data' => $data, 'now' => $now]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Gangguan.pdf');
    }

    public function gangguanYear(Request $request)
    {
        $data = Gangguan::whereYear('tanggal_gangguan', '=', $request->year)->get();
        $now = $this->now;
        $year = $request->year;
        return view('admin.report.gangguanYear', ['data' => $data, 'now' => $now, 'year' => $year]);
        // $pdf = PDF::loadView('admin.report.gangguanYear', ['data' => $data, 'now' => $now, 'year' => $year]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Gangguan Tahun.pdf');
    }

    public function gangguanMonth(Request $request)
    {
        $data = Gangguan::whereYear('tanggal_gangguan', '=', $request->year)->whereMonth('tanggal_gangguan', '=', $request->month)->get();
        $now = $this->now;
        $year = $request->year;
        switch ($request->month) {
            case '01':
                $month = 'Januari';
                break;
            case '02':
                $month = 'Februari';
                break;
            case '03':
                $month = 'Maret';
                break;
            case '04':
                $month = 'April';
                break;
            case '05':
                $month = 'Mei';
                break;
            case '06':
                $month = 'Juni';
                break;
            case '07':
                $month = 'Juli';
                break;
            case '08':
                $month = 'Agustus';
                break;
            case '09':
                $month = 'September';
                break;
            case '10':
                $month = 'Oktober';
                break;
            case '11':
                $month = 'November';
                break;
            case '12':
                $month = 'Desember';
                break;

            default:
                # code...
                break;
        }
        $month = strToUpper($month);
        return view('admin.report.gangguanMonth', ['data' => $data, 'now' => $now, 'year' => $year, 'month' => $month]);
        // $pdf = PDF::loadView('admin.report.gangguanMonth', ['data' => $data, 'now' => $now, 'year' => $year, 'month' => $month]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Gangguan Bulanan.pdf');
    }
    public function kriminalIndex()
    {
        return view('admin.report.kriminalIndex');
    }
    public function kriminalAll()
    {
        $data = Kriminal::all();
        $now = $this->now;
        return view('admin.report.kriminalAll', ['data' => $data, 'now' => $now]);
        // $pdf = PDF::loadView('admin.report.kriminalAll', ['data' => $data, 'now' => $now]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Semua Kriminal.pdf');
    }

    public function kriminalYear(Request $request)
    {
        $data = Kriminal::whereYear('tanggal_kejadian', '=', $request->year)->get();
        $now = $this->now;
        $year = $request->year;
        return view('admin.report.kriminalYear', ['data' => $data, 'now' => $now, 'year' => $year]);
        // $pdf = PDF::loadView('admin.report.kriminalYear', ['data' => $data, 'now' => $now, 'year' => $year]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kriminal Tahun.pdf');
    }

    public function kriminalMonth(Request $request)
    {
        $data = Kriminal::whereYear('tanggal_kejadian', '=', $request->year)->whereMonth('tanggal_kejadian', '=', $request->month)->get();
        $now = $this->now;
        $year = $request->year;
        switch ($request->month) {
            case '01':
                $month = 'Januari';
                break;
            case '02':
                $month = 'Februari';
                break;
            case '03':
                $month = 'Maret';
                break;
            case '04':
                $month = 'April';
                break;
            case '05':
                $month = 'Mei';
                break;
            case '06':
                $month = 'Juni';
                break;
            case '07':
                $month = 'Juli';
                break;
            case '08':
                $month = 'Agustus';
                break;
            case '09':
                $month = 'September';
                break;
            case '10':
                $month = 'Oktober';
                break;
            case '11':
                $month = 'November';
                break;
            case '12':
                $month = 'Desember';
                break;

            default:
                # code...
                break;
        }
        $month = strToUpper($month);
        return view('admin.report.kriminalMonth', ['data' => $data, 'now' => $now, 'year' => $year, 'month' => $month]);
        // $pdf = PDF::loadView('admin.report.kriminalMonth', ['data' => $data, 'now' => $now, 'year' => $year, 'month' => $month]);
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Kriminal Bulanan.pdf');
    }

    public function grafik()
    {
        $now = $this->now;

        $konflik = Konflik::all()->count();
        $gangguan = Gangguan::all()->count();
        $kriminal = Kriminal::all()->count();
        return view('admin.report.grafik', compact('now', 'konflik', 'gangguan', 'kriminal'));
        return view('admin.report.grafik', compact('now', 'konflik', 'gangguan', 'kriminal'));
        $pdf = PDF::loadView('admin.report.grafik', compact('now', 'konflik', 'gangguan', 'kriminal'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan Grafik Kejadian.pdf');
    }

    public function petugas()
    {
        $now = $this->now;
        $data = Petugas::all();
        // return view('admin.report.grafik', compact('now', 'konflik', 'gangguan', 'kriminal'));
        return view('admin.report.petugas', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.petugas', compact('now', 'data'));
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Data Petugas.pdf');
    }

    public function camat()
    {
        $now = $this->now;
        $data = Camat::all();
        // return view('admin.report.grafik', compact('now', 'konflik', 'gangguan', 'kriminal'));
        return view('admin.report.camat', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.camat', compact('now', 'data'));
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Data Camat.pdf');
    }

    public function kasi()
    {
        $now = $this->now;
        $data = Kasi::all();
        // return view('admin.report.grafik', compact('now', 'konflik', 'gangguan', 'kriminal'));
        return view('admin.report.kasi', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.kasi', compact('now', 'data'));
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Data Kasi.pdf');
    }

    public function jadwal()
    {
        $now = $this->now;
        $Senin = Jadwal::whereHari('Senin')->get();
        $Selasa = Jadwal::whereHari('Selasa')->get();
        $Rabu = Jadwal::whereHari('Rabu')->get();
        $Kamis = Jadwal::whereHari('Kamis')->get();
        $Jumat = Jadwal::whereHari('Jumat')->get();
        $data = Jadwal::all();
        return view('admin.report.jadwal-petugas', compact('now', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'data'));
        // $pdf = PDF::loadView('admin.report.jadwal-petugas', compact('now', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'data'));
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Data Jadwal Petugas.pdf');
    }

    public function suratIndex()
    {
        $petugas = Petugas::all();
        return view('admin.report.suratIndex', compact('petugas'));
    }
    public function surat(Request $request)
    {
        $now = $this->now;
        $data = Petugas::findOrFail($request->petugas_id);
        return view('admin.report.surat-tugas', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.surat-tugas', compact('now', 'data'));
        // $pdf->setPaper('a4', 'potrait');

        // return $pdf->stream('Laporan Surat Petugas.pdf');
    }

    public function pegawai()
    {
        $now = $this->now;
        $data = Pegawai::all();
        // return view('admin.report.grafik', compact('now', 'konflik', 'gangguan', 'kriminal'));
        return view('admin.report.pegawai', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.pegawai', compact('now', 'data'));
        // $pdf->setPaper('a4', 'landscape');

        // return $pdf->stream('Laporan Data Pegawai.pdf');
    }

    public function baKegiatan($id)
    {
        $now = $this->now;
        $data = Kegiatan::findOrFail($id);
        return view('admin.report.BA-kegiatan', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.BA-kegiatan', compact('now', 'data'));
        // $pdf->setPaper('a4', 'potrait');

        // return $pdf->stream('Berita acara kegiatan.pdf');
    }
    public function baGangguan($id)
    {
        $now = $this->now;
        $data = Gangguan::findOrFail($id);
        return view('admin.report.BA-gangguan', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.BA-gangguan', compact('now', 'data'));
        // $pdf->setPaper('a4', 'potrait');

        // return $pdf->stream('Berita acara gangguan.pdf');
    }
    public function baKriminal($id)
    {
        $now = $this->now;
        $data = Kriminal::findOrFail($id);
        return view('admin.report.BA-kriminal', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.BA-kriminal', compact('now', 'data'));
        // $pdf->setPaper('a4', 'potrait');

        // return $pdf->stream('Berita acara kriminal.pdf');
    }
    public function baKonflik($id)
    {
        $now = $this->now;
        $data = Konflik::findOrFail($id);
        return view('admin.report.BA-konflik', compact('now', 'data'));
        // $pdf = PDF::loadView('admin.report.BA-konflik', compact('now', 'data'));
        // $pdf->setPaper('a4', 'potrait');

        // return $pdf->stream('Berita acara konflik.pdf');
    }
}
