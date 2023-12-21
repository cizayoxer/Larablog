<x-guest-layout>
    <div class="text-center">
        <h2 class="font-semibold text-xl text-gray-800">
            Liste des articles publiés de {{ $user->name }}
        </h2>
    </div>

    <div>
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
                {{ session('error') }}
            </div>
        @endif
        <!-- Articles -->

        @foreach ($articles as $article)
            <div>
                <div class="p-6 text-gray-900 ">
                    <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                    <p class="text-gray-700">{{ substr($article->content, 0, 30) }}...</p>

                    <a href="{{ route('public.show', [$article->user_id, $article->id]) }}" class="text-red-500 hover:text-red-700">Lire la suite</a>
                    <br>
                    @foreach ($article->categories as $categorie)
                        <span class="inline-block bg-gray-300 text-gray-700 px-2 py-1 rounded-full text-sm font-semibold mb-2">
                            {{$categorie->name}}
                        </span>
                    @endforeach
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</x-guest-layout>
