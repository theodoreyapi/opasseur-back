<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification OTP - O'Passage</title>
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
            max-width: 400px;
            padding: 40px;
            border: 1px solid #e9ecef;
            text-align: center;
        }

        .brand-logo {
            background-color: #1a1d20;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            padding: 12px 16px;
            display: inline-block;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .otp-input {
            width: 50px;
            height: 60px;
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            margin: 0 5px;
        }

        .otp-input:focus {
            border-color: #1a1d20;
            outline: none;
            box-shadow: 0 0 0 0.25rem rgba(26, 29, 32, 0.1);
        }

        .btn-primary {
            background-color: #1a1d20;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-weight: 500;
            margin-top: 30px;
        }

        .resend-text {
            font-size: 14px;
            margin-top: 20px;
            color: #6c757d;
        }

        .resend-link {
            color: #1a1d20;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="auth-card">
        <div class="brand-logo">O'P</div>
        <h4 class="fw-bold">Vérification</h4>
        <p class="text-muted small mb-4">Entrez le code à 4 chiffres envoyé à <b>ad***@mail.com</b></p>

        <form action="reset-password.html">
            <div class="d-flex justify-content-center">
                <input type="text" class="otp-input" maxlength="1" pattern="\[0-9]*" inputmode="numeric">
                <input type="text" class="otp-input" maxlength="1" pattern="\[0-9]*" inputmode="numeric">
                <input type="text" class="otp-input" maxlength="1" pattern="\[0-9]*" inputmode="numeric">
                <input type="text" class="otp-input" maxlength="1" pattern="\[0-9]*" inputmode="numeric">
            </div>
            <button type="submit" class="btn btn-primary">Vérifier le code</button>
        </form>

        <p class="resend-text">Vous n'avez rien reçu ? <br> <a href="#" class="resend-link">Renvoyer le code
                (59s)</a></p>
    </div>

    <script>
        const inputs = document.querySelectorAll('.otp-input');
        inputs.forEach((input, index) => {
            input.addEventListener('keyup', (e) => {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                if (e.key === "Backspace" && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>
</body>

</html>
