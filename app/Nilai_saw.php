<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Nilai_saw extends Model
{
    protected $table = 'nilai_saw';

   // protected $guarded = 'id';
    
    protected $fillable = [
       // 'nama',
        'alternatif_id',
        'kriteria_id',
        'nilai',
    ];

    public function kriteria(){
        return $this->belongsTo(Kriteria::class);
    }

    public function alternatif(){
        return $this->belongsTo(Alternatif::class);
    }
    //

}
