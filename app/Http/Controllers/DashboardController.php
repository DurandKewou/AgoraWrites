<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Spatie\Permission\Models\Role;
use App\Exports\PostStatsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stats(Request $request)
    {
        $authorId = $request->get('author');

        $authors = User::has('posts')->get();

        $posts = Post::with(['user'])
            ->withCount(['likes', 'comments']) // ✅ Ajoute les comptes automatiques
            ->when($authorId, fn($query) => $query->where('user_id', $authorId))
            ->get();

        $labels = $posts->map(fn($post) => $post->title)->toArray();
        $views = $posts->pluck('views')->toArray();
        $likes = $posts->map(fn($post) => $post->likes->count())->toArray();
        $comments = $posts->map(fn($post) => $post->comments->count())->toArray();

        return view('admin.statistics', [
            'labels' => $labels,
            'views' => $views,
            'likes' => $likes,
            'comments' => $comments,
            'authors' => $authors,
            'authorId' => $authorId,
            'posts' => $posts,
        ]);
    }



    public function exportExcel()
    {
        return Excel::download(new PostStatsExport, 'statistiques_posts.xlsx');
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
    public function store(Request $request)
    {
        //
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
