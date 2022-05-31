<?php

namespace App\Http\Livewire\Dosen;

use App\Models\RencanaDosen;
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
        $this->title        = RencanaDosen::find($id_rencana)->kegiatan->judul;
        $this->dataDetail   = RencanaDosen::find($id_rencana)->laporan;
    }

    public function render()
    {
        return view('livewire.dosen.rencana-detail-modal', [
            'data' => RencanaDosen::find($this->rencanaID),
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
