<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;


    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function indikator()
    {
        return $this->belongsTo('App\Models\Indikator');
    }

    // public function laporan()
    // {
    //     return $this->belongsTo('App\Models\Laporan', 'kegiatan_id', 'id');
    // }
}
