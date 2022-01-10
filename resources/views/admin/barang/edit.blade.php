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
                <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Edit Data Barang</h6>
<hr>
<div class="card">
    <form action="{{route('admin.barang.update',$barang->id)}}" method="post" enctype="multipart/form-data">
    <div class="card-body">
            @csrf
            @method('put')
            <div class="row">
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Kode Item</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="itemCode" value="{{$barang->itemCode}}" placeholder="Kode Item" aria-label="default input example" required>
                </div>
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Deskripsi Item</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="deskripsi" value="{{$barang->deskripsi}}" placeholder="Deskripsi" aria-label="default input example" required>
                </div>
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Berat (Gram)</label>
                    <input class="form-control form-control-sm mb-3" type="number" name="berat" value="{{$barang->berat}}" placeholder="Berat (Gram)" aria-label="default input example" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">Kode Supplier</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="kodeSupplier" value="{{$barang->kodeSupplier}}" placeholder="Kode Supplier" id="formFile" required>
                </div>
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">kode Group Sales</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="kodeGroupSales" value="{{$barang->kodeGroupSales}}" placeholder="kode Group Sales" aria-label="default input example" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">HET</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="HET" value="{{$barang->HET}}" placeholder="HET" aria-label="default input example" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">harga Pokok</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="hargaPokok" value="{{$barang->hargaPokok}}" placeholder="harga Pokok" id="formFile" required>
                </div>
            </div>
    </div>
    
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary px-3 radius-30"><i class="bi bi-save2-fill"></i> Simpan</button>
        <a href="{{route('admin.barang.index')}}" class="btn btn-danger px-3 radius-30"><i class="bi bi-backspace-fill"></i> Batal</a>
    </div>
    
</form>
</div>
@endsection