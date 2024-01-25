<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center" style="background-image: url({{Storage::url($post->image->url)}})">
                
                </article>   
            @endforeach
        </div>
    </div> 
</x--app-layout>
