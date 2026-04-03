<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages Légales - O'Passage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        #sidebar-wrapper {
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #e9ecef;
            flex-shrink: 0;
        }

        .sidebar-brand {
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .brand-logo {
            background-color: #1a1d20;
            color: white;
            border-radius: 8px;
            padding: 8px 10px;
            font-weight: bold;
            margin-right: 10px;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #495057;
            text-decoration: none;
            font-size: 14px;
        }

        .sidebar-nav li a.active {
            background-color: #f0f2f5;
            font-weight: 600;
            color: #000;
            border-left: 3px solid #1a1d20;
        }

        #page-content-wrapper {
            flex-grow: 1;
            padding: 25px 40px;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            padding: 30px;
            min-height: 600px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        }

        /* Tabs Styling exact à politioque.png */
        .nav-pills .nav-link {
            color: #adb5bd;
            background-color: #f8f9fa;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            padding: 8px 16px;
            margin-right: 10px;
            border: 1px solid transparent;
            transition: 0.2s;
        }

        .nav-pills .nav-link.active {
            background-color: white;
            color: #1a1d20;
            border: 1px solid #e9ecef;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        /* Textarea Style */
        .legal-editor {
            width: 100%;
            min-height: 450px;
            border: 1px solid #f1f3f5;
            border-radius: 8px;
            padding: 20px;
            font-size: 14px;
            color: #495057;
            background-color: #fff;
            line-height: 1.6;
            resize: vertical;
            outline: none;
            transition: border-color 0.2s;
        }

        .legal-editor:focus {
            border-color: #1a1d20;
        }

        .btn-save {
            background-color: #1a1d20;
            color: white;
            border-radius: 8px;
            padding: 10px 25px;
            border: none;
            font-size: 14px;
            font-weight: 500;
        }

        .btn-save:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <div class="sidebar-brand d-flex align-items-center">
                <span class="brand-logo">O'P</span>
                <div>
                    <div class="fw-bold" style="font-size: 15px;">O'Passage</div><small class="text-muted"
                        style="font-size: 11px;">Backoffice</small>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li><a href="#"><i class="bi bi-grid-1x2 me-2"></i> Dashboard</a></li>
                <li><a href="#"><i class="bi bi-people me-2"></i> Utilisateurs</a></li>
                <li><a href="#"><i class="bi bi-building me-2"></i> Hôtels</a></li>
                <li><a href="#"><i class="bi bi-calendar-check me-2"></i> Réservations</a></li>
                <li><a href="#" class="active"><i class="bi bi-file-earmark-text me-2"></i> Pages légales</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <h4 class="fw-bold mb-4">Pages légales</h4>

            <div class="content-card">
                <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab-mentions" data-bs-toggle="pill"
                            data-bs-target="#content-mentions" type="button">Mentions légales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-politique" data-bs-toggle="pill"
                            data-bs-target="#content-politique" type="button">Politique de confidentialité</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-conditions" data-bs-toggle="pill"
                            data-bs-target="#content-conditions" type="button">Conditions générales</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="content-mentions" role="tabpanel">
                        <form action="#" method="POST">
                            <textarea class="legal-editor mb-4" name="content">Mentions légales de la plateforme O'Passage...&#10;&#10;Société : O'Passage SARL&#10;Siège social : Abidjan, Côte d'Ivoire...</textarea>
                            <div class="text-end"><button type="submit" class="btn-save">Enregistrer les
                                    modifications</button></div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="content-politique" role="tabpanel">
                        <form action="#" method="POST">
                            <textarea class="legal-editor mb-4" name="content">Politique de confidentialité de la plateforme O'Passage...&#10;&#10;Nous collectons vos données pour améliorer votre expérience...</textarea>
                            <div class="text-end"><button type="submit" class="btn-save">Enregistrer la
                                    politique</button></div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="content-conditions" role="tabpanel">
                        <form action="#" method="POST">
                            <textarea class="legal-editor mb-4" name="content">Conditions générales d'utilisation de la plateforme O'Passage...&#10;&#10;L'utilisation du service implique l'acceptation des CGU...</textarea>
                            <div class="text-end"><button type="submit" class="btn-save">Enregistrer les
                                    conditions</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
