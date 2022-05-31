<div class="row">
    <div class="col-lg-12">
        <x-alert></x-alert>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Tugas</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th width="5%">No.</th>
                            <th width="60%">Nama</th>
                            <th width="35%">Action</th>
                        </tr>
                        @php $no = 1 @endphp
                        @forelse ($tugas as $item)
                        <tr>
                            <td width="5%" class="text-center">{{ $no++ }}</td>
                            <td width="60%">{{ $item->nama }}</td>
                            <td width="35%">
                                <button wire:click="select({{ $item->id }})" class="btn btn-sm btn-success mr-1" wire:loading.attr="disabled">
                                    <div wire:loading wire:target="select({{ $item->id }})">
                                        <span class="spinner-border spinner-border-sm mr-1"></span>
                                    </div>
                                    Edit  
                                </button>
                                <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger mr-1" wire:loading.attr="disabled">
                                    <div wire:loading wire:target="delete({{ $item->id }})">
                                        <span class="spinner-border spinner-border-sm mr-1"></span>
                                    </div>
                                    Delete  
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                data tugas masih kosong
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    {{ $tugas->links() }}
                </nav>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h4>Form Tugas</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama <sup class="text-danger">*</sup></label>
                    <input wire:model="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button wire:click="submit" class="btn btn-sm btn-primary mr-1" wire:loading.attr="disabled">
                    <div wire:loading wire:target="submit">
                        <span class="spinner-border spinner-border-sm mr-1"></span>
                    </div>
                    Saved  
                </button>
                <button wire:click="resetForm" class="btn btn-sm btn-secondary mr-1" wire:loading.attr="disabled">
                    <div wire:loading wire:target="resetForm">
                        <span class="spinner-border spinner-border-sm mr-1"></span>
                    </div>
                    Cancel  
                </button>
            </div>
        </div>
    </div>
</div>
