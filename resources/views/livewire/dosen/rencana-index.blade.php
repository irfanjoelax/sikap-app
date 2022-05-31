<div class="row">
    <div class="col-lg-12">
        <x-alert></x-alert>
    </div>
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
                {{-- <div class="card-header-form">
                    <div class="input-group">
                        <input wire:model="search" type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th width="5%" class="text-center">No.</th>
                            <th width="40%">Kegiatan</th>
                            <th width="20%" class="text-center">Semester/TA</th>
                            <th width="10%" class="text-center">Target</th>
                            <th width="25%" class="text-center">Action</th>
                        </tr>
                        @php $no = 1 @endphp
                        @forelse ($rencana as $item)
                        <tr>
                            <td width="5%" class="text-center">{{ $no++ }}</td>
                            <td width="40%">{{ $item->kegiatan->judul }}</td>
                            <td width="20%" class="text-center text-primary">
                                {{ $item->semester }} - {{ $item->tahun_akademik }}
                            </td>
                            <td width="10%" class="text-center">
                                <h6><span class="badge badge-primary">{{ $item->target }}</span></h6>
                            </td>
                            <td width="25%" class="text-center">
                                <button wire:click="detail({{ $item->id }})" class="btn btn-sm btn-info">
                                    <div wire:loading wire:target="detail({{ $item->id }})">
                                        <span class="spinner-border spinner-border-sm mr-1"></span>
                                    </div>
                                    Detail  
                                </button>
                                <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger">
                                    <div wire:loading wire:target="delete({{ $item->id }})">
                                        <span class="spinner-border spinner-border-sm mr-1"></span>
                                    </div>
                                    Delete  
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-capitalize">
                                data rencana masih kosong
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="card-footer text-left">
                <nav class="d-inline-block">
                    {{ $rencana->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>