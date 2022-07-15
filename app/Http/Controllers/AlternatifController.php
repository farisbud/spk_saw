<?php

namespace App\Http\Controllers;

use App\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Kriteria;
use App\Nilai_saw;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // return view('page_alternatif.alternatif',[
        //     'alternatif'=>Alternatif::latest()->get(),
        // ]);
        return view('page_alternatif.alternatif');
    }

    public function readTable()
    {

        // return response()->json([
        //     'alternatif' => Alternatif::latest()->get(),
        // ]);

        $alternatif = Alternatif::latest()->get();
		$output = '';
        $no= 1;
		if ($alternatif->count() > 0) {
            
			$output .= '<table class="table table-striped table-sm text-center align-middle" id="dataTable_alternatif">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama alternatif</th>
                    <th>Kabupaten</th>
                    <th>Provinsi</th>
                
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($alternatif as $item) {
				$output .= '<tr>
                            <td>'. $no++ .'</td>
                            <td>'. $item->nama_alternatif .'</td>
                            <td>'. $item->kabupaten .'</td>
                            <td>'. $item->provinsi .'</td>
                           
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm showAlter" href="#" id="'.$item->id.'"> 
                                <i class="fas fa-folder">
                                </i>
                                View
                                </a>
                                <a class="btn btn-info btn-sm editAlter" id="'.$item->id.'">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm deleteAlter" href="#" id="'.$item->id.'">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                         </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">tidak ada data di database!</h1>';
		}

    }

    public function readForm()
    {
        $kriteria = Kriteria::select('id','nama_kriteria','keterangan','type')->get();
        
        $form = '';

        if($kriteria->count() > 0)
        {    
            $form .= '<h4>Isi kan nama kriteria sesuai dengan pembobotan</h4>';
            foreach ($kriteria as $item) {
                $form .= '<div class="form-group">
                            <label for="recipient-name" class="col-form-label">'. $item->nama_kriteria .'</label>
                            <label>'. $item->keterangan .'('. $item->type .')</label>
                            <input type="number" step=".01" class="form-control" min="0" value="0" name="kriteria['. $item->id .']">
                            <span class="text-danger error-text '. $item->nama_kriteria .'_error"></span>
                         </div>';
            }
            echo $form;
        }else{
            echo '<div class="form-group">
                    <label for="recipient-name" class="col-form-label">Belum ada data kriteria</label>
                </div>';
        }

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
      
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
           
        ];
        $validate = Validator::make($request->all(),[
            'nama_alternatif' =>'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',

        ], $messages);

    
        if($validate->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validate->messages(),
                'message'=> 'gagal menambahkan data alternatif',
    
            ]);           

        }else{

            // Alternatif::create([
            //     'nama_alternatif' => request('nama_alternatif'),
            //     'kabupaten' => request('kabupaten'),
            //     'provinsi' => request('provinsi'),
            
            // ]);

            $alter = new Alternatif;
            $alter->nama_alternatif = request('nama_alternatif');
            $alter->kabupaten = request('kabupaten');
            $alter->provinsi = request('provinsi');
            $alter->save();
            $alter->id;
            //$kriteria = new kriteria;
        if(!empty($request->kriteria)){
            $ktr['kriteria'] = $request->kriteria;
        
            foreach($ktr['kriteria'] as $item => $nilai){
            $saw = new Nilai_saw;
            $saw->alternatif_id = $alter->id;
            $saw->kriteria_id = $item;
            $saw->nilai = $nilai;
            $saw->save();
            }
        }
            //$nilai->kriteria_id= $request->

            return response()->json([
                'status' => 200,
                'message' => 'berhasil menambahkan alteratif',
    
            ]);

        }

       
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternatif $alternatif)
    {
       // $data = Alternatif::where('id', $alternatif)->get();
        return response()->json($alternatif,200);
        //
    }

    public function readFormEdit($id){

       

        $kriteria = DB::select('SELECT nilai_saw.nilai, kriteria.nama_kriteria, kriteria.keterangan, kriteria.type ,kriteria.id
        FROM kriteria LEFT JOIN nilai_saw 
        ON nilai_saw.kriteria_id = kriteria.id 
        AND nilai_saw.alternatif_id ='.$id.'');
        
      $form = '';

      if($kriteria)
      {    
          $form .= '<h4>Isi kan nama kriteria sesuai dengan pembobotan</h4>';
          foreach ($kriteria as $item) {

         
              $form .= '<div class="form-group">
                          <label for="recipient-name" class="col-form-label">'. $item->nama_kriteria .'</label>
                          <label>'. $item->keterangan .'('. $item->type .')</label>
                          <input type="number" step=".01" class="form-control" min="0" value="'. $item->nilai .'" name="kriteria['. $item->id .']">
                          <span class="text-danger error-text '. $item->nama_kriteria .'_error"></span>
                       </div>';
            
          }
          echo $form;
      }else{
          echo '<div class="form-group">
                  <label for="recipient-name" class="col-form-label">Belum ada data kriteria</label>
              </div>';
      }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

     
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
           
        ];

        $validate = Validator::make($request->all(),[
            'nama_alternatif' =>'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
           

        ], $messages);

    
        if($validate->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validate->messages(),
                'message'=> 'gagal menambahkan data alternatif',
    
            ]);           

        }else{

            // Alternatif::where('id', $id)
            //             ->update([
            //                 'nama_alternatif' => $request->nama_alternatif,
            //                 'kabupaten' => $request->kabupaten,
            //                 'provinsi' => $request->provinsi,
                          
            //             ]);
                
            Alternatif::where('id',$id)->update([
                'nama_alternatif'=> $request->nama_alternatif,
                'kabupaten'=> $request->kabupaten,
                'provinsi'=> $request->provinsi,
            ]);
          
            //$kriteria = new kriteria;
            if(!empty($request->kriteria)){

                $ktr['kriteria'] = $request->kriteria;
              
                foreach($ktr['kriteria'] as $item => $nilai){
                    
                    Nilai_saw::updateOrCreate(
                        [
                        'alternatif_id' => $id, 
                        'kriteria_id' => $item,
                       // 'nilai'=> $nilai
                        ],
                        [
                        'nilai'=>$nilai,
                        ]

                    );

                }
            }
            

            return response()->json([
                'status' => 200,
                'message' => 'berhasil merubah alteratif',
    
            ]);

        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $nilai = Nilai_saw::whereIn('alternatif_id', [$id]);
    
      $alter = Alternatif::findOrFail($id);
        
       try {
       
            $nilai->delete();
           $alter->delete();
           
           return response()->json([
            'status' => 200,
            'message'=> 'Data alternatif berhasil dihapus'
             ]);

       } catch (\Throwable $th) {
       
        return response()->json([
            'status' => 402,
            'message'=> 'gagal, ada yang salah'
        ]);
       }   

       
           
        //
    }
}
