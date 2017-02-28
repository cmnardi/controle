@extends('layout.master')
@section('title', 'Categorias')

@section('content')
    <div class="box">
        <div class="box-header">Categorias</div>
        <div class="box-body">
            <form>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input class="form-control" placeholder="Nome" type="name">
                </div>
                <div class="form-group">
                    <label for="name">Padrão</label>
                    <input class="form-control" placeholder="Nome" type="pattern">
                </div>

                <div class="form-group">
                    <label for="name">Categoria pai</label>
                    <select name="id_category">
                        
                    </select>
                </div>

            </form>
        </div>
    </div>
@endsection