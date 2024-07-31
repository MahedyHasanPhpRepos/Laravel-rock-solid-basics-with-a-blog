<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Login!</h1>

                <form method="POST" action="/sessions" class="mt-10">
                    @csrf

                    <!-- <x-form.input name="name" required/> -->
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />


                    <x-form.button>Log In</x-form.button>

                </form>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                @endif



            </x-panel>
        </main>
    </section>
</x-layout>