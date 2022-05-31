<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password, $password_confirmation;

    protected $rules = [
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ];

    protected $messages = [
        'password.required' => 'Password baru tidak boleh kosong.',
        'password.confirmed' => 'Password baru dan password confirmation harus sama.',
        'password_confirmation.required' => 'Password confirmation tidak boleh kosong.',
    ];

    public function render()
    {
        return view('livewire.profile.change-password');
    }

    public function resetForm()
    {
        $this->reset(['password', 'password_confirmation']);
    }

    public function changePassword()
    {
        $this->validate();

        $user = User::find(Auth::id());
        $user->update([
            'password'  => Hash::make($this->password),
        ]);

        session()->flash('flash-primary', 'Password anda berhasil diubah');

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
