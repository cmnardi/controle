@extends('layout.master')
@section('title', 'Categorias')

@section('content')
    <div class="box">
        <div class="box-header">Categorias</div>
        <div class="box-body">
            <a href="/category/create" class="btn btn-primary">Adicionar</a>
            <table class="table table-bordered">
            @foreach ($categories as $category)
                <tr>
                <td>#{{ $category->id }}</td>
                <td>{{ $category->getParent() }} / {{ $category->name }}</td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection