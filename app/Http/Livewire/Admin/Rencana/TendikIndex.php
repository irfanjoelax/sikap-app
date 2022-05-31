<?php

namespace App\Http\Livewire\Admin\Rencana;

use App\Models\RencanaTendik;
use App\Models\User;
use Livewire\Component;

class TendikIndex extends Component
{
    public $dataRencana = [];
    public $tendik_id, $tahun;

    public function render()
    {
        return view('livewire.admin.rencana.tendik-index', [
            'tendik'    => User::role('tendik')->latest()->get(),
            'rencana'   => $this->dataRencana,
        ]);
    }

    public function filter()
    {
        $where = [
            'user_id' => $this->tendik_id,
            'tahun' => $this->tahun,
        ];

        $this->dataRencana = RencanaTendik::where($where)->get();
    }

    public function detail($id_rencana)
    {
        $this->emit('showModalDetail', $id_rencana);
    }
}
