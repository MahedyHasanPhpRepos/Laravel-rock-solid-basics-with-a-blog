<section class="px-6 py-8 max-w-4xl mx-auto">



    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts" class="{{request()->is('admin/posts') ? 'text-blue-500' : ''}}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}">
                        New Post
                    </a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <h1 class="text-lg font-bold mb-3">
                {{ $heading }}
            </h1>
            {{ $slot }}
        </main>
    </div>

</section>