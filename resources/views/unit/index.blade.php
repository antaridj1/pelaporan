@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">   
        <h1>Unit Bank BRI</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Unit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h5 class="card-title">Unit Bank BRI</h5>
                    <a href="{{route('unit.create')}}" class="btn btn-primary rounded-pill m-3"> <i class="bi bi-plus-circle"></i> Tambah Pegawai</a>
                  </div>
                 @include('unit.table')
                </div>

              </div>
            </div><!-- End Recent Sales -->
        </div>
      
    </section>
    @if(session()->has('status'))
      @include('layout.alert')
    @endif
  </main><!-- End #main -->
  @endsection