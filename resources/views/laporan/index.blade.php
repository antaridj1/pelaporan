@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        @include('layout.alert')
        
        <h1>Laporan</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Laporan Selesai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                      <h5 class="card-title">Laporan Selesai <span>| Per 2022</span></h5>
    
                      <table class="table table-borderless datatable">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Perihal</th>
                            <th scope="col">Tanggal</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row"><a href="#">00003</a></th>
                            <td>IT</td>
                            <td><a href="#" class="text-primary">Aplikasi BRI Mobile Error</a></td>
                            <td>03/01/2022</td>
                            <td class="text-center"><span class="badge bg-success">Selesai</span></td>
                            <td class="text-center"><button class="btn btn-primary btn-sm">Detail</button></td>
                          </tr>
                          <tr>
                            <th scope="row"><a href="#">00004</a></th>
                            <td>Keuangan</td>
                            <td><a href="#" class="text-primary">Pertimbangan perubahan proses pencairan dana</a></td>
                            <td>02/01/2022</td>
                            <td class="text-center"><span class="badge bg-success">Selesai</span></td>
                            <td class="text-center"><button class="btn btn-primary btn-sm">Detail</button></td>
                          </tr>
                          <tr>
                            <th scope="row"><a href="#">00005</a></th>
                            <td>Pemasaran</td>
                            <td><a href="#" class="text-primary">Pertimbangan taktik pemasaran baru</a></td>
                            <td>01/01/2022</td>
                            <td class="text-center"><span class="badge bg-success">Selesai</span></td>
                            <td class="text-center"><button class="btn btn-primary btn-sm">Detail</button></td>
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