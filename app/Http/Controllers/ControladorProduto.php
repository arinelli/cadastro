<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;
use App\Produto;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = Produto::all();
        return view('produtos',compact('prods'));
    }

 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cats = Categoria::all();
        
        return view('novoproduto',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras=[
            'nome' => 'required|min:3|max:50',
            'estoque' => 'required|min:1',
            'preco' => 'required|min:1'
        ];

        $mensagens =[
            'required'=> 'O atributo não pode estar em branco',
            'nome.required' => 'O nome é requerido',
             'estoque.required' => 'O estoque é requerido',
             'preco.required' => 'O preco é requerido'
        ];

        $request->validate($regras,$mensagens);


        $prod = new Produto();
        $prod->nome =$request->input('nomeProduto');
        $prod->categoria_id =$request->input('idCategoria');

        $prod->estoque =$request->input('estoque');
        $prod->preco = $request->input('preco');

        $prod->save();

        return redirect('/produtos');


       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Produto::find($id);
        $cats = Categoria::find($prod->categoria_id);
        if(isset($prod)) {
            return view('editarproduto', compact('prod'));

        }
        return redirect('/produtos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Produto::find($id);
        if(isset($prod)) {
            $prod->nome = $request->input('nomeProduto');
            
        $prod->estoque =$request->input('estoque');
        $prod->preco = $request->input('preco');

        $prod->categoria_id =$request->input('idCategoria');

            $prod->save();
        }
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->delete();
        }
        return redirect('/produtos');
    }
}
