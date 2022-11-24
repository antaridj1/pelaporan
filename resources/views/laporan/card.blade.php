
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
        @if (auth()->user()->role === 'admin')
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <p>Penanggungjawab : {{($laporan->penanggungjawab)? $laporan->penanggungjawab->name : '-'}}</p>
                    @if ($laporan->status === 'terkirim')
                        <div>
                            <a href="{{route('laporan.edit',$laporan->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$laporan->id}}">
                            <i class="bi bi-trash-fill"></i>
                            </button>
                        </div>
                        @include('layout.modal')
                    @elseif($laporan->status === 'ditolak')
                        <a href="#" data-bs-toggle="modal" data-bs-target="#alasanModal_{{$laporan->id}}">Lihat alasan ditolak</a>
                        @include('layout.modal')
                    @elseif($laporan->status === 'unverified')
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#verifiedModal_{{$laporan->id}}">
                            Selesai
                        </button>
                        @include('layout.modal')
                    @endif 
            </div>
        </div>
        @elseif(auth()->user()->role === 'master_admin')
            <div class="card-footer">
            <div class="d-flex justify-content-between">
                <div>
                <p>Pengirim : {{$laporan->user->name}}</p>
                <p>Penanggungjawab : {{($laporan->penanggungjawab)? $laporan->penanggungjawab->name : '-'}}</p>
                </div>
                <div>
                @if($laporan->status === 'terkirim')
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#tolakModal_{{$laporan->id}}">
                        Tolak
                    </button>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#terimaModal_{{$laporan->id}}">
                        Terima
                    </button>
                    @include('layout.modal')
                @elseif($laporan->status === 'ditolak')
                    <a href="#" data-bs-toggle="modal" data-bs-target="#alasanModal_{{$laporan->id}}">Lihat alasan ditolak</a>
                    @include('layout.modal') 
                @endif
                </div>
            </div>
            </div>
        @else
        <div class="card-footer">
            <div class="d-flex justify-content-between">
            <p>Pengirim : {{$laporan->user->name}}</p>
            <div>
                @if($laporan->status === 'diterima')
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#prosesModal_{{$laporan->id}}">
                    Proses Sekarang
                </button>
                @elseif($laporan->status === 'diproses')
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#unverifiedModal_{{$laporan->id}}">
                    Selesai
                </button>
                @endif
                @include('layout.modal')
            </div>
            </div>
        </div>
        @endif
    
    </div><!-- End Card with header and footer -->
