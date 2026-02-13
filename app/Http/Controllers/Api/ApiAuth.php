<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Opasseurs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        $utilisateur->otp_expire_at = Carbon::now()->addMinutes(1);
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
                try {
                    Mail::raw(
                        "Votre code de vérification est : $otp. Il expire dans 1 minute.",
                        function ($message) use ($login) {
                            $message->to($login)
                                ->subject('Code de vérification OTP');
                        }
                    );
                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => "Code généré mais email non envoyé",
                        'error' => $e->getMessage()
                    ], 500);
                }
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

    public function forgotPassword(Request $request)
    {
        $login = $request->login;

        // Détecter si c'est un email ou un numéro
        $isEmail = filter_var($login, FILTER_VALIDATE_EMAIL);

        // Règles dynamiques
        $rules = [
            'login' => 'required|string',
        ];

        $messages = [
            'login.required' => 'Veuillez saisir votre email ou numéro.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        $utilisateur = Opasseurs::where('email_opasseur', $request->login)
            ->orWhere('telephone_opasseur', $request->login)
            ->first();

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => "Utilisateur introuvable",
            ], 401);
        }

        // Génération OTP 4 chiffres
        $otp = rand(1000, 9999);

        $utilisateur->otp_opasseur = $otp;
        $utilisateur->otp_expire_at = Carbon::now()->addMinutes(1);
        $utilisateur->otp_verified = false;

        if ($utilisateur->save()) {

            // 📧 ENVOI EMAIL
            if ($isEmail) {
                try {
                    Mail::raw(
                        "Votre code de vérification est : $otp. Il expire dans 1 minute.",
                        function ($message) use ($login) {
                            $message->to($login)
                                ->subject('Code de vérification OTP');
                        }
                    );
                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => "Code généré mais email non envoyé. Voici votre code : $otp",
                        'error' => $e->getMessage()
                    ], 500);
                }
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
            'otp' => 'required',
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

        if ($user->otp_opasseur != $request->otp) {
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

    public function resendOtp(Request $request)
    {
        // 1️⃣ Validation
        $rules = [
            'login' => 'required|string',
        ];

        $messages = [
            'login.required' => 'Veuillez saisir votre email ou numéro.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        // 2️⃣ Détection email ou téléphone
        $login = $request->login;
        $isEmail = filter_var($login, FILTER_VALIDATE_EMAIL);

        // 3️⃣ Recherche utilisateur
        $user = Opasseurs::where(function ($q) use ($login) {
            $q->where('email_opasseur', $login)
                ->orWhere('telephone_opasseur', $login);
        })
            ->orderBy('id_opasseur', 'desc')
            ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur introuvable'
            ], 404);
        }

        // 4️⃣ Vérifier si OTP encore valide
        if ($user->otp_expire_at && Carbon::now()->lt($user->otp_expire_at)) {
            return response()->json([
                'success' => false,
                'message' => 'OTP encore valide. Veuillez patienter.'
            ], 422);
        }

        // 5️⃣ Génération nouvel OTP
        $newOtp = rand(1000, 9999);

        $user->update([
            'otp_opasseur' => $newOtp,
            'otp_expire_at' => Carbon::now()->addMinutes(1),
            'otp_verified' => false,
        ]);

        // 6️⃣ Envoi OTP
        try {
            if ($isEmail) {
                Mail::raw(
                    "Votre nouveau code de vérification est : $newOtp. Il expire dans 1 minute.",
                    function ($message) use ($login) {
                        $message->to($login)
                            ->subject('Nouveau code OTP');
                    }
                );
            } else {
                $this->sendWhatsappOtp($login, $newOtp);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'OTP généré mais envoi échoué',
            ], 500);
        }

        // 7️⃣ Réponse OK
        return response()->json([
            'success' => true,
            'message' => 'Nouveau code de vérification envoyé',
        ]);
    }

    public function register(Request $request)
    {
        // Règles dynamiques
        $rules = [
            'username' => 'required|string',
            'login' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
            'code' => 'nullable|int',
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

    public function resetPassword(Request $request)
    {
        $rules = [
            'login' => 'required',
            'nouveau' => 'required',
        ];

        $messages = [
            'login.required' => 'Veuillez saisir votre numéro de téléphone.',
            'nouveau.required' => 'Veuillez saisir votre nouveau mot de passe.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => collect($validator->errors()->all()),
            ], 422);
        }

        $utilisateur = Opasseurs::where('email_opasseur', $request->login)
            ->orWhere('telephone_opasseur', $request->login)
            ->first();

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => "Utilisateur introuvable",
            ], 401);
        }

        $utilisateur->password_opasseur = Hash::make($request->nouveau);

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
