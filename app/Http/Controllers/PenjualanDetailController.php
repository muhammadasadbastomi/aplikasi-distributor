<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Rak;
use App\Models\Stok;
use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;

class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $data = PenjualanDetail::all();

    //     return view('admin.penjualanDetail.index',compact('data'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $penjualan =  Penjualan::findOrFail($id);
        $barang = Barang::with('stok')->whereRelation('stok', 'stok', '>', 0)->get();

        $barang->map(function ($item) {
            $item['jumlahStok'] = $item->stok->stok;
            $item['hargaJual'] = $item->stok->hargaJual;
            return $item;
        });
        // $date = Carbon::now()->format('Ym');
        // $noTransaksi = 'RC'.random_int(100000, 999999).$date;
        return view('admin.penjualanDetail.create', compact('penjualan', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();;
        $stok = Stok::whereBarangId($request->barang_id)->first();
        if ($stok->stok < $request->jumlah) {
            return back()->withWarning('Stok tidak mencukupi');
        } else {

            $penjualanDetail = PenjualanDetail::create($input);
            $stok->stok = $stok->stok - $penjualanDetail->jumlah;
            $stok->update();
        }


        return redirect()->route('admin.penjualan.show', $penjualanDetail->penjualan_id)->withSuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenjualanDetail  $penjualanDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanDetail $penjualanDetail)
    {
        return view('admin.penjualanDetail.index', compact('penjualanDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenjualanDetail  $penjualanDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanDetail $penjualanDetail)
    {
        $barang = Barang::with('stok')->whereRelation('stok', 'stok', '>', 0)->get();

        $barang->map(function ($item) {
            $item['jumlahStok'] = $item->stok->stok;
            $item['hargaJual'] = $item->stok->hargaJual;
            return $item;
        });
        return view('admin.penjualanDetail.edit', compact('penjualanDetail', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenjualanDetail  $penjualanDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualanDetail $penjualanDetail)
    {
        $stok = Stok::whereBarangId($penjualanDetail->barang_id)->first();
        $jumlahStok = $stok->stok;

        $input = $request->all();

        if ($stok->stok < $request->jumlah) {
            return back()->withWarning('Stok tidak mencukupi');
        } else {

            $jumlahOld = $penjualanDetail->jumlah;
            $jumlahNew = $request->jumlah;
            if ($jumlahNew < $jumlahOld) {
                $diff = $jumlahOld - $jumlahNew;
                $stok->stok = $jumlahStok + $diff;
            } else if ($jumlahNew > $jumlahOld) {
                $diff = $jumlahNew - $jumlahOld;
                $stok->stok = $jumlahStok - $diff;
            }
            $stok->hargaJual = $request->hargaJual;
            $stok->update();

            $penjualanDetail->update($request->all());
            return redirect()->route('admin.penjualan.show', $penjualanDetail->penjualan_id)->withSuccess('Data berhasil diubah');
        }
        // return redirect()->route('admin.penjualanDetail.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenjualanDetail  $penjualanDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualanDetail $penjualanDetail)
    {
        try {
            $penjualanDetail->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return back()->withWarning($exception->getMessage());
        }
    }
}
