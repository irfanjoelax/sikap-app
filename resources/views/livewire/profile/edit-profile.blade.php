<div class="modal-body">
    <div class="row">
        <div class="form-group col-sm-12">
            <label>Name:</label><span class="required">*</span>
            <input type="text" wire:model="name" class="form-control" value="{{ Auth::user() }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label>Email:</label><span class="required">*</span>
            <input type="text" wire:model="email" class="form-control" value="{{ $email }}">
        </div>
    </div>
    <div class="text-right">
        <button wire:click="updateProfile" class="btn btn-primary" wire:loading.attr="disabled">
            <div wire:loading wire:target="updateProfile">
                <span class="spinner-border spinner-border-sm mr-1"></span>Processing 
            </div>
            Save
        </button>
        <button wire:click="resetForm()" class="btn btn-light ml-1 edit-cancel-margin margin-left-5" data-dismiss="modal">
            Cancel
        </button>
    </div>
</div>