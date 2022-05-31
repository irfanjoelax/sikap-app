<div class="modal-body">
    <div class="row">
        <div class="form-group col-sm-12">
            <label>New Password:</label><span class="required">*</span>
            <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            <label>Confirm Password:</label><span class="required">*</span>
            <input type="password" wire:model="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="text-right">
        <button wire:click="changePassword" class="btn btn-primary" wire:loading.attr="disabled">
            <div wire:loading wire:target="changePassword">
                <span class="spinner-border spinner-border-sm mr-1"></span>Processing 
            </div>
            Save
        </button>
        <button wire:click="resetForm()" class="btn btn-light ml-1 edit-cancel-margin margin-left-5" data-dismiss="modal">
            Cancel
        </button>
    </div>
</div>