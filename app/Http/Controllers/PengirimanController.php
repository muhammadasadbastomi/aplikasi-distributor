<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengiriman::all();


        return view('admin.pengiriman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::whereRole(2)->get();
        $penjualan =  Penjualan::findOrFail($id);
        return view('admin.pengiriman.create', compact('user', 'penjualan'));
    }

    public function verifikasi($id)
    {
        $pengiriman =  Pengiriman::findOrFail($id);
        $pengiriman->status = 1;
        $pengiriman->update();

        return back()->withSuccess('Data berhasil diverifikasi');
        // return view('admin.pengiriman.create', compact('user', 'penjualan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengiriman::create($request->all());

        return redirect()->route('admin.penjualan.show', $request->penjualan_id)->withSuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        return view('admin.pengiriman.edit', compact('pengiriman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $pengiriman->update($request->all());
        return redirect()->route('admin.pengiriman.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        try {
            $pengiriman->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }
    }
}
