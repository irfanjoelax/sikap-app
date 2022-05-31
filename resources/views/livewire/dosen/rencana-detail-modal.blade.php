<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">
            {{ $title }}
        </h5>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-md">
            <tr class="text-center">
                <th width="10%">No.</th>
                <th width="80%">Tanggal</th>
                <th width="10%">Jumlah</th>
            </tr>
            @php $no = 1 @endphp
            @foreach ($dataDetail as $item)
            <tr class="text-center">
                <td width="10%">{{ $no++ }}</td>
                <td width="80%">{{ $item->tanggal }}</td>
                <td width="10%">{{ $item->jumlah }}</td>
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