<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Data Rencana Anda</h5>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12 form-group">
                <label>Judul Rencana<sup class="text-danger">*</sup></label>
                <input type="text" wire:model="judul" class="form-control @error('judul') is-invalid @enderror">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-7 form-group">
                <label>Tahun<sup class="text-danger">*</sup></label>
                <select wire:model="tahun" class="form-control @error('tahun') is-invalid @enderror">
                    <option value="">-- Pilih Tahun --</option>
                    @for ($i = 2020; $i < date('Y'); $i++)
                    <option value="{{ $i }}" {{ (old('semester') == $i) ? 'selected' : '' }} >{{ $i }}</option>
                    @endfor
                </select>
                @error('tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-5 form-group">
                <label>Target<sup class="text-danger">*</sup></label>
                <input type="number" wire:model="target" class="form-control @error('target') is-invalid @enderror">
                @error('target')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button wire:click="submit" class="btn btn-primary">
            <div wire:loading wire:target="submit">
                <span class="spinner-border spinner-border-sm mr-1"></span>Processing
            </div>
            Saved  
        </button>
        <button wire:click="cancel" class="btn btn-secondary">
            <div wire:loading wire:target="cancel">
                <span class="spinner-border spinner-border-sm mr-1"></span>
            </div>
            Cancel  
        </button>
    </div>
</div>