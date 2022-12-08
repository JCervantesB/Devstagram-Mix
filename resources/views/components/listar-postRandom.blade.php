<div>
    <h3 class="text-3xl text-center mb-5">Te podrian interesar</h3>
    @if($postRandoms->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($postRandoms as $post)
                <div class="shadow bg-transparent p-1 rounded-lg hover:bg-white">
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user ]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                                   
                    <p class="font-bold text-center">{{$post->user->username}}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{ $postRandoms->links() }}
        </div>
    @else
        <p class="text-center">No Hay Posts</p>
    @endif
</div>