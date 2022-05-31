<?php

namespace App\Http\Livewire\Admin;

use App\Models\Indikator;
use App\Models\Kegiatan;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class KegiatanIndex extends Component
{
    // features
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // properties
    public $search = null;
    public $formShow = false;
    public $isSelected = false;
    public $kegiatanID, $judul, $satuan, $indikator_id;

    // validation rules
    protected $rules = [
        'judul' => 'required|min:3',
        'satuan' => 'required',
        'indikator_id' => 'required',
    ];

    protected $messages = [
        'judul.required' => 'judul tidak boleh kosong.',
        'judul.min' => 'judul minimal 3 karakter.',
        'satuan.required' => 'satuan tidak boleh kosong.',
        'indikator_id.required' => 'tugas tidak boleh kosong.',
    ];

    // function or methods
    public function render()
    {
        if ($this->search != null) {
            $kegiatan = Kegiatan::where('judul', 'like', '%' . $this->search . '%');
        } else {
            $kegiatan = new Kegiatan;
        }
        return view('livewire.admin.kegiatan-index', [
            'kegiatan'  => $kegiatan->latest()->paginate(15),
            'indikator' => Indikator::latest()->get()
        ]);
    }

    public function resetForm()
    {
        $this->reset([
            'kegiatanID', 'judul', 'satuan', 'indikator_id', 'isSelected', 'formShow'
        ]);
        $this->emit('backTop');
    }

    public function create()
    {
        $this->resetForm();
        $this->formShow = true;
    }

    public function select($id)
    {
        $this->kegiatanID = $id;
        $data = Kegiatan::find($this->kegiatanID);

        $this->isSelected = true;
        $this->judul        = $data->judul;
        $this->indikator_id = $data->indikator_id;
        $this->satuan       = $data->satuan;

        $this->formShow = true;
        $this->emit('backTop');
    }

    public function submit()
    {
        $this->validate();

        Kegiatan::updateOrInsert(
            ['id' => $this->kegiatanID],
            [
                'id'            => $this->kegiatanID,
                'judul'         => Str::title($this->judul),
                'satuan'        => $this->satuan,
                'indikator_id'  => $this->indikator_id,
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

    public function delete($id_kegiatan)
    {
        Kegiatan::find($id_kegiatan)->delete();

        $this->resetForm();
        session()->flash('flash-danger', 'data kegiatan berhasil dihapus');
    }
}
