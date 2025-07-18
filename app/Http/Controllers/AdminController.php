<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les utilisateurs sauf ceux ayant le rôle "Admin"
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admin');
        })->with('roles', 'permissions')->get(); // Récupérer tous les utilisateurs
        return view('admin.index', compact('users')); // Passer les utilisateurs à la vue
    }
    /**
     * Show the profile of the authenticated user.
     */
    public function profile()
    {
        $user = Auth::user(); // Récupérer l'utilisateur authentifié
        return view('admin.profile', compact('user')); // Passer l'utilisateur à la vue
    }

    public function editAuthor()
    {
        // Récupérer uniquement les utilisateurs ayant le rôle "Author"
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Author');
        })->with('roles', 'permissions')->get();
        return view('admin.editAuthor',compact('users'));
    }


    /**
     * Show the table for list a Reader User.
     */
    public function editReader()
    {
        // Récupérer uniquement les utilisateurs ayant le rôle "Reader"
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Lecteur');
        })->with('roles', 'permissions')->get();
        return view('admin.editReader',compact('users'));
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
