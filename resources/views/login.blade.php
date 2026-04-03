<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - O'Passage Backoffice</title>

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

        .login-card {
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

        .input-group-text {
            background-color: transparent;
            border-color: #e9ecef;
            color: #6c757d;
            cursor: pointer;
            border-radius: 0 8px 8px 0;
        }

        .form-check-label {
            font-size: 13px;
            color: #495057;
        }

        .form-check-input:checked {
            background-color: #1a1d20;
            border-color: #1a1d20;
        }

        .forgot-password {
            font-size: 13px;
            color: #1a1d20;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password:hover {
            text-decoration: underline;
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

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #343a40;
            border-color: #343a40;
            transform: translateY(-1px);
        }

        .footer-text {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: #adb5bd;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="brand-header">
            <div class="brand-logo">O'P</div>
            <h4>O'Passage</h4>
            <p>Connectez-vous à votre espace Backoffice</p>
        </div>

        <form action="index.html" method="GET">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" placeholder="admin@opassage.com" required>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label for="password" class="form-label mb-0">Mot de passe</label>
                    <a href="#" class="forgot-password">Oublié ?</a>
                </div>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" placeholder="••••••••" required>
                    <span class="input-group-text" id="togglePassword">
                        <i class="bi bi-eye-slash" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>

        <div class="footer-text">
            © 2026 O'Passage. Tous droits réservés.
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the icon
            eyeIcon.classList.toggle('bi-eye');
            eyeIcon.classList.toggle('bi-eye-slash');
        });
    </script>
</body>

</html>
