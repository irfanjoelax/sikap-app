<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    // features
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // properties
    public $search = null;

    public function render()
    {
        if ($this->search != null) {
            $user = User::where('name', 'like', '%' . $this->search . '%');
        } else {
            $user = new User;
        }

        return view('livewire.admin.user-index', [
            'users' => $user->latest()->paginate(15)
        ]);
    }

    public function delete($id_user)
    {
        User::find($id_user)->delete();
        session()->flash('flash-danger', 'data user berhasil dihapus');
    }
}
