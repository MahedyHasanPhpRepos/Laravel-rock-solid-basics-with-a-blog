
@props(['heading'])

<x-layout>

    <x-setting heading='Create A Post'>
        <x-panel class="" >
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
    </x-setting>
</x-layout>