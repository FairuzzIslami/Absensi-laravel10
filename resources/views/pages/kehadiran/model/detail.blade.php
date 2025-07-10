<div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item->id }}">Lihat Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Kegiatan   :   </strong>{{ $item->nama_kegiatan }}</p>
                <p><strong>Tanggal  :   </strong>{{  date('d-M-y', strtotime($item->tgl_kegiatan)) }}</p>
                <p><strong>Waktu    :   </strong>{{ date('H:i', strtotime($item->waktu_kegiatan))}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
