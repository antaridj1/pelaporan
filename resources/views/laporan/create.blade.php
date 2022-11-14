@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        @include('layout.alert')
        
        <h1>Buat Laporan</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Buat Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Laporan</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3">
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="State">
                      <option selected>IT</option>
                      <option value="1">Keuangan</option>
                      <option value="2">Pemasaran</option>
                    </select>
                    <label for="floatingSelect">Kategori</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control" placeholder="Perihal" id="floatingPerihal">
                    <label for="floatingPerihal">Perihal</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Isi" id="floatingTextarea" style="height: 200px;"></textarea>
                    <label for="floatingTextarea">Isi</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection