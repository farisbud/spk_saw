<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table='alternatif';

    //  protected $primaryKey = 'id_category';
    


    protected $fillable=[
        'nama_alternatif',
        'kabupaten',
        'provinsi',
       ];

       public function nilai_saw(){
        return $this->hasMany(Nilai_saw::class);
    }
    
    //
}
