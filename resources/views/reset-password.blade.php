<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau mot de passe - O'Passage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .auth-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border: 1px solid #e9ecef;
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

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #495057;
        }

        .form-control {
            padding: 10px 15px;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #1a1d20;
            border: none;
            padding: 12px;
            font-weight: 500;
            border-radius: 8px;
            width: 100%;
            margin-top: 10px;
        }

        .password-requirement {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 2px;
        }

        .requirement-item i {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="auth-card">
        <div class="text-center mb-4">
            <div class="brand-logo">O'P</div>
            <h4 class="fw-bold">Nouveau mot de passe</h4>
            <p class="text-muted small">Sécurisez votre compte avec un mot de passe fort.</p>
        </div>

        <form action="login.html">
            <div class="mb-3">
                <label class="form-label">Nouveau mot de passe</label>
                <input type="password" class="form-control" placeholder="••••••••" required>
                <div class="password-requirement mt-2">
                    <div class="requirement-item text-success"><i class="bi bi-check-circle-fill"></i> Au moins 8
                        caractères</div>
                    <div class="requirement-item"><i class="bi bi-circle"></i> Un chiffre ou caractère spécial</div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Confirmez le mot de passe</label>
                <input type="password" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
        </form>
    </div>
</body>

</html>
