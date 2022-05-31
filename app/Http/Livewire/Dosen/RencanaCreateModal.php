<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Indikator;
use App\Models\Kegiatan;
use App\Models\RencanaDosen;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RencanaCreateModal extends Component
{
    // properties
    public $tugas_id, $indikator_id, $kegiatan_id, $semester, $tahun_akademik, $target;

    // validation rules
    protected $rules = [
        'tugas_id'          => 'required',
        'semester'          => 'required',
        'tahun_akademik'    => 'required',
        'target'            => 'required',
    ];

    protected $messages = [
        'tugas_id.required'         => 'tugas tidak boleh kosong.',
        'semester.required'         => 'semester tidak boleh kosong.',
        'tahun_akademik.required'   => 'tahun akademik tidak boleh kosong.',
        'target.required'           => 'target tidak boleh kosong.',
    ];

    // function or methods
    public function render()
    {
        $indikator  = [];
        $kegiatan   = [];

        if ($this->tugas_id != null) {
            $indikator = Indikator::where('tugas_id', $this->tugas_id)->latest()->get();
        }

        if ($this->indikator_id != null) {
            $kegiatan = Kegiatan::where('indikator_id', $this->indikator_id)->latest()->get();
        }

        return view('livewire.dosen.rencana-create-modal', [
            'tugas'     => Tugas::latest()->get(),
            'indikator' => $indikator,
            'kegiatan'  => $kegiatan,
        ]);
    }

    public function cancel()
    {
        $this->reset([
            'tugas_id', 'indikator_id', 'kegiatan_id', 'semester', 'tahun_akademik', 'target'
        ]);

        $this->emit('hideModal');
    }

    public function submit()
    {
        $this->validate();

        RencanaDosen::create([
            'user_id'        => Auth::id(),
            'tugas_id'       => $this->tugas_id,
            'indikator_id'   => $this->indikator_id,
            'kegiatan_id'    => $this->kegiatan_id,
            'target'         => $this->target,
            'semester'       => $this->semester,
            'tahun_akademik' => $this->tahun_akademik,
        ]);

        $this->cancel();
        $this->emit('rencanaAdded');
    }
}
