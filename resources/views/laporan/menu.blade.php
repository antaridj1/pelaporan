@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Menu Kategori</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Menu</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Terkirim -->
            <div class="col-xxl-4 col-md-6">
                <a href="#">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                        <h5 class="card-title"><span>KATEGORI</span></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cursor"></i>
                            </div>
                            <div class="ps-3">
                            <h6>IT</h6>
                            </div>
                        </div>
                        </div>

                    </div>
                </a>
            </div><!-- End Terkirim -->
            <!-- Diproses -->
            <div class="col-xxl-4 col-md-6">
                <a href="#">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title"><span>KATEGORI</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-arrow-repeat"></i>
                                </div>
                                <div class="ps-3">
                                <h6>Keuangan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- End Diproses -->
            <!-- Selesai -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title"><span>KATEGORI</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-check"></i>
                        </div>
                        <div class="ps-3">
                        <h6>Pemasaran</h6>
                        </div>
                    </div>
                </div>
              </div>
            </div><!-- End Selesai -->
          </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection