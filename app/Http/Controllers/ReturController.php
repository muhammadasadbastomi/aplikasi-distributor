<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Stok;
use App\Models\Retur;
use App\Models\Barang;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Retur::all();


        return view('admin.retur.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('admin.retur.create', compact('barang'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stok = Stok::whereBarangId($request->barang_id)->first();
        if ($stok->stok < $request->jumlah) {
            return back()->withWarning('Stok tidak mencukupi');
        } else {

            // $penjualanDetail = PenjualanDetail::create($input);
            Retur::create($request->all());
            $stok->stok = $stok->stok - $request->jumlah;
            $stok->update();
        }

        return redirect()->route('admin.retur.index')->withSuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retur  $retur
     * @return \Illuminate\Http\Response
     */
    public function show(Retur $retur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retur  $retur
     * @return \Illuminate\Http\Response
     */
    public function edit(Retur $retur)
    {
        return view('admin.retur.edit', compact('retur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retur  $retur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retur $retur)
    {
        $retur->update($request->all());
        return redirect()->route('admin.retur.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retur  $retur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retur $retur)
    {
        try {
            $retur->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
