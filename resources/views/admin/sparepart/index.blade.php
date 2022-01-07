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
    <div class="ms-auto">
        <a href="{{route('admin.sparepart.create')}}" class="btn btn-primary px-3 radius-30">Tambah Data</a>
        <div class="btn-group">
            <button type="button" class="btn btn-primary px-3 radius-30"><span><i class="glyphicon glyphicon-print"></i></span> Cetak</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end" px-3 radius-30> 
                <a class="dropdown-item" href="{{route('admin.report.sparepartAll')}}">Cetak Keseluruhan</a>
                
                {{-- <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a> --}}
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Data Sparepart</h6>
<hr>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <div id="example_wrapper" style="font-size: 9px; font-family: tahoma;" class="dataTables_wrapper dt-bootstrap5">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example" class="table table-striped table-bordered dataTable text-center" style="width: 100%;"
                            role="grid" aria-describedby="example_info">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Part Number</th>
                                   <th>Deskripsi Part</th>
                                   <th>Part Reference</th>
                                   <th>Kode Supplier</th>
                                   <th>Kode Group Sales</th>
                                   <th>Part Status</th>
                                   <th>HET</th>
                                   <th>Harga Pokok</th>
                                   <th>MOQ DK</th>
                                   <th>MOQ DM</th>
                                   <th>MOQ DB</th>
                                   <th>Part Number Type</th>
                                   <th>Part Moving</th>
                                   <th>Part Source</th>
                                   <th>Part Current</th>
                                   <th>Part Type</th>
                                   <th>Part Lifetime</th>
                                   <th>Part Group</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                            <tbody >
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->partNumber}}</td>
                                    <td>{{$d->deskripsi}}</td>
                                    <td>{{$d->partReference}}</td>
                                    <td>{{$d->kodeSupplier}}</td>
                                    <td>{{$d->kodeGroupSales}}</td>
                                    <td>{{$d->partStatus}}</td>
                                    <td>{{$d->HET}}</td>
                                    <td>{{$d->hargaPokok}}</td>
                                    <td>{{$d->moqDk}}</td>
                                    <td>{{$d->moqDm}}</td>
                                    <td>{{$d->moqDb}}</td>
                                    <td>{{$d->partNumberType}}</td>
                                    <td>{{$d->partMoving}}</td>
                                    <td>{{$d->partSource}}</td>
                                    <td>{{$d->partCurrent}}</td>
                                    <td>{{$d->partType}}</td>
                                    <td>{{$d->partLifetime}}</td>
                                    <td>{{$d->partGroup}}</td>
                                    <td>
                                    <div class="btn-group">
                                        <!-- <a href="#" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a> -->
                                        <a href="{{route('admin.sparepart.edit',$d->id)}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <button type="button" class="btn btn-danger destroy" data-bs-toggle="modal" data-route="{{route('admin.sparepart.destroy',$d->id)}}" data-bs-target="#destroyModal"><i class="bi bi-trash-fill"></i></button>
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