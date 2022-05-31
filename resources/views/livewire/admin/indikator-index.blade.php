<div class="row">
    <div class="col-lg-12">
        <x-alert></x-alert>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Indikator</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th width="5%" class="text-center">No.</th>
                            <th width="45%">Point</th>
                            <th width="20%" class="text-center">Tugas</th>
                            <th width="30%">Action</th>
                        </tr>
                        @php $no = 1 @endphp
                        @forelse ($indikator as $item)
                        <tr>
                            <td width="5%" class="text-center">{{ $no++ }}</td>
                            <td width="45%">{{ $item->point }}</td>
                            <td width="20%" class="text-center">
                                <h6><span class="badge badge-info">{{ $item->tugas->nama }}</span></h6>
                            </td>
                            <td width="30%">
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
                    {{ $indikator->links() }}
                </nav>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Form Indikator</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Point <sup class="text-danger">*</sup></label>
                    <input wire:model="point" type="text" class="form-control @error('point') is-invalid @enderror">
                    @error('point')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tugas <sup class="text-danger">*</sup></label>
                    <select wire:model="tugas_id" class="form-control @error('tugas_id') is-invalid @enderror">
                        <option>-- Pilih Indikator Sesuai Tugas --</option>
                        @foreach ($tugas as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>                            
                        @endforeach
                    </select>
                    @error('tugas_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button wire:click="submit" class="btn btn-sm btn-primary mr-1" wire:loading.attr="disabled">
                    <div wire:loading wire:target="submit">
                        <span class="spinner-border spinner-border-sm mr-1"></span>Processing
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
