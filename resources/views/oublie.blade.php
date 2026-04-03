<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation - O'Passage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .auth-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border: 1px solid #e9ecef;
        }

        .brand-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-logo {
            background-color: #1a1d20;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            padding: 12px 16px;
            display: inline-block;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .brand-header h4 {
            font-weight: 700;
            margin-bottom: 5px;
            color: #1a1d20;
        }

        .brand-header p {
            color: #6c757d;
            font-size: 14px;
            margin: 0;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .form-control {
            padding: 10px 15px;
            font-size: 14px;
            border-color: #e9ecef;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #1a1d20;
            box-shadow: 0 0 0 0.25rem rgba(26, 29, 32, 0.1);
        }

        .btn-primary {
            background-color: #1a1d20;
            border-color: #1a1d20;
            padding: 12px;
            font-weight: 500;
            border-radius: 8px;
            width: 100%;
            margin-top: 10px;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: #343a40;
            border-color: #343a40;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #1a1d20;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .success-state {
            display: none;
            text-align: center;
        }

        .success-icon {
            font-size: 50px;
            color: #40c057;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="auth-card">
        <div id="forgotFormState">
            <div class="brand-header">
                <div class="brand-logo">O'P</div>
                <h4>Mot de passe oublié ?</h4>
                <p>Pas d'inquiétude. Entrez votre e-mail pour recevoir les instructions.</p>
            </div>

            <form id="forgotPasswordForm">
                <div class="mb-4">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="votre@email.com" required>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer le lien</button>
            </form>

            <a href="login.html" class="back-link">
                <i class="bi bi-arrow-left me-1"></i> Retour à la connexion
            </a>
        </div>

        <div id="successState" class="success-state">
            <div class="success-icon">
                <i class="bi bi-check2-circle"></i>
            </div>
            <h4>E-mail envoyé !</h4>
            <p class="text-muted small">Nous avons envoyé un lien de réinitialisation à l'adresse indiquée.</p>
            <a href="login.html" class="btn btn-outline-dark w-100 mt-3">Retourner à la connexion</a>
        </div>
    </div>

    <script>
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Simulation de l'envoi du mail
            const email = document.getElementById('email').value;
            console.log("Tentative d'envoi à : " + email);

            // On cache le formulaire et on montre le succès
            document.getElementById('forgotFormState').style.display = 'none';
            document.getElementById('successState').style.display = 'block';
        });
    </script>
</body>

</html>
