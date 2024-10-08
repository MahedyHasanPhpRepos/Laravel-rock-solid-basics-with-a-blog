@props(['name'])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
        {{ $name }}
    </label>

    <textarea type="text" value="{{ old('excerpt') }}" class="border border-gray-400 p-2 w-full" name='{{ $name }}' id='{{ $name }}'>
    {{ $slot ?? old('name') }}
    </textarea>

    @error($name)
    <p class="text-red-500 text-xs mt-2">
        {{ $message }}
    </p>
    @enderror
</div>