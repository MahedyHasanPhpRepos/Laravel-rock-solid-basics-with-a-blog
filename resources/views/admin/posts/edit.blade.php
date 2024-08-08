@props(['heading'])

<x-layout>

    <x-setting :heading="'Edit Post: '. $post->title">
        <x-panel class="">
            <form action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" :value="old('title',$post->title)" />

                <x-form.input name="slug" :value="old('slug',$post->slug)" />

                <div class="flex my-3">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type='file' :value="old('thumbnail',$post->thumbnail)" />
                    </div>
                    <img src="{{asset('storage/'.$post->thumbnail)}}" alt="thumbnail" class="rounded-xl ml-6" width='100'>
                </div>



                <x-form.textarea name='excerpt'>
                    {{ old('excerpt',$post->excerpt) }}
                </x-form.textarea>

                <x-form.textarea name='body'>
                    {{ old('body',$post->body) }}
                </x-form.textarea>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                        Category
                    </label>

                    <select name="category_id">

                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" value="{{ old('category_id',$post->category_id) == $category->id ? 'selected' : '' }}">
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
                    Update
                </x-submit-button>


            </form>
        </x-panel>
    </x-setting>
</x-layout>