<?php

namespace App\Http\Controllers;

use App\Nilai_saw;
use App\Kriteria;
use App\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    return view('page_hitung.hitung_saw');

    }

    public function matrixX(){
        
        $kriteria = Kriteria::select('id','nama_kriteria')->get();
        $alternatif = Alternatif::select('id','nama_alternatif')->latest()->get();

        $matriks_x = array();
        $list_kriteria = array();
        foreach($kriteria as $ktr):
          $list_kriteria[$ktr['id']] = $ktr;
          foreach($alternatif as $alter):
            
            $id_alter = $alter['id'];
            $id_ktr = $ktr['id'];
            
            // Fetch nilai dari db
            $nilai = Nilai_saw::select('nilai')->where('alternatif_id', $id_alter, 'and')->where('kriteria_id', $id_ktr)->first();

            if($nilai_saw = $nilai) {
              // Jika ada nilai kriterianya
             $matriks_x[$id_ktr][$id_alter] = $nilai_saw['nilai'];
              
            } else {			
              $matriks_x[$id_ktr][$id_alter] = 0;
            }

          endforeach;
        endforeach;

        if($alternatif->count() > 0){
              //table
              $table = '';
              $no = 1;
              $table.= '<table class="table table-bordered">
              <thead>
                <tr class="super-top">
                  <th rowspan="2">No</th>
                  <th rowspan="2" class="super-top-left"> nama Alternatif</th>
                  <th colspan="'. $kriteria->count() .'">Kriteria</th>
                </tr>
                <tr>';
                  foreach ($kriteria as $ktr){

                      $table .='<th>'.$ktr->nama_kriteria.'</th>';
                
                  }
              $table .= '</tr>
              </thead>
              <tbody>';
              
              foreach ($alternatif as $alter){
              $table .='<tr>
                  <th>'. $no++ .'</th>
                  <td>'. $alter->nama_alternatif .'</td>';
                  
                  foreach($kriteria as $ktr){
                    $id_alter = $alter['id'];
                    $id_ktr = $ktr['id'];
              $table .='<td>'. $matriks_x[$id_ktr][$id_alter] .'</td>';
                  }

              $table .= '</tr>';
              }

            $table.= '</tbody>
                    </table>';
            
            echo $table;




        }else{

          echo '<h1 class="text-center text-secondary my-5">tidak ada data di database!</h1>';
        
        }

    }

    public function hitungSaw(){

      $kriteria = Kriteria::select('id','nama_kriteria','keterangan','bobot','type')->get();
      $alternatif = Alternatif::select('id','nama_alternatif')->latest()->get();
      $digit = 2;
      //mencari nilai matrix
      $matriks_x = array();
      $list_kriteria = array();
      foreach($kriteria as $ktr):
        $list_kriteria[$ktr['id']] = $ktr;
        
        foreach($alternatif as $alter):
          
          $id_alter = $alter['id'];
          $id_ktr = $ktr['id'];
       
          // Fetch nilai dari db
          $nilai = Nilai_saw::select('nilai')->where('alternatif_id', $id_alter, 'and')->where('kriteria_id', $id_ktr)->first();

          if($nilai_saw = $nilai) {
            // Jika ada nilai kriterianya
           $matriks_x[$id_ktr][$id_alter] = $nilai_saw['nilai'];
            
          } else {			
            $matriks_x[$id_ktr][$id_alter] = 0;
          }

        endforeach;
      endforeach;

      //mencari normalisasi matrix
      $matriks_r = array();
      foreach($matriks_x as $id_ktr => $nilai_R):
        
        $tipe = $list_kriteria[$id_ktr]['type'];
    
        foreach($nilai_R as $id_alter => $nilai) {
          if($tipe == 'benefit') {
            $nilai_normal = $nilai / max($nilai_R);
          } elseif($tipe == 'cost') {
            $nilai_normal = min($nilai_R) / $nilai;
          }
          
          $matriks_r[$id_ktr][$id_alter] = $nilai_normal;
        }
        
      endforeach;

      //mencari rangking
      $ranks = array();
      foreach($alternatif as $alter):

        $total_nilai = 0;
        foreach($list_kriteria as $ktr) {
        
          $bobot = $ktr['bobot'];
    
          $id_alter = $alter['id'];
          $id_ktr = $ktr['id'];
          
          $nilai_r = $matriks_r[$id_ktr][$id_alter];

          $bulat = round($nilai_r,$digit);

          $total_nilai = $total_nilai + ($bulat * $bobot);
       
        }
        
        $ranks[$alter['id']]['id'] = $alter['id'];
        $ranks[$alter['id']]['nama_alternatif'] = $alter['nama_alternatif'];
        $ranks[$alter['id']]['nilai'] = $total_nilai;
        
        
      endforeach;

      //sorting rangking
      $sorted_ranks = $ranks;		
		
      if(function_exists('array_multisort')):
        $nm_alter = array();
        $nilai = array();
        foreach ($sorted_ranks as $key => $row) {
          $nm_alter[$key]  = $row['nama_alternatif'];
          $nilai[$key] = $row['nilai'];
        }

        array_multisort($nilai, SORT_DESC, $nm_alter, SORT_ASC, $sorted_ranks);
        
      endif;

      //daftar tabel
      if($alternatif->count() > 0){

        //tabel bobot referensi
        $table = '';
        $no = 1;
      
        $table .= '<div class="d-flex justify-content-center">
                    <h4>Tabel Bobot Referensi</h4>
                    </div>';

        $table .='<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama kriteria</th>
                      <th>Keterangan</th>
                      <th>bobot</th>
                      <th>type</th>
                    </tr> 
                  </thead>
                  <tbody>';
        foreach ($kriteria as $item) {
          
        $table .= '<tr>
                    <td>'. $no++ .'</td>
                    <td>'. $item['nama_kriteria'] .'</td>
                    <td>'. $item['keterangan'] .'</td>
                    <td>'. $item['bobot'] .'</td>
                    <td>'. $item['type'].'</td>
                  </tr>';
        }
        $table .= '</tbody>
                  </table>';
     

        echo $table;

        //tabel normalisasi

          $table_normal = '';
          $no = 1;
        
          $table_normal .= '<div class="d-flex justify-content-center mt-4">
                            <h4>Tabel normalisasi matrix</h4>
                            </div>';

          $table_normal.= '<table class="table table-bordered">
                            <thead>
                              <tr class="super-top">
                                <th rowspan="2">No</th>
                                <th rowspan="2" class="super-top-left"> nama Alternatif</th>
                                <th colspan="'. $kriteria->count() .'">Kriteria</th>
                              </tr>
                              <tr>';
              foreach ($kriteria as $ktr){

                  $table_normal .='<th>'.$ktr['nama_kriteria'].'</th>';
            
              }
          $table_normal .= '</tr>
                          </thead>
                          <tbody>';
          
          foreach ($alternatif as $alter){
          $table_normal .='<tr>
                          <th>'. $no++ .'</th>
                          <td>'. $alter['nama_alternatif'] .'</td>';
              
              foreach($kriteria as $ktr){
                $id_alter = $alter['id'];
                $id_ktr = $ktr['id'];
          $table_normal .='<td>'. round($matriks_r[$id_ktr][$id_alter] ,$digit) .'</td>';
              }

          $table_normal .= '</tr>';
          }

          $table_normal.= '</tbody>
                         </table>';
              
        
        echo $table_normal;

        //tabel rangking
      
        $table_rangking = '';
        $no = 1;
      
        $table_rangking .= '<div class="d-flex justify-content-center mt-4">
                            <h4>Tabel rangking</h4>
                            </div>';

        $table_rangking .='<table class="table table-bordered">
                          <thead>
                            <tr>
                              <th class="super-top-left">No</th>
                              <th>Nama Alternatif</th>
                              <th>Rangking</th>
                            </tr> 
                          </thead>
                          <tbody>';
        foreach ($sorted_ranks as $item) {
          
        $table_rangking .= '<tr>
                              <td>'. $no++ .'</td>
                              <td>'. $item['nama_alternatif'] .'</td>';

        $table_rangking .= '<td>'. round($item['nilai'],$digit) .'</td>';
                
        $table_rangking .= '</tr>';
        }
        $table_rangking .= '</tbody>
                            </table>';

      

        echo $table_rangking;


      }else{
        echo '<h1 class="text-center text-secondary my-5">tidak ada data di database!</h1>';
      }

    }

    public function print(){

      // $view = View::make('page_hitung.saw_print'); 
      // return $view->render();
      return view('page_hitung.saw_print');
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai_saw  $nilai_saw
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai_saw $nilai_saw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai_saw  $nilai_saw
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai_saw $nilai_saw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai_saw  $nilai_saw
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Nilai_saw $nilai_saw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai_saw  $nilai_saw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai_saw $nilai_saw)
    {
        //
    }
}
