<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

   // protected $guarded = 'id';
    
    protected $fillable = [
       // 'nama',
        'nama_kriteria',
        'keterangan',
        'bobot',
        'type',
    ];

    public function nilai_saw(){
        return $this->hasMany(Nilai_saw::class);
    }
    //
}
