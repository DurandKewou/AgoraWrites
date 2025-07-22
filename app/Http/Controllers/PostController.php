<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;

ini_set('memory_limit', '1024M');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('welcome', compact('posts')); // Correspond à resources/views/welcome.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postAdmin()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function SavePost(Request $request)
    {
        //dd($request->all());
        // 1. Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:published,draft,Pending',
            'tags' => 'nullable|string', // Tags sous forme de texte
        ]);

        // 3. Gestion de l’image et Traitement de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        } else {
            $imagePath = null;
        }

        // 2. Création du post
        $post = Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->status, // ou 'publié' selon ta logique
            'views' => 0,
        ]);

        

         // 4. Attachement des tags (relation many-to-many)
            if ($request->tags) {
                $tagNames = array_map('trim', explode(',', $request->tags)); // Sépare les tags

                $tagIds = [];
                foreach ($tagNames as $name) {
                    $slug = Str::slug($name);
                    $tag = Tag::firstOrCreate(
                        ['slug' => $slug],
                        ['name' => $name]
                    );
                    $tagIds[] = $tag->id;
                }
                $post->tags()->sync($tagIds);
            }
             
             
            // Traitement des tags
            // if ($request->filled('tags')) {
            //     $tagNames = explode(',', $request->tags);
            //     $tagIds = [];

            //     foreach ($tagNames as $tagName) {
            //         $cleanName = trim($tagName);
            //         $tag = Tag::firstOrCreate(
            //             ['slug' => Str::slug($cleanName)],
            //             ['name' => $cleanName]
            //         );
            //         $tagIds[] = $tag->id;
            //     }

            //     // Associer les tags au post
            //     $post->tags()->sync($tagIds);
            // }
             return redirect()->route('author.index')->with('success', 'Post créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function access($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Veuillez vous connecter pour lire l’article complet.');
        }

        $post = Post::findOrFail($id);

        // Exemple : route vers le tableau de bord ou l'article
        return redirect()->route('dashboard')->with('post_id', $id);
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
