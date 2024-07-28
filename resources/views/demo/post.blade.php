<x-layout>

    <div>
        <a href="/">go back</a>
    </div>
    <h2 class="text-3xl">
        <a href="/post/{{$post->slug}}">
            {{ $post->title }}
        </a>
    </h2>
    <div>
        category :
        <span>
            <a href="#"> {{ $post->category->name }}</a>
        </span>
    </div>
    <p>
        {{ $post->body }}
    </p>

</x-layout>