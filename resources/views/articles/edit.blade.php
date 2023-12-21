<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Modifier l'article {{ $article->id }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('articles.update', $article->id) }}" class="py-12">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <!-- Input de titret de l'article -->
                    <input type="text" value="{{ $article->title }}" name="title" id="title" placeholder="Titre de l'article" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="p-6 pt-0 text-gray-900 ">
                    <!-- Contenu de l'article -->
                    <textarea rows="30" name="content" id="content" placeholder="Contenu de l'article" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $article->content }}</textarea>
                </div>
                <div class="ml-6">
                    <label class="block font-bold mb-2">Catégories :</label>

                    @foreach($categories as $categorie)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="categories[]" class="form-checkbox text-indigo-600 sm:rounded-lg" value="{{$categorie->id}}" @if($article->categories->find($categorie)) checked @endif>
                            <label class="ml-2 text-white-700">{{$categorie->name}}</label>
                        </div>
                    @endforeach
                </div>

                <div class="p-6 text-gray-900 ">
                    <!-- Action sur le formulaire -->
                    <div class="grow">
                        <input type="checkbox" name="draft" id="draft" {{ $article->draft ? 'checked' : '' }} class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <label for="draft">Article en brouillon</label>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Modifier l'article
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
</x-app-layout>
