<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Créateur de l'article (auteur)
        if (Auth::check()){
            Comment::create([
                'article_id' => $request->input('article'),
                'content' => $request->input('content'),
                'user_id' => Auth::user()->id
            ]);
            return redirect()->back();
        }
        else{
            return redirect()->route('login');
        }


    }
}
