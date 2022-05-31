<div class="row">
    <div class="col-lg-12">
        <x-alert></x-alert>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar User</h4>
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
                            <th width="35%">Name</th>
                            <th width="25%" class="text-center">Email</th>
                            <th width="15%" class="text-center">Role</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                        @php $no = 1 @endphp
                        @forelse ($users as $item)
                        <tr>
                            <td width="5%" class="text-center">{{ $no++ }}</td>
                            <td width="35%">{{ $item->name }}</td>
                            <td width="25%" class="text-center text-primary">
                                {{ $item->email }}
                            </td>
                            <td width="15%" class="text-center">
                                @if ($item->hasRole('admin'))
                                <h6><span class="badge badge-primary">Administrator</span></h6>
                                @endif
                                @if ($item->hasRole('dosen'))
                                <h6><span class="badge badge-warning">Dosen/Pejabat</span></h6>
                                @endif
                                @if ($item->hasRole('tendik'))
                                <h6><span class="badge badge-info">Tenaga Pendidik</span></h6>
                                @endif
                            </td>
                            <td width="20%" class="text-center">
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
                                data user masih kosong
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="card-footer text-left">
                <nav class="d-inline-block">
                    {{ $users->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
