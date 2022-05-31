<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class EditProfile extends Component
{
    public $name, $email;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function render()
    {
        return view('livewire.profile.edit-profile');
    }

    public function resetForm()
    {
        $this->mount();
    }

    public function updateProfile()
    {
        $user = User::find(Auth::id());
        $user->update([
            'name'  => Str::title($this->name),
            'email' => $this->email,
        ]);

        session()->flash('flash-primary', 'Profil anda berhasil diubah');

        if ($user->hasRole('admin')) {
            return redirect()->to('admin/home');
        }

        if ($user->hasRole('dosen')) {
            return redirect()->to('dosen/home');
        }

        if ($user->hasRole('tendik')) {
            return redirect()->to('tendik/home');
        }
    }
}
