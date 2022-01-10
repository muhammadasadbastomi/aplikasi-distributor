<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Rak;
use App\Models\Stok;
use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;

class PembelianDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $data = PembelianDetail::all();

    //     return view('admin.pembelianDetail.index',compact('data'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pembelian =  Pembelian::findOrFail($id);
        $barang = Barang::all();
        $rak = Rak::all();
        // $date = Carbon::now()->format('Ym');
        // $noTransaksi = 'RC'.random_int(100000, 999999).$date;
        return view('admin.pembelianDetail.create',compact('pembelian','barang','rak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['jumlahRfs'] = $request->jumlah;
        $pembelianDetail = PembelianDetail::create($input);
        $stok = Stok::whereBarangId($pembelianDetail->barang_id)->first();
        if(!$stok){
            $input['stok'] = $pembelianDetail->jumlah;
            $stok = Stok::create($input);
        }else{
            $stok->stok = $stok->stok + $pembelianDetail->jumlah;
            $stok->hargaJual = $request->hargaJual;
            $stok->update();
        }


        return redirect()->route('admin.pembelian.show',$pembelianDetail->pembelian_id)->withSuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembelianDetail  $pembelianDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PembelianDetail $pembelianDetail)
    {
        return view('admin.pembelianDetail.index',compact('pembelianDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembelianDetail  $pembelianDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PembelianDetail $pembelianDetail)
    {
        $barang = Barang::all();
        $rak = Rak::all();
        return view('admin.pembelianDetail.edit',compact('pembelianDetail','barang','rak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembelianDetail  $pembelianDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembelianDetail $pembelianDetail)
    {
        $stok = Stok::whereBarangId($pembelianDetail->barang_id)->first();

        $jumlahOld = $pembelianDetail->jumlah;
        $jumlahNew = $request->jumlah;
        if ($jumlahNew < $jumlahOld){
            $diff = $jumlahOld - $jumlahNew;
            $stok->stok = $stok->stok - $diff;
        }else if($jumlahNew > $jumlahOld){
            $diff = $jumlahNew - $jumlahOld;
            $stok->stok = $stok->stok + $diff;
        }
            $stok->hargaJual = $request->hargaJual;
            $stok->update();

        $pembelianDetail->update($request->all());
        return redirect()->route('admin.pembelian.show',$pembelianDetail->pembelian_id)->withSuccess('Data berhasil diubah');
        // return redirect()->route('admin.pembelianDetail.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembelianDetail  $pembelianDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembelianDetail $pembelianDetail)
    {
        try {
            $pembelianDetail->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
