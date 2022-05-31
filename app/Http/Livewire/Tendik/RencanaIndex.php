<?php

namespace App\Http\Livewire\Tendik;

use App\Models\RencanaTendik;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RencanaIndex extends Component
{
    // features
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // properties
    public $search = null;

    // event listeners
    protected $listeners = [
        'rencanaAdded' => 'showAlertForSuccess'
    ];

    // function or methods
    public function render()
    {
        $rencana = RencanaTendik::where('user_id', Auth::id())
            ->latest()
            ->paginate(15);

        return view('livewire.tendik.rencana-index', [
            'rencana'  => $rencana,
        ]);
    }

    public function create()
    {
        $this->emit('showModal');
    }

    public function showAlertForSuccess()
    {
        session()->flash('flash-primary', 'Data Rencana Anda berhasil ditambahkan');
    }

    public function delete($id_rencana)
    {
        RencanaTendik::find($id_rencana)->delete();
        session()->flash('flash-danger', 'data RencanaDosen berhasil dihapus');
    }

    public function detail($id_rencana)
    {
        $this->emit('showModalDetail', $id_rencana);
    }
}
