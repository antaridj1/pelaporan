@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          @if(session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Form Edit</h5>
                @if(auth()->user()->role === 'pegawai')
                  @if(auth()->user()->isPresent == true)
                    <a href="#" class="btn btn-sm btn-success my-3" data-bs-toggle="modal" data-bs-target="#statusModal_{{auth()->user()->id}}">
                      <i class="bi bi-person-check-fill"></i> Hadir
                    </a>
                  @else
                    <a href="#" class="btn btn-sm btn-danger my-3" data-bs-toggle="modal" data-bs-target="#statusModal_{{auth()->user()->id}}">
                      <i class="bi bi-person-dash-fill"></i> Tidak Hadir
                    </a>
                  @endif
                  <div class="modal fade" id="statusModal_{{auth()->user()->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kehadiran</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{route('pegawai.updateKehadiran',auth()->user()->id)}}">
                            @method('patch')
                            @csrf
                            <div class="form-group"> 
                                <p>Apakah Anda yakin ingin mengubah kehadiran hari ini menjadi {{(auth()->user()->isPresent == true) ? 'tidak hadir' : 'hadir'}}?</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                <button type="submit" class="btn btn-primary" >Yakin </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
              <!-- Floating Labels Form -->
              <form method="post" action="{{route('profile.update')}}" class="row g-3">
                @csrf
                @method('patch')
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="floatingPerihal" value="{{ $user->name }}">
                    <label for="floatingPerihal">Nama</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="floatingPerihal" value="{{ $user->email }}">
                    <label for="floatingPerihal">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div> <div class="col-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPerihal">
                    <label for="floatingPerihal">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
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
    @if(session()->has('status'))
    @include('layout.alert')
  @endif
  </main><!-- End #main -->

@endsection