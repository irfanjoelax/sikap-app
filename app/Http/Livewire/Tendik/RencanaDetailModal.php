<?php

namespace App\Http\Livewire\Tendik;

use App\Models\RencanaTendik;
use Livewire\Component;

class RencanaDetailModal extends Component
{
    // properties
    public $rencanaID, $title;
    public $dataDetail = [];

    // event listeners
    protected $listeners = [
        'showModalDetail' => 'parseRencanaId'
    ];

    public function parseRencanaId($id_rencana)
    {
        $this->rencanaID    = $id_rencana;
        $this->title        = RencanaTendik::find($id_rencana)->judul;
        $this->dataDetail   = RencanaTendik::find($id_rencana)->laporan;
    }

    public function render()
    {
        return view('livewire.tendik.rencana-detail-modal', [
            'data' => RencanaTendik::find($this->rencanaID),
        ]);
    }

    public function close()
    {
        $this->reset([
            'rencanaID', 'title'
        ]);

        $this->emit('hideModalDetail');
    }
}
