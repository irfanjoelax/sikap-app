<?php

namespace App\Http\Livewire\Tendik;

use App\Models\LaporanTendik;
use App\Models\RencanaTendik;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LaporanCreate extends Component
{
    // properties
    public $rencana_id, $kegiatan, $tanggal, $jumlah;

    // validation rules
    protected $rules = [
        'rencana_id'    => 'required',
        'kegiatan'      => 'required',
        'tanggal'       => 'required',
        'jumlah'        => 'required',
    ];

    protected $messages = [
        'rencana_id.required'   => 'rencana tidak boleh kosong.',
        'kegiatan.required'      => 'kegiatan tidak boleh kosong.',
        'tanggal.required'      => 'tanggal tidak boleh kosong.',
        'jumlah.required'       => 'jumlah tidak boleh kosong.',
    ];

    public function render()
    {
        $rencana = RencanaTendik::where('user_id', Auth::id())->latest()->get();

        return view('livewire.tendik.laporan-create', [
            'rencana' => $rencana,
        ]);
    }

    public function cancel()
    {
        $this->reset([
            'rencana_id', 'kegiatan', 'tanggal', 'jumlah',
        ]);
    }

    public function submit()
    {
        $this->validate();

        LaporanTendik::create([
            'rencana_tendik_id'  => $this->rencana_id,
            'kegiatan'          => $this->kegiatan,
            'tanggal'           => $this->tanggal,
            'jumlah'            => $this->jumlah
        ]);

        $this->cancel();
        session()->flash('flash-primary', 'Laporan Anda berhasil ditambahkan');
    }
}
