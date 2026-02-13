<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Opasseurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiProfile extends Controller
{
    // 1️⃣ PROFIL
    public function profile($id)
    {
        $user = Opasseurs::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    // 2️⃣ UPDATE PROFIL
    public function updateProfile(Request $request, $id)
    {
        $user = Opasseurs::find($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur introuvable'], 404);
        }

        $rules = [
            'username' => 'sometimes|string',
        ];

        if ($request->has('telephone')) {
            $rules['telephone'] =
                'required|unique:opasseurs,telephone_opasseur,' . $id . ',id_opasseur';
        }

        if ($request->has('email')) {
            $rules['email'] =
                'required|email|unique:opasseurs,email_opasseur,' . $id . ',id_opasseur';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        $user->update([
            'username_opasseur' => $request->username,
            'telephone_opasseur' => $request->telephone,
            'email_opasseur' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Profil mis à jour'
        ]);
    }

    // 3️⃣ CHANGER MOT DE PASSE
    public function changePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ], [
            'new_password.confirmed' => 'Les mots de passe ne correspondent pas'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => collect($validator->errors()->all())
            ], 422);
        }

        $user = Opasseurs::find($id);

        if (!$user || !Hash::check($request->old_password, $user->password_opasseur)) {
            return response()->json([
                'message' => 'Ancien mot de passe incorrect'
            ], 401);
        }

        $user->update([
            'password_opasseur' => Hash::make($request->new_password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Mot de passe modifié avec succès'
        ]);
    }

    // 4️⃣ SUPPRESSION COMPTE
    public function deleteAccount($id)
    {
        $user = Opasseurs::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur introuvable'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Compte supprimé définitivement'
        ]);
    }

    // 5️⃣ METTRE À JOUR CODE SECRET / PIN
    public function updateCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:opasseurs,id_opasseur',
            'code' => 'required|digits:4',
        ], [
            'user_id.required' => "Vous n'êtes pas connecter. Veuillez vous connectez",
            'code.required' => 'Veuillez saisir le nouveau code'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => collect($validator->errors()->all())
            ], 422);
        }

        $user = Opasseurs::find($request->user_id);

        $user->update([
            'code_secure_opasseur' => $request->code
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Code mis à jour avec succès'
        ]);
    }

    // 6️⃣ CHECKER LE CODE
    public function checkCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:opasseurs,id_opasseur',
            'code' => 'required|digits:4',
        ], [
            'user_id.required' => "Vous n'êtes pas connecter. Veuillez vous connectez",
            'code.required' => 'Veuillez saisir le nouveau code'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => collect($validator->errors()->all())
            ], 422);
        }

        $user = Opasseurs::find($request->user_id);

        if (!Hash::check($request->code, $user->code_secure_opasseur)) {
            return response()->json([
                'success' => false,
                'message' => 'Code incorrect'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Code valide'
        ]);
    }
}
