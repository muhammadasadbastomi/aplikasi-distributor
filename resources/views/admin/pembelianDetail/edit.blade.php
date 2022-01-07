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
                <li class="breadcrumb-item active" aria-current="page">Data Pembelian</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Edit Data Pembelian</h6>
<hr>
<div class="card">
    <form action="{{route('admin.pembelianDetail.update',$pembelianDetail->id)}}" method="post" enctype="multipart/form-data">
    <div class="card-body">
            @csrf
            @method('put')
         <div class="row">
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Sparepart</label>
                <select name="sparepart_id" id="" class="form-select form-select-sm mb-3" required>
                    @foreach ($sparepart as $d)
                    <option value="">Pilih Sparepart</option>
                    <option value="{{$d->id}}" {{$pembelianDetail->sparepart_id ==  $d->id ? 'selected' : ''}}>{{$d->partNumber}} - {{$d->deskripsi}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Rak</label>
                <select name="rak_id" id="" class="form-select form-select-sm mb-3" required>
                    @foreach ($rak as $d)
                    <option value="">Pilih Rak</option>
                    <option value="{{$d->id}}" {{$pembelianDetail->rak_id ==  $d->id ? 'selected' : ''}}>{{$d->kodeLokasi}} - {{$d->gudang}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Harga Beli/Pcs</label>
                <input class="form-control form-control-sm mb-3" type="number" name="hargaBeli" value="{{$pembelianDetail->hargaBeli}}" placeholder="Harga Beli/Pcs" aria-label="default input example" required>
            </div>
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Quantity</label>
                <input class="form-control form-control-sm mb-3" type="number" name="jumlahSj" value="{{$pembelianDetail->jumlahSj}}" placeholder="Quantity" aria-label="default input example" required>
            </div>
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Harga Jual/Pcs</label>
                <input class="form-control form-control-sm mb-3" type="number" name="hargaJual" value="{{$pembelianDetail->hargaJual}}" placeholder="Harga Jual/Pcs" aria-label="default input example" required>
            </div>
        </div>
    </div>
    
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary px-3 radius-30"><i class="bi bi-save2-fill"></i> Simpan</button>
        <a href="{{route('admin.pembelian.show',$pembelianDetail->pembelian_id)}}" class="btn btn-danger px-3 radius-30"><i class="bi bi-backspace-fill"></i> Batal</a>
    </div>
    
</form>
</div>
@endsection