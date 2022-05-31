<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">
            {{ $title }}
        </h5>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-md">
            <tr>
                <th width="10%" class="text-center">No.</th>
                <th width="70%">Kegiatan</th>
                <th width="20%" class="text-center">Tanggal</th>
                <th width="10%" class="text-center">Jumlah</th>
            </tr>
            @php $no = 1 @endphp
            @foreach ($dataDetail as $item)
            <tr>
                <td width="10%" class="text-center">{{ $no++ }}</td>
                <td width="70%">{{ $item->kegiatan }}</td>
                <td width="10%" class="text-center">{{ $item->tanggal }}</td>
                <td width="10%" class="text-center">{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="modal-footer">
        <button wire:click="close" class="btn btn-secondary">
            <div wire:loading wire:target="close">
                <span class="spinner-border spinner-border-sm mr-1"></span>
            </div>
            Close  
        </button>
    </div>
</div>