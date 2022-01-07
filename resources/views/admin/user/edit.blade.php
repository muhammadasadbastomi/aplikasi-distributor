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
                <li class="breadcrumb-item active" aria-current="page">Data User</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Edit Data User</h6>
<hr>
<div class="card">
    <form action="{{route('admin.user.update',$user->id)}}" method="post" enctype="multipart/form-data">
    <div class="card-body">
            @csrf
            @method('put')
        <div class="mb-3">
            <label for="formFile" class="form-label">Nama</label>
            <input class="form-control mb-3" type="text" name="nama" placeholder="Nama" value="{{$user->nama}}" aria-label="default input example" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Username</label>
            <input class="form-control mb-3" type="text" name="username" placeholder="Username" value="{{$user->username}}" aria-label="default input example" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Password</label>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password"  aria-label="default input example" >
        </div>
        <div class="mb-3">
                <label for="formFile" class="form-label">Foto</label>
                <input class="form-control" type="file" name="foto" id="formFile">
        </div>
    </div>
    
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary px-3 radius-30"><i class="bi bi-save2-fill"></i> Simpan</button>
        <a href="{{route('admin.user.index')}}" class="btn btn-danger px-3 radius-30"><i class="bi bi-backspace-fill"></i> Batal</a>
    </div>
    
</form>
</div>
@endsection