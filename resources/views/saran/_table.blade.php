 <table class="table table-bordered datatable">
    <thead>
    <tr>
        <th class="text-center" scope="col" style="width: 100px; overflow: hidden;">No</th>
        @if(auth()->user()->role == 'master_admin')
            <th class="text-center" scope="col">Pengirim</th>
        @endif
        <th class="text-center" scope="col">Detail</th>
        @if(auth()->user()->role == 'unit')
            <th class="text-center" scope="col">Aksi</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @forelse ($sarans as $saran)
        <tr>
            <td class="text-center" scope="row" style="width: 100px; overflow: hidden;">{{$loop->iteration}}</td>
            @if(auth()->user()->role == 'master_admin')
                <td class="text-center">{{$saran->user->name}}</td>
            @endif
            <td class="text-left">{{$saran->detail}}</td>
            @if(auth()->user()->role == 'unit')
            <td class="text-center">
                <a href="{{route('saran.edit',$saran->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$saran->id}}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                @include('saran.modal')
            </td>
            @endif
        </tr>
    @empty
        <tr>
            <td>Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>