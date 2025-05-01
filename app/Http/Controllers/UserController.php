<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 🎯 Liste tous les utilisateurs
    public function index()
    {
        return response()->json(
            User::select('id', 'name', 'email', 'created_at')->get()
        );
    }

    // 🎯 Supprime un utilisateur
    public function destroy($id)
    {
        $user = User::find($id);

        if (! $user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès.']);
    }
}
