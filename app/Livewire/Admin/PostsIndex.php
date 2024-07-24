<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;

use Livewire\WithPagination;

class PostsIndex extends Component
{
    // para la paginacion (que no use tawilind que viene por defecto, sino bootstrap)
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // buscador
    public $buscar;

    public function updatingBuscar(){
        $this->resetPage();    
    } 

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
        ->where('name','LIKE','%'.$this->buscar.'%')
        ->latest('id')
        ->paginate();

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
