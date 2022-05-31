<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaDosen extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function kegiatan()
    {
        return $this->hasOne('App\Models\Kegiatan', 'id', 'kegiatan_id');
    }

    public function indikator()
    {
        return $this->hasOne('App\Models\Indikator', 'id', 'indikator_id');
    }

    public function tugas()
    {
        return $this->hasOne('App\Models\Tugas', 'id', 'tugas_id');
    }

    public function laporan()
    {
        return $this->hasMany('App\Models\LaporanDosen');
    }

    public function tugas_chart()
    {
        return $this->belongsTo('App\Models\Tugas');
    }

    public function indikator_chart()
    {
        return $this->belongsTo('App\Models\Indikator');
    }
}
