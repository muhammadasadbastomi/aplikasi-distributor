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
        <div class="ms-auto">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary px-3 radius-30">Tambah Data</a>
            {{-- <div class="btn-group">
            <button type="button" class="btn btn-primary px-3 radius-30"><span><i class="glyphicon glyphicon-print"></i></span> Cetak</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end" px-3 radius-30> 
                <a class="dropdown-item" href="{{route('admin.report.userAll')}}">Cetak Keseluruhan</a>
                {{-- <button type="button" class="dropdown-item cetakAll" data-bs-toggle="modal" data-route="{{route('admin.user.destroy',1)}}" data-bs-target="#bulanModal"><i class="bi bi-printer-fill"></i> Cetak Bulan</button>
                <button type="button" class="dropdown-item cetakBulan" data-bs-toggle="modal" data-route="{{route('admin.user.destroy',1)}}" data-bs-target="#bulanModal"><i class="bi bi-printer-fill"></i> Cetak Bulan</button>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a> 
        </div>
    </div> --}}
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Data User</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example" class="table table-striped table-bordered dataTable text-center"
                                style="width: 100%;" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                        <!-- <th>No</th>
                                           <th>No</th>
                                           <th>No</th>
                                           <th>No</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->username }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- <a href="#" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a> -->
                                                    <a href="{{ route('admin.user.edit', $d->id) }}"
                                                        class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                                    <button type="button" class="btn btn-danger destroy"
                                                        data-bs-toggle="modal"
                                                        data-route="{{ route('admin.user.destroy', $d->id) }}"
                                                        data-bs-target="#destroyModal"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                    {{-- <a href="{{route('admin.user.destroy',$d->id)}}" class="btn btn-primary"><i class="bi bi-trash-fill"></i></a> --}}
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
    @include('layouts.modal.reportBulan')
@endsection
