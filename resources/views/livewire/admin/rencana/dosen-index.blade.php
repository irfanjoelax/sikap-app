<div class="row">
    <div class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <select wire:model="dosen_id" class="form-control">
                <option value="">-- Pilih Nama Dosen --</option>
                @foreach ($dosen as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <select wire:model="semester" class="form-control @error('semester') is-invalid @enderror">
                <option value="">- Semester -</option>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <select wire:model="tahun" class="form-control @error('tahun') is-invalid @enderror">
                <option value="">-- Pilih Tahun Akademik --</option>
                @for ($i = 2020; $i < date('Y'); $i++)
                <option value="{{ $i .'/'.strval($i+1) }}" {{ (old('semester') == $i .'/'.strval($i+1)) ? 'selected' : '' }} >{{ $i .'/'.strval($i+1) }}</option>
                @endfor
            </select>
        </div>
        <button wire:click="filter" class="btn btn-primary mb-2">
            <div wire:loading wire:target="filter">
                <span class="spinner-border spinner-border-sm mr-1"></span>
            </div>
            Filter
        </button>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Rencana</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th width="5%" class="text-center">No.</th>
                            <th width="40%">Kegiatan</th>
                            <th width="20%" class="text-center">Semester/TA</th>
                            <th width="5%" class="text-center">Target</th>
                            <th width="15%" class="text-center">Progres</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                        @php $no = 1 @endphp
                        @forelse ($rencana as $item)
                        @php
                            $progres = $item->laporan->sum('jumlah');
                            $target  = $item->target;
                            $hitung  = ceil(($progres / $target) * 100);
                        @endphp
                        <tr>
                            <td width="5%" class="text-center">{{ $no++ }}</td>
                            <td width="40%">{{ $item->kegiatan->judul }}</td>
                            <td width="20%" class="text-center text-primary">
                                {{ $item->semester }} - {{ $item->tahun_akademik }}
                            </td>
                            <td width="5%" class="text-center">
                                <h6><span class="badge badge-primary">{{ $item->target }}</span></h6>
                            </td>
                            <td width="15%">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $hitung }}%;" aria-valuenow="{{ $hitung }}" aria-valuemin="0" aria-valuemax="100">{{ $hitung }}%</div>
                                </div>
                            </td>
                            <td width="15%" class="text-center">
                                <button wire:click="detail({{ $item->id }})" class="btn btn-sm btn-info">
                                    <div wire:loading wire:target="detail({{ $item->id }})">
                                        <span class="spinner-border spinner-border-sm mr-1"></span>
                                    </div>
                                    Detail  
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-capitalize">
                                silakan lakukan filter untuk pencarian dosen / <span class="text-danger">data masih kosong</span>
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
