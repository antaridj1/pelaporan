
    <div class="card">
        <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>{{$laporan->created_at->format('d M Y')}}</span>
            <span class="badge rounded-pill {{badge($laporan->status)}}">{{status($laporan->status)}}</span>
        </div>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th style="width:20px;">Kategori </th>
                        <td>: {{$laporan->kategori}}</td>
                    </tr>
                    <tr>
                        <th style="width:20px;">Judul </th>
                        <td>: {{$laporan->judul}}</td>
                    </tr>
                    <tr>
                        <th style="width:20px;">Detail </th>
                        <td>: {{$laporan->detail}}</td>
                    </tr>
                    @if($laporan->detail_perbaikan !== null)
                    <tr>
                        <th style="width:20px;">Detail Perbaikan</th>
                        <td>: {{$laporan->detail_perbaikan}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        
        </div>
        @if (auth()->user()->role === 'unit')
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <p>Penanggungjawab : {{($laporan->penanggungjawab)? $laporan->penanggungjawab->name : '-'}}</p>
                    @if ($laporan->status == IS_TERKIRIM)
                        <div>
                            <a href="{{route('laporan.edit',$laporan->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$laporan->id}}">
                            <i class="bi bi-trash-fill"></i>
                            </button>
                        </div>
                        @include('layout.modal')
                    @elseif($laporan->status == IS_DITOLAK)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#alasanModal_{{$laporan->id}}">Lihat alasan ditolak</a>
                        @include('layout.modal')
                    @elseif($laporan->status == IS_SELESAI_DIPROSES)
                    <div>
                        @if($laporan->detail_perbaikan == null)
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#perbaikanModal_{{$laporan->id}}">
                                Perbaikan
                            </button>
                            @include('layout.modal')
                        @endif
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#verifiedModal_{{$laporan->id}}">
                            Validasi
                        </button>
                        @include('layout.modal') 
                    </div>  
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
                @if($laporan->status === IS_TERKIRIM)
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#tolakModal_{{$laporan->id}}">
                        Tolak
                    </button>
                    @include('layout.modal')
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#terimaModal_{{$laporan->id}}">
                        Terima
                    </button>
                    @include('laporan.modal')
                @elseif($laporan->status === IS_DITOLAK)
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
                @if($laporan->status == IS_DITERIMA || $laporan->status == IS_PERBAIKAN)
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#prosesModal_{{$laporan->id}}">
                    Proses Sekarang
                </button>
                @elseif($laporan->status == IS_DIPROSES)
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
