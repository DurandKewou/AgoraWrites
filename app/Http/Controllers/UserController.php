<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Load the login view.
     */
    public function loadLogin()
    {
        return view('login'); // Correspond à resources/views/login.blade.php
    }

    /**
     * Load the registration view.
     */
    public function loadRegister()
    {
        $roles = Role::where('name', '!=', 'admin')->get(); // Récupérer tous les rôles pour les afficher dans le formulaire
        //$roles = Role::all(); // Récupérer tous les rôles disponibles
        return view('register', compact('roles')); // Passer les rôles à la vue
    }

       /**
     * Handle user registration.
     */

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name', // rôle obligatoire et limité à ces deux choix
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->save();

        // Assignation du rôle
        //$user->assignRole($request->role);
        // 2. Récupérer le rôle choisi
        $roleName = $request->role;

        // 3. Assigner le rôle
        $user->assignRole($roleName);

        // 4. Donner les permissions liées à ce rôle
        $role = Role::where('name', $roleName)->first();
        if ($role) {
            $permissions = $role->permissions;
            $user->givePermissionTo($permissions);
        }

        return redirect()->route('login')->with('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
    }

    /**
     * Handle user login.
     */
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Rediriger selon le rôle attribué via Spatie
            if ($user->hasRole('Admin')) {
                return redirect()->route('admin.index');
            } elseif ($user->hasRole('Author')) {
                return redirect()->route('author.index');
            } elseif ($user->hasRole('Lecteur')) {
                return redirect()->route('reader.index');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Votre rôle est invalide ou non attribué. Contactez l\'administrateur.'
                ]);
            }
        }

        // Authentification échouée
        return redirect()->route('login')->withErrors([
            'email' => 'Identifiants invalides.'
        ])->onlyInput('email');
    }


    /**
     * loadForgotPassword a newly created resource in storage.
     */
    public function loadForgotPassword(Request $request)
    {
       return view('forgot-password');
    }

    public function userForgotPassword(Request $request)
    {
           $request->validate([
                'email' => 'required|email',
            ]);

            $user = User::where('email', $request->email)->first();

            if ($user) {
                // Rediriger vers le formulaire de réinitialisation
                return redirect()->route('reset-password', ['email' => $request->email]);
            } else {
                return back()->withErrors(['email' => 'Aucun compte avec cet email.']);
            }
    }

    /**
     * Display the specified resource.
     */
    public function loadResetPassword($email)
    {
        
        return view('reset-password',compact('email'));
    }

    public function userResetPassword(Request $request)
    {
        //dd($request->all());
       $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success', 'Mot de passe réinitialisé.');
        } else {
            return back()->withErrors(['email' => 'Utilisateur non trouvé.']);
        }
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
