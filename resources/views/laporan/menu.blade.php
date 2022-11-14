@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
       @include('layout.alert')
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
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
            </div><!-- End Terkirim -->
            <!-- Diproses -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">
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
            </div><!-- End Diproses -->
            <!-- Selesai -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
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
          
          <div class="row">
              <!-- Recent Sales -->
              <div class="col-12">
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <h5 class="card-title">Laporan Terakhir <span>| Per 2022</span></h5>
  
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Kategori</th>
                          <th scope="col">Perihal</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><a href="#">00003</a></th>
                          <td>IT</td>
                          <td><a href="#" class="text-primary">Aplikasi BRI Mobile Error</a></td>
                          <td><span class="badge bg-danger">Terkirim</span></td>
                        </tr>
                        <tr>
                          <th scope="row"><a href="#">00002</a></th>
                          <td>Keuangan</td>
                          <td><a href="#" class="text-primary">Pertimbangan perubahan proses pencairan dana</a></td>
                          <td><span class="badge bg-warning">Diproses</span></td>
                        </tr>
                        <tr>
                          <th scope="row"><a href="#">00001</a></th>
                          <td>Pemasaran</td>
                          <td><a href="#" class="text-primary">Pertimbangan taktik pemasaran baru</a></td>
                          <td><span class="badge bg-success">Selesai</span></td>
                        </tr>
                      </tbody>
                    </table>
  
                  </div>
  
                </div>
              </div><!-- End Recent Sales -->
          </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection