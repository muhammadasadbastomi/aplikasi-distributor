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
                <li class="breadcrumb-item active" aria-current="page">Data Rak</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Edit Data Rak</h6>
<hr>
<div class="card">
    <form action="{{route('admin.rak.update',$rak->id)}}" method="post" enctype="multipart/form-data">
    <div class="card-body">
            @csrf
            @method('put')
        <div class="mb-3">
            <label for="formFile" class="form-label">kode Lokasi</label>
            <input class="form-control form-control-sm mb-3" type="text" name="kodeLokasi" value="{{$rak->kodeLokasi}}" placeholder="kode Lokasi" aria-label="default input example" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Gudang</label>
            <input class="form-control form-control-sm mb-3" type="text" name="gudang" value="{{$rak->gudang}}" placeholder="gudang" aria-label="default input example" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">kode Rak</label>
            <input class="form-control form-control-sm mb-3" type="text" name="kodeRak" value="{{$rak->kodeRak}}" placeholder="kode Rak" aria-label="default input example" required>
        </div>
        {{-- <div class="mb-3">
            <label for="formFile" class="form-label">kode Binbox</label>
            <input class="form-control form-control-sm mb-3" type="text" name="kodeBinbox" value="{{$rak->kodeBinbox}}" placeholder="kode Binbox" aria-label="default input example" required>
        </div> --}}
        <div class="mb-3">
            <label for="formFile" class="form-label">Keterangan</label>
            <input class="form-control form-control-sm mb-3" type="text" name="keterangan" value="{{$rak->keterangan}}" placeholder="keterangan" aria-label="default input example" required>
        </div>
    </div>
    
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary px-3 radius-30"><i class="bi bi-save2-fill"></i> Simpan</button>
        <a href="{{route('admin.rak.index')}}" class="btn btn-danger px-3 radius-30"><i class="bi bi-backspace-fill"></i> Batal</a>
    </div>
    
</form>
</div>
@endsection