<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-2xl font-bold">Tag: {{$tag->name}}</h1>
        @foreach ($posts as $post)
            <x-card-post :post="$post"/>   
        @endforeach
        <div class="">
            {{$posts->links()}}
        </div>

    </div>
</x--app-layout>