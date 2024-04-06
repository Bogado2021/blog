@extends('adminlte::page')

@section('title', 'blog')

@section('content_header')
    <h1>Listar Categoria</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
           <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('admin.categories.create')}}">Agregar Categoría</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td colspan=2></td>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($categories as $category)
                     <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td width='10px'>
                            <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-info btn-sm">Editar</a>
                        </td>
                        <td width='10px'>
                            <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}