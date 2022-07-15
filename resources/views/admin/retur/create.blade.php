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
                <li class="breadcrumb-item active" aria-current="page">Data Retur</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Tambah Data Retur</h6>
<hr>
<div class="card">
    <form action="{{route('admin.retur.store')}}" method="post" enctype="multipart/form-data">
    <div class="card-body">
            @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Barang</label>
            <select name="barang_id" class="form-control mb-3" id="" required>
                <option value="">Pilih Barang</option>
                @foreach ($barang as $d)
                    <option value="{{ $d->id }}">{{ $d->deskripsi }}</option>
                @endforeach
            </select>
            {{-- <input class="form-control mb-3" type="text" name="nama" placeholder="Nama" aria-label="default input example" required> --}}
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Jumlah</label>
            <input class="form-control mb-3" type="text" name="jumlah" placeholder="Jumlah" aria-label="default input example" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Keterangan</label>
            <input class="form-control mb-3" type="text" name="keterangan" placeholder="Keterangan" aria-label="default input example" required>
        </div>
    </div>
    
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary px-3 radius-30"><i class="bi bi-save2-fill"></i> Simpan</button>
        <a href="{{route('admin.retur.index')}}" class="btn btn-danger px-3 radius-30"><i class="bi bi-backspace-fill"></i> Batal</a>
    </div>
    
</form>
</div>
@endsection