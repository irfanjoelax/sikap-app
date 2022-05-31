<div class="row">
    <div class="col-lg-12">
        <x-alert></x-alert>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 form-group">
                    <label>Rencana <sup class="text-danger">*</sup></label>
                    <select wire:model="rencana_id" class="form-control @error('rencana_id') is-invalid @enderror">
                        <option value="">-- Pilih Rencana --</option>
                        @foreach ($rencana as $item)
                            <option value="{{ $item->id }}">{{ $item->judul }}</option>
                        @endforeach
                    </select>
                    @error('rencana_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-7 form-group">
                    <label>Kegiatan <sup class="text-danger">*</sup></label>
                    <input type="text" wire:model="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror">
                    @error('kegiatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-3 form-group">
                    <label>Tanggal <sup class="text-danger">*</sup></label>
                    <input type="date" wire:model="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-2 form-group">
                    <label>Jumlah <sup class="text-danger">*</sup></label>
                    <input type="number" wire:model="jumlah" class="form-control @error('jumlah') is-invalid @enderror">
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button wire:click="submit" class="btn btn-primary mr-2">
                    <div wire:loading wire:target="submit">
                        <span class="spinner-border spinner-border-sm mr-1"></span>Processing
                    </div>
                    Saved  
                </button>
                <button wire:click="cancel" class="btn btn-secondary mr-2">
                    <div wire:loading wire:target="cancel">
                        <span class="spinner-border spinner-border-sm mr-1"></span>
                    </div>
                    Cancel  
                </button>
            </div>
        </div>
    </div>
</div>
