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
</x-guest-layout>
