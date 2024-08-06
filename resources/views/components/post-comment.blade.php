@props(['comment'])


<article class="flex gap-x-5 border-gray-300 border p-6 bg-gray-200 rounded-xl">
    <div class="flex-shrink-0">
        <img src="https:/i.pravatar.cc/60?id={{$comment->id}}" alt="profile" class="rounded-xl">
    </div>
    <div>
        <header>
            <h3 class="font-bold">
                {{ $comment->user->username }}
            </h3>
            <p class="mt-1 mb-4">
                Posted
                <time datetime="">
                   {{ $comment->created_at->diffForHumans() }}
                </time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>

    </div>
</article>