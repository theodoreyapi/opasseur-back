<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Opasseurs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiAuth extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'login' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'login.required' => 'Veuillez saisir votre telephone.',
            'password.required' => 'Veuillez saisir votre mot de passe.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        $utilisateur = Opasseurs::where('telephone_opasseur', '=', $request->login)
            ->orWhere('email_opasseur', '=', $request->login)
            ->first();

        if ($utilisateur && Hash::check($request->password, $utilisateur->password_opasseur)) {

            return response()->json([
                'success' => true,
                'message' => 'Connexion réussie',
                'data' => [
                    'id' => $utilisateur->id_opasseur,
                    'username' => $utilisateur->username_opasseur,
                    'email' => $utilisateur->email_opasseur,
                    'phone' => $utilisateur->telephone_opasseur,
                    'code' => $utilisateur->code_secure_opasseur ?? "",
                    'role' => $utilisateur->role_opasseur,
                ],
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Vos paramètres sont incorrects.",
            ], 401);
        }
    }

    public function registerOne(Request $request)
    {
        $login = $request->login;

        // Détecter si c'est un email ou un numéro
        $isEmail = filter_var($login, FILTER_VALIDATE_EMAIL);

        // Règles dynamiques
        $rules = [
            'login' => 'required|string',
        ];

        // Vérification unicité selon le type
        if ($isEmail) {
            $rules['login'] .= '|unique:opasseurs,email_opasseur';
        } else {
            $rules['login'] .= '|unique:opasseurs,telephone_opasseur';
        }

        $messages = [
            'login.required' => 'Veuillez saisir votre email ou numéro.',
            'login.unique' => 'Email ou téléphone est déjà utilisé.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        // Génération OTP 4 chiffres
        $otp = rand(1000, 9999);

        $utilisateur = new Opasseurs();
        $utilisateur->otp_opasseur = $otp;
        $utilisateur->otp_expire_at = Carbon::now()->addMinutes(5);
        $utilisateur->otp_verified = false;

        if ($isEmail) {
            $utilisateur->email_opasseur = $login;
            $utilisateur->telephone_opasseur = null;
        } else {
            $utilisateur->telephone_opasseur = $login;
            $utilisateur->email_opasseur = null;
        }

        if ($utilisateur->save()) {

            // 📧 ENVOI EMAIL
            if ($isEmail) {
                Mail::raw(
                    "Votre code de vérification est : $otp. Il expire dans 5 minutes.",
                    function ($message) use ($login) {
                        $message->to($login)
                            ->subject('Code de vérification OTP');
                    }
                );
            }
            // 💬 ENVOI WHATSAPP
            else {
                // Exemple : fonction WhatsApp (API externe)
                $this->sendWhatsappOtp($login, $otp);
            }

            return response()->json([
                'success' => true,
                'message' => 'Code de vérification envoyé',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Une erreur s'est produite. Veuillez recommencer.",
            ], 401);
        }
    }

    private function sendWhatsappOtp($phone, $otp)
    {
        // EXEMPLE LOGIQUE
        // Http::post('https://api.whatsapp.com/send', [
        //     'to' => $phone,
        //     'message' => "Votre code OTP est : $otp"
        // ]);

        Log::info("OTP WhatsApp envoyé à $phone : $otp");
    }

    public function verifyOtp(Request $request)
    {

        $rules = [
            'login' => 'required|string',
            'otp' => 'required|string',
        ];

        $messages = [
            'login.required' => 'Veuillez saisir votre email ou numéro.',
            'otp.required' => 'Veuillez saisir votre code OTP.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }


        $user = Opasseurs::where('email_opasseur', $request->login)
            ->orWhere('telephone_opasseur', $request->login)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur introuvable'], 404);
        }

        if ($user->otp_opasseur !== $request->otp) {
            return response()->json(['message' => 'OTP incorrect'], 422);
        }

        if (Carbon::now()->gt($user->otp_expire_at)) {
            return response()->json(['message' => 'OTP expiré'], 422);
        }

        $user->update([
            'otp_verified' => true,
            'otp_opasseur' => null
        ]);

        return response()->json([
            'success' => true,
            'message' => 'OTP vérifié avec succès'
        ]);
    }

    public function register(Request $request)
    {
        $login = $request->login;

        // Détecter si c'est un email ou un numéro
        $isEmail = filter_var($login, FILTER_VALIDATE_EMAIL);

        // Règles dynamiques
        $rules = [
            'username' => 'required|string',
            'login' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
            'code' => 'nullable|string',
        ];

        $messages = [
            'username.required' => 'Veuillez saisir votre prénom ou nom utilisateur.',
            'login.required' => 'Veuillez saisir votre email ou numéro.',
            'login.unique' => 'Email ou téléphone est déjà utilisé.',
            'password.required' => 'Veuillez saisir votre mot de passe.',
            'role.required' => 'Veuillez sélectionner votre type de compte.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        $user = Opasseurs::where('email_opasseur', $request->login)
            ->orWhere('telephone_opasseur', $request->login)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur introuvable'], 404);
        }

        $user->update([
            'username_opasseur' => $request->username,
            'code_secure_opasseur' => $request->code ?? null,
            'role_opasseur' => $request->role,
            'password_opasseur' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Vous êtes inscrit avec succès',
        ]);
    }

    public function update(Request $request, $id)
    {
        $utilisateur = Opasseurs::findOrFail($id);

        $rules = [
            'nom' => 'sometimes|required|string',
            'prenom' => 'sometimes|required|string',
            //'phone' => 'sometimes|required|string|unique:utilisateurs,phone_utilisateur,' . $id,
            //'commune' => 'sometimes|required|integer',
            'photo' => 'nullable|image',
        ];

        $messages = [
            'nom.required' => 'Veuillez saisir votre nom.',
            'prenom.required' => 'Veuillez saisir votre prénom.',
            //'phone.required' => 'Veuillez saisir votre numéro de téléphone.',
            //'phone.unique' => 'Le numéro de téléphone est deja utilisé.',
            //'commune.required' => 'Veuillez sélectionner votre commune.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        if ($request->hasFile('photo')) {
            // supprimer l'ancienne photo si elle existe
            if ($utilisateur->photo_utilisateur) {
                $anciennePhotoPath = str_replace('/storage/', '', $utilisateur->photo_utilisateur);
                Storage::disk('public')->delete($anciennePhotoPath);
            }

            $timestamp = Carbon::now()->format('Ymd_His');
            $photo = $request->file('photo');
            $photoName = 'photo_' . $timestamp . '.' . $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('utilisateurs/photos', $photoName, 'public');
            $utilisateur->photo_utilisateur = Storage::url($photoPath);
        }

        // Mise à jour des champs modifiables
        if ($request->filled('nom')) {
            $utilisateur->nom_utilisateur = $request->nom;
        }

        if ($request->filled('prenom')) {
            $utilisateur->last_name = $request->prenom;
        }

        // if ($request->filled('phone_utilisateur')) {
        //     $utilisateur->phone_utilisateur = $request->phone;
        // }

        // if ($request->filled('commune_id')) {
        //     $utilisateur->commune_id = $request->commune;
        // }

        if ($utilisateur->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Informations mises à jour avec succès',
                'photo' => url($utilisateur->photo_utilisateur)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Impossible de mettre à jour vos informations. Veuillez recommencer.",
            ], 401);
        }
    }

    public function demanderOtpReset(Request $request)
    {
        $rules = [
            'phone' => 'required|exists:users_app,phone',
        ];

        $messages = [
            'phone.exists' => 'Le numéro de téléphone n\'est pas enregistré.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        $utilisateur = Opasseurs::where('phone', $request->phone)->first();

        // Générer un OTP aléatoire
        $otp = rand(100000, 999999);
        $utilisateur->otp = $otp;
        $utilisateur->save();

        // TODO : Envoyer le code OTP via SMS
        // Exemple de log
        Log::info("OTP pour {$utilisateur->phone} : $otp");

        return response()->json([
            'success' => true,
            'message' => 'Code OTP envoyé avec succès',
        ]);
    }

    public function resetPasswordWithOtp(Request $request)
    {

        $rules = [
            'phone' => 'required|exists:users_app,phone',
            'otp' => 'required',
            'nouveau' => 'required',
        ];

        $messages = [
            'phone.required' => 'Veuillez saisir votre numéro de téléphone.',
            'phone.exists' => 'Le numéro de téléphone n\'est pas enregistré.',
            'nouveau.required' => 'Veuillez saisir votre nouveau mot de passe.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        $utilisateur = Opasseurs::where('phone', $request->phone)
            ->where('otp', $request->otp)
            ->first();

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => 'OTP invalide ou expiré',
            ], 401);
        }

        $utilisateur->password = Hash::make($request->nouveau);
        $utilisateur->otp = null; // on réinitialise l’OTP

        if ($utilisateur->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Mot de passe réinitialisé avec succès',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Impossible de réinitialiser votre mot de passe. Veuillez recommencer.",
            ], 401);
        }
    }

    public function supprimerCompte($id)
    {

        $utilisateur = Opasseurs::find($id);

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => "Impossible de supprimer votre compte. Veuillez recommencer.",
            ], 401);
        }

        // Supprimer les fichiers liés (photo, recto, verso)
        $fichiers = ['photo'];

        foreach ($fichiers as $champ) {
            if ($utilisateur->$champ) {
                // Extrait juste le nom du fichier depuis le champ (ex: verso_20250614_011132.jpg)
                $nomFichier = basename($utilisateur->$champ);

                // Déduit le sous-dossier depuis le champ
                $dossier = '';
                if ($champ === 'photo') {
                    $dossier = 'images/utilisateurs/photos/';
                }

                // Construit le chemin absolu complet
                $cheminComplet = public_path($dossier . $nomFichier);

                // Supprime le fichier s’il existe
                if (file_exists($cheminComplet)) {
                    unlink($cheminComplet);
                }
            }
        }

        $utilisateur->delete();

        return response()->json([
            'success' => true,
            'message' => 'Compte supprimé avec succès',
        ]);
    }
}
