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
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h5 class="card-title">Laporan <span>| Per 2022</span></h5>
                  </div>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr >
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Kategori</th>
                        <th class="text-center" scope="col">Judul</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($laporans as $laporan)
                        <tr>
                            <th class="text-center" scope="row">{{str_pad($laporan->id, 6, '0', STR_PAD_LEFT)}}</th>
                            <td class="text-center">{{$laporan->created_at->format('d M Y')}}</td>
                            <td class="text-center">{{$laporan->kategori}}</td>
                            <td>{{$laporan->judul}}</td>
                            <td class="text-center"><span class="badge bg-secondary">{{$laporan->status}}</span></td>
                            <td class="text-center">
                              <a href="{{route('laporan.show',$laporan->id)}}" class="btn btn-sm btn-outline-info"><i class="bi bi-info-circle-fill"></i></a>
                              @if ($laporan->status === 'terkirim')
                                <a href="{{route('laporan.edit',$laporan->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$laporan->id}}">
                                  <i class="bi bi-trash-fill"></i>
                                </button>
                              @endif
                              @include('layout.modal')
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
      
    </section>
    @if(session()->has('status'))
      @include('layout.alert')
    @endif
  </main><!-- End #main -->
  @endsection