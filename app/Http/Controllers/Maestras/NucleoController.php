<?php

namespace App\Http\Controllers\Maestras;

use App\Http\Controllers\Controller;
use App\Models\Nucleos;
use Illuminate\Http\Request;
use App\Http\Requests\NucleoRequest;
use Auth;
use App\User;
use Validator;

class NucleoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Auth::user()->cant('viewAny')){
        //     echo 'hola';
        //     // return back()->with('messageErr','No tienes permisos para esta vista');
        // }

        // if(Auth::user()->permisos >= 4){
        //     dd('permiso');
        // }
        
        //$this->authorize('viewAny');
        //dd(Auth::user()->permisos);
        $nucleos = Nucleos::paginate(5);
        return view('View private.Nucleo.Index', compact('nucleos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if(Auth::user()->cant('viewAny')){
            return redirect()->route('Nucleo')->withErrors('No tienes permisos para realizar el registro');
        }

        // $this->authorize('viewAny');

        $id = Nucleos::forOldId()->max('id');
                
        if(!isset($id)){
            $id = '1';
        }else{
            $id = ($id + 1);
        }

        return view('View private.Nucleo.Crear',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NucleoRequest $request)
    {
        
        $Model = new Nucleos();

        if($request->input('typeNucleo') == 'NU'){
            $nu = $Model->forTypeNucleo($request->input('typeNucleo'));
            if(sizeof($nu) > 0){
                return redirect()->back()->withErrors('No se permite otro nucleo central')->withInput();
            }
        }
                
        $Model->NameNucleo = $request->input('NameNucleo');
        $Model->address = $request->input('Address');
        $Model->codePostal = $request->input('CodPostal');
        $Model->typeNucleo = $request->input('typeNucleo');
        $Model->status = '1';

        if($request->input('typeNucleo') != 'NU'){
            $nu = $Model->forTypeNucleo('NU');
            if(sizeof($nu) == 1){
                $Model->codSede = $nu[0]->id;
            }else{
                return redirect()->back()->withErrors('Primero debe de registrar un nucleo central')->withInput();
            }
        }

        $Model->save();
        
        return redirect()->route('Nucleo.create')->with(
            [
                'message' => 'Nucleo guardado',
                'type' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nucleos  $nucleos
     * @return \Illuminate\Http\Response
     */
    public function show(Nucleos $nucleos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nucleos  $nucleos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nucleos = Nucleos::find($id);

        if(Auth::user()->cant('update', $nucleos)){
            return redirect()->route('Nucleo')->withErrors('Este nucleo esta innactivo, por lo tanto no puede ser modificado');
        }
            
        return view('View private.Nucleo.Editar',compact('nucleos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nucleos  $nucleos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nucleos $nucleos)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nucleos  $nucleos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nucleos $nucleos)
    {
        dd('hola');
    }
}
