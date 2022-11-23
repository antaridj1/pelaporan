<div class="modal fade" id="exampleModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('laporan.destroy',$laporan->id)}}">
            @method('delete')
            @csrf
            <div class="form-group"> 
                <p>Apakah Anda yakin untuk menghapus data ini?</p>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" >Ya </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="terimaModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('laporan.verifikasi',$laporan->id)}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
                <p>Setelah Anda menerima laporan, super admin akan memproses laporan tersebut</p>
                <p>Apakah Anda yakin untuk menerima laporan ini?</p>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" >Ya </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>