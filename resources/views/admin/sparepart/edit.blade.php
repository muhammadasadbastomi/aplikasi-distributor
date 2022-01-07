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
                <li class="breadcrumb-item active" aria-current="page">Data Sparepart</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Edit Data Sparepart</h6>
<hr>
<div class="card">
    <form action="{{route('admin.sparepart.update',$sparepart->id)}}" method="post" enctype="multipart/form-data">
    <div class="card-body">
            @csrf
            @method('put')
            <div class="row">
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Part Number</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="partNumber" value="{{$sparepart->partNumber}}" placeholder="Part Number" aria-label="default input example" required>
                </div>
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Deskripsi Part</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="deskripsi" value="{{$sparepart->deskripsi}}" placeholder="Deskripsi" aria-label="default input example" required>
                </div>
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Part Reference</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="partReference" value="{{$sparepart->partReference}}" placeholder="Part Reference" aria-label="default input example" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">Kode Supplier</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="kodeSupplier" value="{{$sparepart->kodeSupplier}}" placeholder="Kode Supplier" id="formFile" required>
                </div>
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">kode Group Sales</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="kodeGroupSales" value="{{$sparepart->kodeGroupSales}}" placeholder="kode Group Sales" aria-label="default input example" required>
                </div>
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">part Status</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="partStatus" value="{{$sparepart->partStatus}}" placeholder="part Status" aria-label="default input example" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">HET</label>
                    <input class="form-control form-control-sm mb-3" type="text" name="HET" value="{{$sparepart->HET}}" placeholder="HET" aria-label="default input example" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">harga Pokok</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="hargaPokok" value="{{$sparepart->hargaPokok}}" placeholder="harga Pokok" id="formFile" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">MOQ DK</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="moqDk" value="{{$sparepart->moqDk}}" placeholder="MOQ DK" id="formFile" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">MOQ DM</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="moqDm" value="{{$sparepart->moqDm}}" placeholder="MOQ DM" id="formFile" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">MOQ DB</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="moqDb" value="{{$sparepart->moqDb}}" placeholder="MOQ DB" id="formFile" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">part Number Type</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="partNumberType" value="{{$sparepart->partNumberType}}" placeholder="part Number Type" id="formFile" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">part Moving</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="partMoving" value="{{$sparepart->partMoving}}" placeholder="part Moving" id="formFile" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">part Source</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="partSource" value="{{$sparepart->partSource}}" placeholder="partSource" id="formFile" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">part Current</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="partCurrent" value="{{$sparepart->partCurrent}}" placeholder="part Current" id="formFile" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">part Type</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="partType" value="{{$sparepart->partType}}" placeholder="part Type" id="formFile" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">part Lifetime</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="partLifetime" value="{{$sparepart->partLifetime}}" placeholder="part Lifetime" id="formFile" required>
                </div>
                <div class="mb-3 col">
                        <label for="formFile" class="form-label">part Group</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="partGroup" value="{{$sparepart->partGroup}}" placeholder="partGroup" id="formFile" required>
                </div>
            </div>
    </div>
    
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary px-3 radius-30"><i class="bi bi-save2-fill"></i> Simpan</button>
        <a href="{{route('admin.sparepart.index')}}" class="btn btn-danger px-3 radius-30"><i class="bi bi-backspace-fill"></i> Batal</a>
    </div>
    
</form>
</div>
@endsection