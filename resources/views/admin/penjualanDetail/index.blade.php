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
    <div class="ms-auto">
        <a href="{{route('admin.penjualanDetail.create',$penjualan->id)}}" class="btn btn-primary px-3 radius-30">Tambah Data</a>
        <div class="btn-group">
            <button type="button" class="btn btn-primary px-3 radius-30"><span><i class="glyphicon glyphicon-print"></i></span> Cetak</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end" px-3 radius-30> <a class="dropdown-item"
                    href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Data Detail Penjualan | {{$penjualan->noTransaksi}}</h6>
<hr>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-striped table-bordered dataTable text-center" style="width: 100%;"
                            role="grid" aria-describedby="example_info">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Kode Item</th>
                                   <th>Deskripsi Item</th>
                                   <th>Jumlah</th>
                                   <th>Harga</th>
                                   <th>Total Harga</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                            <tbody >
                                @foreach($penjualanDetail as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->barang->itemCode}}</td>
                                    <td>{{$d->barang->deskripsi}}</td>
                                    <td>{{$d->jumlah}}</td>
                                    <td>@currency($d->hargaJual)</td>
                                    {{-- <td>{{$d->diskon}}%</td> --}}
                                    <td>@currency($d->hargaTotal)</td>
                                    <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.penjualanDetail.edit',$d->id)}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <button type="button" class="btn btn-danger destroy" data-bs-toggle="modal" data-route="{{route('admin.penjualanDetail.destroy',$d->id)}}" data-bs-target="#destroyModal"><i class="bi bi-trash-fill"></i></button>
                                        {{-- <a href="{{route('admin.penjualanDetail.destroy',$d->id)}}" class="btn btn-primary"><i class="bi bi-trash-fill"></i></a> --}}
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.modal.destroy')
@endsection