<div>
   <div class="card">
   <div class="card-header">
        <input wire:model.live='buscar' class="form-control" placeholder="INgrese su busqueda">
   </div>

   @if ($posts->count())
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
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td width='10px'>
                                <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-info btn-sm">Editar</a>
                            </td>
                            <td width='10px'>
                                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
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
        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay datos...</strong>
        </div>  
    @endif

   </div>
</div>
