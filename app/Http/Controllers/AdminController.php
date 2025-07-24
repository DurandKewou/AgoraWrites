<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showUser()
    {
        // Récupérer tous les utilisateurs sauf ceux ayant le rôle "Admin"
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Admi');
        })->with('roles', 'permissions')->get(); // Récupérer tous les utilisateurs
        $allUsers = User::all();
        $roles = Role::all(); // Récupérer tous les rôles disponibles
        return view('admin.allUser', compact('users','roles','allUsers')); // Passer les utilisateurs à la vue
    }
    /**
     * Show the profile of the authenticated user.
     */
    public function profile()
    {
        $user = Auth::user(); // Récupérer l'utilisateur authentifié
        return view('admin.profile', compact('user')); // Passer l'utilisateur à la vue
    }
       public function updateProfile(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'        => 'required|string|max:255',
            'surname'     => 'required|string|max:255',
            'email'       => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'role'        => 'nullable|string',
            'phone'  => 'nullable|string|max:20', // récupéré depuis JS
            'address'     => 'nullable|string|max:255',
            'city'        => 'nullable|string|max:100',
            'country'     => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'birthdate'   => 'nullable|date',
        ]);

        $user = auth()->user();

        $user->update([
            'name'        => $request->name,
            'surname'     => $request->surname,
            'email'       => $request->email,
            'role'        => $request->role, // Assigner la description si nécessaire
            'email_verified_at' => now(),
            'password'    => $user->password, // Ne pas changer le mot de passe
            'remember_token' => $user->remember_token, // Ne pas changer le token de session
            'phone' => $request->phone,// numéro complet ici
            'address'     => $request->address,
            'city'        => $request->city,
            'country'     => $request->country,
            'postal_code' => $request->postal_code,
            'birthdate'   => $request->birthdate,
        ]);

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
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

    public function approvePost($id) {
        $post = Post::findOrFail($id);
        $post->status = 'approved';
        $post->save();

        return redirect()->back()->with('success', 'Post approuvé');
    }
    public function rejectPost($id) {
        $post = Post::findOrFail($id);
        $post->status = 'rejected';
        $post->save();

        return redirect()->back()->with('success', 'Post rejeté');
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

        public function destroyPost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.allUser')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
