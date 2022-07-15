<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page_kriteria.kriteria');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function readKriteria()
    {
        $kriteria = Kriteria::all();
        $output = '';
        $no= 1;

		if ($kriteria->count() > 0) {
            
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama kriteria</th>
                    <th>Keterangan</th>
                    <th>Bobot</th>
                    <th>Type</th>
                
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($kriteria as $item) {
				$output .= '<tr>
                            <td>'. $no++ .'</td>
                            <td>'. $item->nama_kriteria .'</td>
                            <td>'. $item->keterangan .'</td>
                            <td>'. $item->bobot .'</td>
                            <td>'. $item->type .'</td>
                           
                            <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm editKtr" id="'.$item->id.'">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm deleteKtr" href="#" id="'.$item->id.'">
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
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}


    }

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
            
            'nama_kriteria' => 'required',
            'keterangan' => 'required',
            'bobot' => 'required',
            'type' => 'required',
        ], $messages);


        if($validate->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validate->messages(),
                //'message'=> 'gagal menambahkan data kriteria',
    
            ]);           

        }else{

            Kriteria::create([
                
                'nama_kriteria'=>request('nama_kriteria'),
                'keterangan' => request('keterangan'),
                'bobot' => request('bobot'),
                'type'  => request('type'),
            ]);
            
            return response()->json([
                'status' => 200,
                'message' => 'berhasil menambahkan kriteria',
    
            ]);

        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $id)
    {

        return response()->json($id,200);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
           
        ];
        $validate = Validator::make($request->all(),[
            
            'nama_kriteria' => 'required',
            'keterangan' => 'required',
            'bobot' => 'required',
            'type' => 'required',
        ], $messages);


        if($validate->fails()){

            return response()->json([
                'status' => 400,
                'errors' => $validate->messages(),
                //'message'=> 'gagal menambahkan data kriteria',
    
            ]);           

        }else{

            Kriteria::where('id', $id)
                        ->update([
                            'nama_kriteria' => $request->nama_kriteria,
                            'keterangan' => $request->keterangan,
                            'bobot' => $request->bobot,
                            'type' => $request->type,
                        ]);
                        
            
            return response()->json([
                'status' => 200,
                'message' => 'berhasil merubah kriteria',
    
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        
       try {
        $kriteria->delete();   
       } catch (\Throwable $th) {

        return response()->json([
            'status' => 200,
            'message'=> 'Data alternatif gagal dihapus, karena data masih digunakan diperhitungan SAW'
        ]);

       }
        
        return response()->json([
            'status' => 200,
            'message'=> 'Data alternatif berhasil dihapus'
        ]);
      
       
        //
    }
}
