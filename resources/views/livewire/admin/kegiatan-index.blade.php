<div class="row">
    <div class="col-lg-12">
        <x-alert></x-alert>
    </div>
    @if ($formShow)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Form kegiatan</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Judul <sup class="text-danger">*</sup></label>
                    <input wire:model="judul" type="text" class="form-control @error('judul') is-invalid @enderror">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-lg-8">
                        <label>Indikator <sup class="text-danger">*</sup></label>
                        <select wire:model="indikator_id" class="form-control @error('indikator_id') is-invalid @enderror">
                            <option>-- Pilih Indikator Sesuai Kegiatan --</option>
                            @foreach ($indikator as $item)
                            <option value="{{ $item->id }}">{{ $item->point }}</option>                            
                            @endforeach
                        </select>
                        @error('indikator_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Satuan <sup class="text-danger">*</sup></label>
                        <select wire:model="satuan" class="form-control @error('satuan') is-invalid @enderror">
                            <option>-- Pilih Satuan Sesuai Kegiatan --</option>
                            <option value="Semester">Semester</option>
                            <option value="Dokumen">Dokumen</option>
                            <option value="Pertemuan">Pertemuan</option>
                            <option value="Kali">Kali</option>
                            <option value="Kegiatan">Kegiatan</option>
                        </select>
                        @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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
    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <button wire:click="create" class="btn btn-sm btn-primary">
                        <div wire:loading wire:target="create">
                            <span class="spinner-border spinner-border-sm mr-1"></span>
                        </div>
                        Create  
                    </button>
                </h4>
                <div class="card-header-form">
                    <div class="input-group">
                        <input wire:model="search" type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th width="5%" class="text-center">No.</th>
                            <th width="30%">Judul</th>
                            <th width="20%" class="text-center">Indikator</th>
                            <th width="15%" class="text-center">Tugas</th>
                            <th width="10%" class="text-center">Satuan</th>
                            <th width="20%">Action</th>
                        </tr>
                        @php $no = 1 @endphp
                        @forelse ($kegiatan as $item)
                        <tr>
                            <td width="5%" class="text-center">{{ $no++ }}</td>
                            <td width="30%">{{ $item->judul }}</td>
                            <td width="20%" class="text-center">
                                <h6><span class="badge badge-warning">{{ $item->indikator->point }}</span></h6>
                            </td>
                            <td width="15%" class="text-center">
                                <h6><span class="badge badge-info">{{ $item->indikator->tugas->nama }}</span></h6>
                            </td>
                            <td width="10%" class="text-primary text-center">{{ $item->satuan }}</td>
                            <td width="20%">
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
                                data kegiatan masih kosong
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="card-footer text-left">
                <nav class="d-inline-block">
                    {{ $kegiatan->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
