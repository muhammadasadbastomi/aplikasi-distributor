<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembelian;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        // $kegiatan = Kegiatan::all()->count();
        // $konflik = Konflik::all()->count();
        // $gangguan = Gangguan::all()->count();
        // $kriminal = Kriminal::all()->count();
        $countPembelian =  Pembelian::all()->count();
        $countPenjualan =  Penjualan::all()->count();

        $totalTransaksi = $countPembelian + $countPenjualan;

        $totalUser = User::all()->count();

        $totalPembelian =  $countPembelian;
        $totalPenjualan =  $countPenjualan;

        $Jan = Penjualan::whereMonth('tanggalPenjualan','01')->get()->count();
        $Feb = Penjualan::whereMonth('tanggalPenjualan','02')->get()->count();
        $Mar = Penjualan::whereMonth('tanggalPenjualan','03')->get()->count();
        $Apr = Penjualan::whereMonth('tanggalPenjualan','04')->get()->count();
        $Mei = Penjualan::whereMonth('tanggalPenjualan','05')->get()->count();
        $Jun = Penjualan::whereMonth('tanggalPenjualan','06')->get()->count();
        $Jul = Penjualan::whereMonth('tanggalPenjualan','07')->get()->count();
        $Agu = Penjualan::whereMonth('tanggalPenjualan','08')->get()->count();
        $Sep = Penjualan::whereMonth('tanggalPenjualan','09')->get()->count();
        $Okt = Penjualan::whereMonth('tanggalPenjualan','10')->get()->count();
        $Nov = Penjualan::whereMonth('tanggalPenjualan','11')->get()->count();
        $Des = Penjualan::whereMonth('tanggalPenjualan','12')->get()->count();

        $countJan = Pembelian::whereMonth('tanggalPembelian','01')->get()->count();
        $countFeb = Pembelian::whereMonth('tanggalPembelian','02')->get()->count();
        $countMar = Pembelian::whereMonth('tanggalPembelian','03')->get()->count();
        $countApr = Pembelian::whereMonth('tanggalPembelian','04')->get()->count();
        $countMei = Pembelian::whereMonth('tanggalPembelian','05')->get()->count();
        $countJun = Pembelian::whereMonth('tanggalPembelian','06')->get()->count();
        $countJul = Pembelian::whereMonth('tanggalPembelian','07')->get()->count();
        $countAgu = Pembelian::whereMonth('tanggalPembelian','08')->get()->count();
        $countSep = Pembelian::whereMonth('tanggalPembelian','09')->get()->count();
        $countOkt = Pembelian::whereMonth('tanggalPembelian','10')->get()->count();
        $countNov = Pembelian::whereMonth('tanggalPembelian','11')->get()->count();
        $countDes = Pembelian::whereMonth('tanggalPembelian','12')->get()->count();


        return view('admin.index',compact('totalTransaksi','totalUser','totalPembelian','totalPenjualan'
        ,'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'
        ,'countJan','countFeb','countMar','countApr','countMei','countJun','countJul','countAgu','countSep','countOkt','countNov','countDes'
        )
    );
    }
}
