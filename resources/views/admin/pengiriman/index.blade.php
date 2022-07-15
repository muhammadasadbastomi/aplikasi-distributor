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
                <li class="breadcrumb-item active" aria-current="page">Data Pengiriman</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        {{-- <a href="{{route('admin.barang.create')}}" class="btn btn-primary px-3 radius-30">Tambah Data</a> --}}
        <div class="btn-group">
            <button type="button" class="btn btn-primary px-3 radius-30"><span><i class="glyphicon glyphicon-print"></i></span> Cetak</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end" px-3 radius-30> 
                <a class="dropdown-item" href="{{route('admin.report.pengirimanAll')}}" target="_blank">Cetak Keseluruhan</a>
                
                {{-- <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a> --}}
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Data Pengiriman</h6>
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
                                    <th>Nama Supir</th>
                                    <th>Biaya Pengiriman (makan,minum dll)</th>
                                    <th>Alamat</th>
                                    <th>Status Verifikasi</th>
                                    {{-- <th>Kode Binbox</th> --}}
                                    {{-- <th>Keterangan</th> --}}
                                    <th>Aksi</th>
                                    <!-- <th>No</th>
                                    <th>No</th>
                                    <th>No</th>
                                    <th>No</th> -->
                                </tr>
                            </thead>
                             <tbody >
                                 @foreach($data as $d)
                                 <tr>
                                     <td>{{$loop->iteration}}</td>
                                     <td>{{$d->user->nama}}</td>
                                     <td>@currency($d->biaya)
                                         </td>
                                     <td>{{$d->alamat}}</td>
                                     
                                     <td>
                                         @if ($d->status == 0)
                                             <span class="badge bg-warning">Menunggu verifikasi manager</span>
                                             @else
                                             <span class="badge bg-primary">Sudah diverifikasi</span>
                                                 
                                             @endif
                                     </td>
                                     {{-- <td>{{$d->kodeBinbox}}</td> --}}
                                     {{-- <td>{{$d->keterangan}}</td> --}}
                                     <td>
                                     <div class="btn-group">
                                         <!-- <a href="#" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a> -->
                                         <a href="{{route('admin.pengiriman.verifikasi',$d->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-check"></i>Verifikasi</a>
                                         {{-- <button type="button" class="btn btn-danger destroy" data-bs-toggle="modal" data-route="{{route('admin.pengiriman.destroy',$d->id)}}" data-bs-target="#destroyModal"><i class="bi bi-trash-fill"></i></button> --}}
                                         {{-- <a href="{{route('admin.pengiriman.destroy',$d->id)}}" class="btn btn-primary"><i class="bi bi-trash-fill"></i></a> --}}
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