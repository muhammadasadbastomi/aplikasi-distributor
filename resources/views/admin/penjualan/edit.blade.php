@extends('layouts.admin')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Admin</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data penjualan</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Edit Data penjualan</h6>
<hr>
<div class="card">
    <form action="{{route('admin.penjualan.update',$penjualan->id)}}" method="post" enctype="multipart/form-data">
    <div class="card-body">
            @csrf
            @method('put')
        <div class="mb-3">
            <label for="formFile" class="form-label">no Transaksi</label>
            <input class="form-control form-control-sm mb-3" type="text" name="noTransaksi" value="{{$penjualan->noTransaksi}}" placeholder="no Transaksi" aria-label="default input example" required readonly>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Tanggal penjualan</label>
            <input class="form-control form-control-sm mb-3" type="date" name="tanggalpenjualan" value="{{$penjualan->tanggalPenjualan}}" placeholder="Tanggal penjualan" aria-label="default input example" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Nama Customer</label>
            <input class="form-control form-control-sm mb-3" type="text" name="namaCustomer" value="{{$penjualan->namaCustomer}}" placeholder="Nama Customer" aria-label="default input example" required>
        </div>
    </div>
    
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary px-3 radius-30"><i class="bi bi-save2-fill"></i> Simpan</button>
        <a href="{{route('admin.penjualan.index')}}" class="btn btn-danger px-3 radius-30"><i class="bi bi-backspace-fill"></i> Batal</a>
    </div>
    
</form>
</div>
@endsection