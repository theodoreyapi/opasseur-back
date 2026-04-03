<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis Clients - O'Passage</title>

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

        /* Sidebar Style */
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

        /* Main Content */
        #page-content-wrapper {
            flex-grow: 1;
            padding: 25px 40px;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        }

        /* Table Styling (selon avis.png) */
        .table thead th {
            color: #adb5bd;
            font-weight: 500;
            font-size: 12px;
            border-bottom: 1px solid #f8f9fa;
            padding-bottom: 15px;
        }

        .table tbody td {
            vertical-align: middle;
            font-size: 13.5px;
            padding: 18px 8px;
            border-bottom: 1px solid #f8f9fa;
        }

        .hotel-name {
            font-weight: 600;
            color: #1a1d20;
        }

        .user-name {
            color: #495057;
        }

        .comment-text {
            color: #6c757d;
            font-style: italic;
            max-width: 400px;
        }

        /* Stars System */
        .star-rating {
            color: #ffc107;
            font-size: 14px;
        }

        .star-empty {
            color: #e9ecef;
        }

        .btn-action {
            color: #adb5bd;
            border: none;
            background: none;
            transition: 0.2s;
            padding: 5px;
        }

        .btn-action:hover {
            color: #fa5252;
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
                <li><a href="#" class="active"><i class="bi bi-star me-2"></i> Avis</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Avis Clients</h4>
            </div>

            <div class="content-card">
                <h5 class="fw-bold mb-4">Avis (5)</h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hôtel</th>
                                <th>Utilisateur</th>
                                <th>Note</th>
                                <th>Commentaire</th>
                                <th>Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="hotel-name">Résidence O'Passage Cocody</td>
                                <td class="user-name">Fatou Koné</td>
                                <td>
                                    <div class="star-rating">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                </td>
                                <td class="comment-text">"Excellent séjour, personnel très accueillant !"</td>
                                <td class="text-muted">2025-07-14</td>
                                <td class="text-end">
                                    <button class="btn-action text-danger" title="Supprimer l'avis"
                                        data-bs-toggle="modal" data-bs-target="#modalDeleteReview">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="hotel-name">Hôtel Le Plateau</td>
                                <td class="user-name">Awa Cissé</td>
                                <td>
                                    <div class="star-rating">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star star-empty"></i>
                                    </div>
                                </td>
                                <td class="comment-text">"Bon rapport qualité/prix pour le business."</td>
                                <td class="text-muted">2025-09-01</td>
                                <td class="text-end">
                                    <button class="btn-action text-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDeleteReview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 p-4 text-center">
                <i class="bi bi-exclamation-triangle text-danger fs-1 mb-2"></i>
                <h5 class="fw-bold">Supprimer cet avis ?</h5>
                <p class="text-muted small">Cette action est irréversible et impactera la note globale de l'hôtel.</p>
                <div class="d-flex gap-2">
                    <button class="btn btn-light w-100" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger w-100">Confirmer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
