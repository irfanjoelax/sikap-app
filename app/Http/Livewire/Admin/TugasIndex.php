<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tugas;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class TugasIndex extends Component
{
    // features
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // properties
    public $search = null;
    public $isSelected = false;
    public $tugasID, $nama;

    protected $rules = [
        'nama' => 'required|min:3',
    ];

    protected $messages = [
        'nama.required' => 'nama tidak boleh kosong.',
        'nama.min' => 'nama minimal 3 karakter.',
    ];

    // function or methods
    public function render()
    {
        return view('livewire.admin.tugas-index', [
            'tugas' => Tugas::latest()->paginate(10)
        ]);
    }

    public function select($id)
    {
        $this->tugasID = $id;
        $orang = Tugas::find($this->tugasID);

        $this->isSelected = true;
        $this->nama = $orang->nama;
    }

    public function submit()
    {
        $this->validate();

        Tugas::updateOrInsert(
            ['id' => $this->tugasID],
            [
                'id'            => $this->tugasID,
                'nama'          => Str::title($this->nama),
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
        $this->reset(['tugasID', 'nama', 'isSelected']);
    }


    public function delete($id_tugas)
    {
        Tugas::find($id_tugas)->delete();

        $this->resetForm();
        session()->flash('flash-danger', 'data tugas berhasil dihapus');
    }
}
