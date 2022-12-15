 <table class="table table-borderless datatable">
    <thead>
    <tr>
        <th class="text-center" scope="col">No</th>
        <th class="text-center" scope="col">Nama</th>
        <th class="text-center" scope="col">Email</th>
        <th class="text-center" scope="col">Jumlah Laporan Selesai</th>
        <th class="text-center" scope="col">Status</th>
        <th class="text-center" scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($pegawais as $pegawai)
        <tr>
            <th class="text-center" scope="row">{{$loop->iteration}}</th>
            <td class="text-center">{{$pegawai->name}}</td>
            <td class="text-center">{{$pegawai->email}}</td>
            <td class="text-center">{{$pegawai->jumlah_laporan_ditangani()}}</td>
            <td class="text-center">
                @if ($pegawai->status == true)
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#statusModal_{{$pegawai->id}}">
                        Aktif
                    </button>
                @else
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#statusModal_{{$pegawai->id}}">
                        Nonaktif
                    </button>
                @endif 
                @include('pegawai.modal') 
            </td>
            <td class="text-center">
                <a href="{{route('pegawai.edit',$pegawai->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                @include('pegawai.modal')
            </td>
        </tr>
    @empty
        <tr>
            <td>Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>