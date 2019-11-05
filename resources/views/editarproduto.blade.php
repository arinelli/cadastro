@extends('layout.app', ["current" => "produtos"])

@section('body')

<div class="card border">
    <div class="card-body">

        <form action="/produtos/{{$prod->id}}" method="POST">
          
            @csrf

            <div class="form-group">
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control" name="nomeProduto" value="{{$prod->nome}}"
                       id="nomeProduto" placeholder="{{$prod->nome}}">

                       <br/>

                       <label for="estoque">Estoque</label>
                         <input type="number" class="form-control" name="estoque" value="{{$prod->estoque}}"
                                id="estoque" placeholder="{{$prod->estoque}}">
         
                                <br/>
         
         
                                <label for="preco">Preço</label>
                         <input type="number" class="form-control" name="preco" value="{{$prod->preco}}"
                                id="preco" placeholder="{{$prod->estoque}}">
         
                                <br/>
         
                       





            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection