<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Symfony\Component\HttpKernel\Debug\VirtualRequestStack;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function index()
    {
        // $post = Post::
        return view('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories','tags'));    
    }


    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());
        if ($request->file('file')) {
            $url = Storage::put('posts',$request->file('file'));

            /* por defecto guarda en el campo imageable_id el id del post*/
            $post->image()->create([
                'url' => $url
            ]);
        }
        
        if($request->tag){
            $post->tag()->attach($request->tag);
        }

        return redirect()->route('admin.posts.edit',$post)->with('info','El post a sido creado correctamente');
        // return view('admin.posts.edit');  
    }


    public function show(Post $post)
    {
        
    }


    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name','id');
        $tags = Tag::all();  

        return view('admin.posts.edit', compact('post','categories','tags'));
    }


    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());
        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
            
        } 

        if($request->tag){
            $post->tag()->sync($request->tag);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info','El post a sido actualizado correctamente');
        
    }

  
    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        $post->delete();
        return redirect()->route('admin.posts.index')->with('info','El post a sido eliminado co exito.');
    }
}
