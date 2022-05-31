<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Data Rencana Anda</h5>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-3 form-group">
                <label>Tugas <sup class="text-danger">*</sup></label>
                <select wire:model="tugas_id" class="form-control @error('tugas_id') is-invalid @enderror">
                    <option value="">-- Pilih Tugas --</option>
                    @foreach ($tugas as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('tugas_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-4 form-group">
                <label>Indikator<sup class="text-danger">*</sup></label>
                <select wire:model="indikator_id" class="form-control @error('indikator_id') is-invalid @enderror" @if ($tugas_id == null) disabled @endif>
                    <option value="">-- Pilih Indikator --</option>
                    @foreach ($indikator as $item)
                        <option value="{{ $item->id }}">{{ $item->point }}</option>
                    @endforeach
                </select>
                @error('indikator_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-5 form-group">
                <label>Kegiatan<sup class="text-danger">*</sup></label>
                <select wire:model="kegiatan_id" class="form-control @error('kegiatan_id') is-invalid @enderror" @if ($indikator_id == null) disabled @endif>
                    <option value="">-- Pilih Kegiatan --</option>
                    @foreach ($kegiatan as $item)
                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                    @endforeach
                </select>
                @error('kegiatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-4 form-group">
                <label>Semester<sup class="text-danger">*</sup></label>
                <select wire:model="semester" class="form-control @error('semester') is-invalid @enderror">
                    <option value="">-- Pilih Semester --</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
                @error('semester')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-5 form-group">
                <label>Tahun Akademik<sup class="text-danger">*</sup></label>
                <select wire:model="tahun_akademik" class="form-control @error('tahun_akademik') is-invalid @enderror">
                    <option value="">-- Pilih Tahun Akademik --</option>
                    @for ($i = 2020; $i < date('Y'); $i++)
                    <option value="{{ $i .'/'.strval($i+1) }}" {{ (old('semester') == $i .'/'.strval($i+1)) ? 'selected' : '' }} >{{ $i .'/'.strval($i+1) }}</option>
                    @endfor
                </select>
                @error('tahun_akademik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-3 form-group">
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