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
                <li class="breadcrumb-item active" aria-current="page">Data Detail Penjualan</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Edit Data Detail Penjualan</h6>
<hr>
<div class="card">
    <form action="{{route('admin.penjualanDetail.update',$penjualanDetail->id)}}" method="post" enctype="multipart/form-data">
    <div class="card-body">
            @csrf
            @method('put')
         <div class="row">
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Barang</label>
                <select name="barang_id" id="barang_id" class="form-select form-select-sm mb-3" required>
                    @foreach ($barang as $d)
                    <option value="">Pilih Barang</option>
                    <option value="{{$d->id}}" {{$penjualanDetail->barang_id ==  $d->id ? 'selected' : ''}} data-harga="{{$d->hargaJual}}">{{$d->partNumber}} - {{$d->deskripsi}} | Stok : {{$d->jumlahStok}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Jumlah (PCS)</label>
                <input class="form-control form-control-sm mb-3" type="number" name="jumlah" value="{{$penjualanDetail->jumlah}}" placeholder="Jumlah (PCS)" aria-label="default input example" required>
            </div>
            <div class="mb-3 col">
                <label for="formFile" class="form-label">Harga Jual/Pcs</label>
                <input class="form-control form-control-sm mb-3" type="number" id="hargaJual" name="hargaJual" value="{{$penjualanDetail->hargaJual}}" placeholder="Harga Jual/Pcs" aria-label="default input example" required readonly>
            </div>
        </div>
    </div>
    
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary px-3 radius-30"><i class="bi bi-save2-fill"></i> Simpan</button>
        <a href="{{route('admin.penjualan.show',$penjualanDetail->penjualan_id)}}" class="btn btn-danger px-3 radius-30"><i class="bi bi-backspace-fill"></i> Batal</a>
    </div>
    
</form>
</div>
@endsection
@section('script')
<script>
    $( "#barang_id" ).change(function() {
        hargaJual = $(this).find(':selected').data('harga')

        $('#hargaJual').val(hargaJual);
    });
</script>
@endsection