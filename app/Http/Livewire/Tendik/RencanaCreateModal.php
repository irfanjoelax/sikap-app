<?php

namespace App\Http\Livewire\Tendik;

use App\Models\RencanaTendik;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RencanaCreateModal extends Component
{
    // properties
    public $judul, $tahun, $target;

    // validation rules
    protected $rules = [
        'judul'     => 'required',
        'tahun'     => 'required',
        'target'    => 'required',
    ];

    protected $messages = [
        'judul.required'    => 'judul tidak boleh kosong.',
        'tahun.required'    => 'tahun tidak boleh kosong.',
        'target.required'   => 'target tidak boleh kosong.',
    ];

    // function or methods
    public function render()
    {
        return view('livewire.tendik.rencana-create-modal');
    }

    public function cancel()
    {
        $this->reset([
            'judul', 'tahun', 'target'
        ]);

        $this->emit('hideModal');
    }

    public function submit()
    {
        $this->validate();

        RencanaTendik::create([
            'user_id'   => Auth::id(),
            'judul'     => $this->judul,
            'target'    => $this->target,
            'tahun'     => $this->tahun,
        ]);

        $this->cancel();
        $this->emit('rencanaAdded');
    }
}
