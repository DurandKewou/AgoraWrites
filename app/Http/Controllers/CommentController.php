<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
     /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        // Vérifie que l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Veuillez vous connecter pour commenter.');
        }

        // Validation des données
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Création du commentaire
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->content = $request->input('content');
        $comment->save();

        return back()->with('success', 'Votre commentaire a été publié.');
    }


    /**
     * Display the specified resource.
     */
    public function showComment()
    {
        // Récupère tout les commentaire
        $comment = Comment::all();
        return view('admin.showComment', compact('comment'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
