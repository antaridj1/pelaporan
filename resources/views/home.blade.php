@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
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
            <div class="col-xxl-12 col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8 col-sm-12">
                      <h5 class="card-title mb-0">Halo, Admin Unit A!</h5>
                      <span class="mt-0">Terjadi masalah? Buat laporan dengan menekan tombol Buat Laporan</span>
                    </div>
                    <div class="col-md-4 mt-3 col-sm-12 d-flex align-items-center justify-content-end">
                      <a href="{{route('laporan.create')}}" class="btn btn-primary rounded-pill"> <i class="bi bi-pencil"></i> Buat Laporan</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Terkirim -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Terkirim <span>| Per 2022</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cursor"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$jumlah_terkirim}}</h6>
                      <span class="text-muted small pt-2 ps-1">laporan</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Terkirim -->
            <!-- Diproses -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Diproses <span>| Per 2022</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$jumlah_diproses}}</h6>
                      <span class="text-muted small pt-2 ps-1">laporan</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Diproses -->
            <!-- Selesai -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Selesai <span>| Per 2022</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$jumlah_selesai}}</h6>
                      <span class="text-muted small pt-2 ps-1">laporan</span>
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
                    <div class="d-flex justify-content-between">
                      <h5 class="card-title">Laporan Terakhir <span>| Per 2022</span></h5>
                      <div class="mt-3">
                        <a href="{{route('laporan.index')}}" class="btn btn-primary btn-sm">Lihat Semua</a>
                      </div>
                    </div>
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Kategori</th>
                          <th scope="col">Judul</th>
                          <th scope="col">Status</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($laporans as $laporan)
                            <tr>
                              <th scope="row">{{str_pad($laporan->id, 6, '0', STR_PAD_LEFT)}}</th>
                              <td>{{$laporan->kategori}}</td>
                              <td>{{$laporan->judul}}</td>
                              <td><span class="badge bg-secondary">{{$laporan->status}}</span></td>
                              <td>
                                <a href="" class="btn btn-sm btn-outline-info"><i class="bi bi-info-circle-fill"></i></a>
                                @if ($laporan->status === 'terkirim')
                                  <a href="" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                                  <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                                @endif
                              </td>
                        </tr>
                        @empty
                            <tr>
                              <td>Tidak ada data</td>
                            </tr>
                        @endforelse
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