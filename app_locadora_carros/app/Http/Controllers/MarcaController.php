<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    public function __construct(Marca $marca)
    {
        $this->marca = $marca;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$marcas = Marca::all();
        $marcas = $this->marca->with('modelos')->get();
        return response()->json($marcas, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //habilitar o header accepted no postman
        $request->validate($this->marca->rules(), $this->marca->feedback());

        $imagem = $request->file('imagem');
        $imagem_armazenada = $imagem->store('imagens', 'public');
        
        $marca = $this->marca->create([
            'nome'=> $request->nome,
            'imagem'=>$imagem_armazenada
        ]);
        return response()->json($marca, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //adiciona o relacionamento do modelo com modelo
        $marca = $this->marca->with('modelos')->find($id);
        if(empty($marca))
            return response()->json(['erro'=> 'Registro não localizado'], 404);

        return response()->json($marca,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //por ser rota PUT/PATCH é necessário incluir o parametro _Method no Postman e definir a rota como POST
        $marca = $this->marca->find($id);
        if(empty($marca))
            return response()->json(['erro'=> 'Registro não localizado'], 404);

        if($request->method() === 'PATCH'){
            $regrasDinamicas = array();

            foreach($marca->rules() as $input => $regra){
                if(array_key_exists($input, $request->all())){
                    $regrasDinamicas[$input] = $regra;
                }
            }
        }else{
            $request->validate($marca->rules(), $marca->feedback());
        }

        if($request->file('imagem')){
            Storage::disk('public')->delete($marca->imagem);
        }

        $imagem = $request->file('imagem');
        $imagem_armazenada = $imagem->store('imagens', 'public');

        $marca->update([
            'nome'=> $request->nome,
            'imagem'=>$imagem_armazenada
        ]);
        return response()->json($marca, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = $this->marca->find($id);
        if(empty($marca))
        return response()->json(['erro'=> 'Registro não localizado'], 404);
            
        if($marca->imagem){
            Storage::disk('public')->delete($marca->imagem);
        }

        $marca->delete();
        return ['msg'=>'Exclusão realizada com sucesso'];
    }
}
