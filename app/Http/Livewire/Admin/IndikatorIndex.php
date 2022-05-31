<?php

namespace App\Http\Livewire\Admin;

use App\Models\Indikator;
use App\Models\Tugas;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class IndikatorIndex extends Component
{
    // features
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // properties
    public $search = null;
    public $isSelected = false;
    public $indikatorID, $point, $tugas_id;

    // validation rules
    protected $rules = [
        'point' => 'required|min:3',
        'tugas_id' => 'required',
    ];

    protected $messages = [
        'point.required' => 'point tidak boleh kosong.',
        'point.min' => 'point minimal 3 karakter.',
        'tugas_id.required' => 'tugas tidak boleh kosong.',
    ];

    // function or methods
    public function render()
    {
        return view('livewire.admin.indikator-index', [
            'indikator' => Indikator::latest()->paginate(10),
            'tugas'     => Tugas::latest()->get()
        ]);
    }

    public function select($id)
    {
        $this->indikatorID = $id;
        $data = Indikator::find($this->indikatorID);

        $this->isSelected = true;
        $this->point = $data->point;
        $this->tugas_id = $data->tugas_id;
    }

    public function submit()
    {
        $this->validate();

        Indikator::updateOrInsert(
            ['id' => $this->indikatorID],
            [
                'id'            => $this->indikatorID,
                'point'          => Str::title($this->point),
                'tugas_id'      => $this->tugas_id,
                'created_at'    => now(),
                'updated_At'    => now(),
            ]
        );

        if ($this->isSelected) {
            session()->flash('flash-success', 'Data kegiatan berhasil diubah');
        } else {
            session()->flash('flash-primary', 'Data kegiatan berhasil ditambah');
        }

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['indikatorID', 'point', 'tugas_id', 'isSelected']);
    }


    public function delete($id_indikator)
    {
        Indikator::find($id_indikator)->delete();

        $this->resetForm();
        session()->flash('flash-danger', 'data indikator berhasil dihapus');
    }
}
