<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}

    @error('name')
       <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug',null,['class' => 'form-control','placeholder' => 'Post Slug', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories,null,['class' => 'form-control']) !!}

    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form.group">
    <p class="font-weight-bold">Etiquetas</p>

    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tag[]', $tag->id,null) !!}   
            {{$tag->name}}
        </label> 
    @endforeach

    @error('tag')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label class="mr-2">
        {!! Form::radio('status','1',true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status','2') !!}
        Publicado
    </label>
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="imagen post">                
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2022/11/29/11/30/lake-7624330_1280.jpg" alt="imagen-por-depfecto">
            @endisset
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file','Imagen que representará al post.') !!}
            {!! Form::file('file',['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('file')
            <small class="text-danger">{{$message}}</small>    
        @enderror
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad incidunt cum sit reiciendis vero totam quibusdam itaque aspernatur dolor ducimus rem laudantium, dolorem culpa cumque est, recusandae debitis cupiditate quasi.</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>