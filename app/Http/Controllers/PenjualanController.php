<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penjualan::all();


        return view('admin.penjualan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now()->format('Ym');
        $noTransaksi = 'SP'.random_int(100000, 999999).$date;
        return view('admin.penjualan.create',compact('noTransaksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjualan = Penjualan::create($request->all());

        return redirect()->route('admin.penjualan.show',$penjualan->id)->withSuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        $penjualanDetail = $penjualan->penjualan_detail->map(function($item){
            $diskon = $item->diskon;
            $harga = $item->hargaJual * $item->jumlah;
            if($diskon){
                $diskonHarga = $harga * $diskon / 100;
                $harga = $harga - $diskonHarga;
            }
            $item['hargaTotal'] = $harga;

            return $item;
        });
        return view('admin.penjualanDetail.index',compact('penjualan','penjualanDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        return view('admin.penjualan.edit',compact('penjualan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $penjualan->update($request->all());
        return redirect()->route('admin.penjualan.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        try {
            $penjualan->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}