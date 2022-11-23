@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">   
        <h1>Laporan</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Recent Sales -->
                @forelse ($laporans as $laporan)
                    <div class="col-12"> 
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <span>{{$laporan->kategori}} | {{$laporan->created_at->format('d M Y')}}</span>
                                    <span class="badge rounded-pill bg-secondary">{{$laporan->status}}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$laporan->judul}}</h5>
                                {{$laporan->detail}}
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <p>Pengirim : {{$laporan->user->name}}</p>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#tolakModal_{{$laporan->id}}">
                                            Tolak
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#terimaModal_{{$laporan->id}}">
                                            Terima
                                        </button>
                                        @include('layout.modal')
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Card with header and footer -->
                    </div><!-- End Recent Sales -->
                @empty
                    <div class="col-12"> 
                        <div class="card">
                            <p>Tidak Ada Data</p>
                        </div>
                    </div>
                @endforelse
            </div>
      </div>
      
    </section>
    
    @if(session()->has('status'))
      @include('layout.alert')
    @endif
  </main><!-- End #main -->
  @endsection