<?php

namespace App\Http\Livewire\Dosen;

use App\Models\LaporanDosen;
use App\Models\RencanaDosen;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LaporanCreate extends Component
{
    // properties
    public $rencana_id, $tanggal, $jumlah;

    // validation rules
    protected $rules = [
        'rencana_id'    => 'required',
        'tanggal'       => 'required',
        'jumlah'        => 'required',
    ];

    protected $messages = [
        'rencana_id.required'   => 'rencana tidak boleh kosong.',
        'tanggal.required'      => 'tanggal tidak boleh kosong.',
        'jumlah.required'       => 'jumlah tidak boleh kosong.',
    ];

    public function render()
    {
        $rencana = RencanaDosen::where('user_id', Auth::id())->latest()->get();

        return view('livewire.dosen.laporan-create', [
            'rencana' => $rencana,
        ]);
    }

    public function cancel()
    {
        $this->reset([
            'rencana_id', 'tanggal', 'jumlah',
        ]);
    }

    public function submit()
    {
        $this->validate();

        LaporanDosen::create([
            'rencana_dosen_id' => $this->rencana_id,
            'tanggal'           => $this->tanggal,
            'jumlah'            => $this->jumlah
        ]);

        $this->cancel();
        session()->flash('flash-primary', 'Laporan Anda berhasil ditambahkan');
    }
}
