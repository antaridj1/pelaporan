@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <div>
                <h4 class="d-inline" style="color: black;">Data Penjualan</h4>
              
                    <p class="text-muted">Anda telah menangani sebanyak 5 transaksi </p>
              
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="row">
                        <div class="col-4">
                            <span>Filter data dari tanggal:</span>
                        </div>
                        <div class="col-8 mb-3">
                            <form action="/penjualan">
                                @if(request('status'))
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                @endif 
                                <div class="d-flex justify-content-center">
                                    <input class="form-control border-end-0 border input-daterange-datepicker " type="text" 
                                        name="daterange">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary border-start-0 border-bottom-0 border" type="submit" >
                                            <i class="fa fa-filter"></i>  Filter
                                        </button>
                                    </span>
                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="basic-dropdown">
                        <div class="dropdown">
                            @if(request('status') == "false")
                                <button type="button" class="btn btn-secondary shadow-sm dropdown-toggle mr-2" data-toggle="dropdown">Belum Diproses</button>
                            @elseif (request('status') == "1")
                                <button type="button" class="btn btn-secondary shadow-sm dropdown-toggle mr-2" data-toggle="dropdown">Sudah Diproses</button>
                            @else
                                <button type="button" class="btn btn-secondary shadow-sm dropdown-toggle mr-2" data-toggle="dropdown">Semua</button>
                            @endif
                            <div class="dropdown-menu">
                                    <a class="dropdown-item" href="penjualan">Semua</a>
                                    <a class="dropdown-item" href="penjualan?status=false">Belum Diproses</a>
                                    <a class="dropdown-item" href="penjualan?status=1">Sudah Diproses</a>
                            </div>
                        </div>
                    </div>
                    
                    <form action="/penjualan">
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif 
                        <div class="input-group">
                            <div class="d-flex justify-content-center">
                                <input class="form-control border-end-0 border" type="search" placeholder="Search" id="example-search-input" aria-describedby="button-addon2" name="search" value="{{request('search')}}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary border-start-0 border-bottom-0 border" type="submit" >
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                <div class="card border-primary ">
                    <a href="#" data-toggle="modal" data-target="#detail" class="penjualan">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <p><b>test</b> 0999</p>
                                <small>tanggal</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">  
                            <div class="card-body m-0 pt-0 pb-0 ">
                                <table class="table table-borderless col-6">
                                    <tr>
                                        <td>ID</td>
                                        <td>: 1</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: e</td>
                                    </tr>
                                   
                                        <tr>
                                            <td>Penanggungjawab</td>
                                            <td>: s</td>
                                        </tr>
                                   
                                </table>
                            </div>
                            <div class="d-flex align-items-center"> 
                                <i class="icon-arrow-right p-2"></i>
                            </div>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <small>Last updated tgl</small>

                                <div>
                                    <a href="{{ route('penjualan.delete',$penjualan->id) }}" data-toggle="modal" data-target="#deletePenjualan_{{$penjualan->id}}"
                                          data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                        <i class="icon-trash p-3"></i>
                                    </a>
                                    <div class="modal fade" id="deletePenjualan_{{$penjualan->id}}">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Data</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('penjualan.delete',$penjualan->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="form-group"> 
                                                        <p>Apakah Anda yakin ingin menghapus data penjualan?</p>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary" >Hapus </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @if ($penjualan->status == false)
                                        <button type="button" class="btn btn-danger btn-xs ms-3 shadow-sm" data-toggle="modal" 
                                            data-target="#editStatus_{{$penjualan->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah Status">
                                            Belum Diproses
                                        </button>
                                        <div class="modal fade" id="editStatus_{{$penjualan->id}}">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ubah Status</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('penjualan.editStatus',$penjualan->id) }}">
                                                        @method('patch')
                                                        @csrf
                                                        <div class="form-group"> 
                                                            <p>Anda hanya bisa mengubah status sekali jika penjualan telah diproses. Apakah penjualan sudah diproses?</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary" >Sudah Diproses </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="label label-pill label-success btn-xs">Sudah Diproses</span>
                                    @endif
                                    
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

              
            </div>
        </div>
    </div>
</div>

@if(session()->has('status'))
    @include('layout.alert')
@endif

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
            $('[data-bs-toggle="tooltip"]').tooltip();   
        });
</script>
@endsection