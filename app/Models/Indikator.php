<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tugas()
    {
        return $this->belongsTo('App\Models\Tugas');
    }

    public function rencana_dosen()
    {
        return $this->hasMany('App\Models\RencanaDosen');
    }

    // public function kegiatan()
    // {
    //     return $this->hasMany('App\Models\Kegiatan');
    // }
}
