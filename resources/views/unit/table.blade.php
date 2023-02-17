 <table class="table table-bordered datatable">
    <thead>
    <tr>
        <th class="text-center" scope="col">No</th>
        <th class="text-center" scope="col">Nama</th>
        <th class="text-center" scope="col">Email</th>
        <th class="text-center" scope="col">Status</th>
        <th class="text-center" scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($units as $unit)
        <tr>
            <th class="text-center" scope="row">{{$loop->iteration}}</th>
            <td class="text-center">{{$unit->name}}</td>
            <td class="text-center">{{$unit->email}}</td>
            <td class="text-center">
                @if ($unit->status == true)
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#statusModal_{{$unit->id}}">
                        Aktif
                    </button>
                @else
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#statusModal_{{$unit->id}}">
                        Nonaktif
                    </button>
                @endif 
                @include('unit.modal') 
            </td>
            <td class="text-center">
                <a href="{{route('unit.edit',$unit->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                    @include('unit.modal')
                </td>
        
        </tr>
    @empty
        <tr>
            <td>Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>