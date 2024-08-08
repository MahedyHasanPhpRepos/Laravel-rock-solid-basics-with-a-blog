<x-layout>
    <section class="px-6 py-8 max-w-4xl mx-auto">

        <h1 class="text-lg font-bold mb-3">
            Publish New Post
        </h1>

        <div class="flex">
            <aside class="w-48">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul>
                    <li>
                        <a href="/admin/dashboard" class="{{request()->is('admin/dashboard') ? 'text-blue-500' : ''}}">
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
                <x-panel class="">
                    <form action="/admin/posts/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <x-form.input name="title" />

                        <x-form.input name="slug" />


                        <x-form.input name="thumbnail" type='file' />


                        <x-form.textarea name='excerpt' />

                        <x-form.textarea name='body' />


                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                                Category
                            </label>

                            <select name="category_id">

                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" value="{{ old('category_id') == $category->id ? 'selected' : '' }}">
                                    {{ ucwords($category->name) }}
                                </option>
                                @endforeach


                            </select>

                            @error('category_id')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        <x-submit-button class="flex ml-auto">
                            Publish
                        </x-submit-button>


                    </form>
                </x-panel>
            </main>
        </div>


    </section>
</x-layout>