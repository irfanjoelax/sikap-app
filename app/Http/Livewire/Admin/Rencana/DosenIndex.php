<?php

namespace App\Http\Livewire\Admin\Rencana;

use App\Models\RencanaDosen;
use App\Models\User;
use Livewire\Component;

class DosenIndex extends Component
{
    public $dataRencana = [];
    public $dosen_id;
    public $semester;
    public $tahun;

    public function render()
    {
        return view('livewire.admin.rencana.dosen-index', [
            'dosen'     => User::role('dosen')->latest()->get(),
            'rencana'   => $this->dataRencana,
        ]);
    }

    public function filter()
    {
        $where = [
            'user_id' => $this->dosen_id,
            'semester' => $this->semester,
            'tahun_akademik' => $this->tahun,
        ];

        $this->dataRencana = RencanaDosen::where($where)->get();
    }

    public function detail($id_rencana)
    {
        $this->emit('showModalDetail', $id_rencana);
    }
}
