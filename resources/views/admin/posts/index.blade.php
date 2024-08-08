<x-layout>
    <x-setting heading='All Posts'>



        <!-- <x-panel> -->
        <section class="text-gray-600 body-font">
            <div class="container py-8 mx-auto">
                <div class="w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 w-2/3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Name</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Status</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Action</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td class="border-t-2 border-gray-200 px-4 py-3 hover:underline cursor-pointer">
                                    <a href="/post/{{$post->slug}}">
                                        {{$post->title}}
                                    </a>
                                </td>
                                <td class="border-t-2 border-gray-200 px-4 py-3 bg-green-100 text-green-800 font-bold">Published</td>
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-blue-500 hover:underline cursor-pointer">
                                    <a href="/admin/posts/{{$post->id}}/edit">
                                        Edit
                                    </a>
                                </td>
                                <td class="border-t-2 border-gray-200 px-4 py-3 text-blue-500 hover:underline cursor-pointer">

                                    <form action="/admin/posts/{{$post->id}}/delete" method="post">
                                        @csrf 
                                        @method('DELETE')

                                        <button type="submit">
                                            Delete
                                        </button>

                                    </form>

                                    <!-- <a href="/admin/posts/{{$post->id}}/edit">
                                        Delete
                                    </a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-10">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
        <!-- </x-panel> -->

    </x-setting>
</x-layout>