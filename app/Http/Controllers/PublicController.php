<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(User $user)
    {
        // On récupère les articles publiés de l'utilisateur
        $articles = Article::where('user_id', $user->id)->where('draft', 0)->get();

        // On retourne la vue
        return view('public.index', [
            'articles' => $articles,
            'user' => $user
        ]);
    }
    public function show(User $user, Article $article)
    {
        //$articles = Article::where('user_id', $user->id)->where('id' , $article->id)->where('draft', 0)->get();
        if (!$article->draft){
            return view('public.show', ['article' => $article,'user' => $user]);
        }
        else{
            return redirect()->route('public.index',['user' => $user] )->with('error', 'Cet article n\'est pas disponnible !');
        }

    }
}
