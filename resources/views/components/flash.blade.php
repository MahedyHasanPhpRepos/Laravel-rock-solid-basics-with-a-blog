@if (session()->has('success'))
<div x-data="{show : true}" x-init="setTimeout(() => show = false , 2000)" x-show="show" class="fixed right-0 bg-blue-500 text-white z-1000 top-28 px-3 py-1 right-8 rounded-xl">
    <p>
        {{ session('success') }}
    </p>
</div>
@endif