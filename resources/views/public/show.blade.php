
<x-guest-layout>
    <div class="text-center">
        <h2 class="font-semibold text-xl text-gray-800 ">
            {{ $article->title }}
        </h2>
    </div>

    <div class="text-gray-500 text-sm">
        Publié le {{ $article->created_at->format('d/m/Y') }} par <a href="{{ route('public.index', $article->user->id) }}">{{ $article->user->name }}</a>
    </div>

    <div>
        <div class="p-6 text-gray-900 ">
            <p class="text-gray-700 ">{{ $article->content }}</p>
        </div>
    </div>
    <div>


    @foreach ($article->comments as $comment)
        <div class="p-6 text-gray-900 bg-white shadow-md rounded-md mb-4">
            <p class="text-2xl font-bold">{{ $comment->content }}</p>
            <p class="text-1xl grayscale">{{ $comment->user->name }}</p>
        </div>
    @endforeach
    @auth
    <!-- Ajout d'un commentaire -->
        <form action="{{ route('comments.store') }}" method="post" class="mt-6">
            @csrf
            <h1 class="text-xl font-bold mb-4">Commentaire</h1>
            <input type="hidden" value="{{ $article->id }}" name="article">
            <input type="text" name="content" class="p-2 border rounded-md w-full mb-4" placeholder="Votre commentaire">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Envoyer</button>
        </form>
    @endauth
    </div>
</x-guest-layout>
