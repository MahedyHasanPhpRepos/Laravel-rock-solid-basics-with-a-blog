 <x-layout>
     @foreach ($posts as $post)
     <h2 class="text-3xl">
         <a href="/post/{{$post->slug}}">
             {{ $post->title }}
         </a>
     </h2>

     <div>
         Author name :
         <span>
             <a href="users/{{$post->user->username}}">
                 {{$post->user->name}}
             </a>
         </span>
     </div>

     <div>

         category :
         <span>
             <a href="/categories/{{$post->category->slug}}">
                 {{ $post->category->name }}
             </a>
         </span>
     </div>
     <p>
         {{ $post->excerpt }}
     </p>
     @endforeach
 </x-layout>