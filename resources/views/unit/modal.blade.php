<div class="modal fade" id="statusModal_{{$unit->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{($unit->status == true) ? 'Nonaktifkan Akun' : 'Aktifkan Akun'}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('unit.updateStatus',$unit->id)}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
                <p>Apakah Anda yakin ingin {{($unit->status == true) ? 'menonaktifkan' : 'mangaktifkan'}} akun ini?</p>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" >Yakin </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>