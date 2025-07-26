<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->where('user_id', auth()->id())->get();
        return view('author.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('author.createPost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postAuthor(Request $request)
    {
         $posts = Post::where('user_id', auth()->id())
                 ->where('status', 'published')
                 ->get();
        return view('author.post', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('author.edit', compact('post', 'categories', 'tags'));
    }


    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'status' => 'nullable|in:published,rejected,pending',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['status'] = $validated['status'] ?? 'pending';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }

        $post->update($validated);

        // Synchroniser les tags
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('author.index')->with('success', 'Article mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('author.index')->with('success', 'Article supprimé avec succès.');
    }

    public function profile()
    {
        $user = Auth::user(); // Récupérer l'utilisateur authentifié
        return view('author.profile', compact('user')); // Passer l'utilisateur à la vue
    }
}
