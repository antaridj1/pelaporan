 <table class="table table-bordered datatable">
    <thead>
    <tr>
        <th class="text-center" scope="col">No</th>
        <th class="text-center" scope="col">Kategori</th>
        <th scope="col">Judul</th>
        <th class="text-center" scope="col">Status</th>
        <th class="text-center" scope="col">Tanggal Terkirim</th>
        
        @if (auth()->user()->role === 'master_admin' || auth()->user()->role === 'pegawai')
            <th class="text-center" scope="col">Pengirim</th>
        @endif
        <th class="text-center" scope="col">Tanggal Diterima</th>
        <th class="text-center" scope="col">Penanggungjawab</th>
        <th class="text-center" scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($laporans as $laporan)
        <tr>
            <th class="text-center" scope="row">{{$loop->iteration}}</th>
            <td class="text-center">{{$laporan->kategori}}</td>
            <td>{{$laporan->judul}}</td>
            <td class="text-center">
                <span class="badge {{badge($laporan->status)}} ">{{status($laporan->status)}}</span>
            </td>
            <td class="text-center">{{$laporan->created_at->format('d/m/Y')}}</td>
            @if (auth()->user()->role === 'unit')
            <td class="text-center">{{($laporan->tanggal_diterima)? \Carbon\Carbon::parse($laporan->tanggal_diterima)->format('d/m/yy') : '-'}}</td>
                <td class="text-center">{{($laporan->penanggungjawab)? $laporan->penanggungjawab->name : '-'}}</td>
                <td class="text-center">
                <a href="{{route('laporan.show',$laporan->id)}}" class="btn btn-sm btn-outline-info"><i class="bi bi-info-circle-fill"></i></a>
                @if ($laporan->status == IS_TERKIRIM)
                    <a href="{{route('laporan.edit',$laporan->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$laporan->id}}">
                    <i class="bi bi-trash-fill"></i>
                    </button>
                @endif
                @include('layout.modal')
                </td>
            @else
                <td class="text-center">{{$laporan->user->name}}</td>
                <td class="text-center">{{($laporan->tanggal_diterima)? \Carbon\Carbon::parse($laporan->tanggal_diterima)->format('d/m/yy') : '-'}}</td>
                <td class="text-center">{{($laporan->penanggungjawab)? $laporan->penanggungjawab->name : '-'}}</td>
                <td class="text-center"><a href="{{route('laporan.show',$laporan->id)}}" class="btn btn-sm btn-outline-info"><i class="bi bi-info-circle-fill"></i></a></td>
            @endif
        
        </tr>
    @empty
        <tr>
            <td>Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>