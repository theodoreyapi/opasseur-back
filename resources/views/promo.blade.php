<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codes Promo - O'Passage</title>
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
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        }

        /* Table Style (promo.png) */
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

        .promo-code-text {
            font-weight: 700;
            color: #1a1d20;
            letter-spacing: 0.5px;
        }

        /* Badges */
        .badge-type {
            background-color: #f8f9fa;
            color: #6c757d;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
            border: 1px solid #e9ecef;
        }

        .badge-active {
            background-color: #1a1d20;
            color: white;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
        }

        .badge-inactive {
            background-color: #e9ecef;
            color: #adb5bd;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
        }

        .btn-add {
            background-color: #1a1d20;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            border: none;
            font-size: 14px;
        }

        .btn-action {
            color: #adb5bd;
            border: none;
            background: none;
            transition: 0.2s;
            padding: 5px;
        }

        .btn-action:hover {
            color: #1a1d20;
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
                <li><a href="#" class="active"><i class="bi bi-ticket-perforated me-2"></i> Codes Promo</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Codes Promo</h4>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPromo"><i
                        class="bi bi-plus-lg me-1"></i> Nouveau code</button>
            </div>

            <div class="content-card">
                <h5 class="fw-bold mb-4">Codes Promo (3)</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Valeur</th>
                                <th>Utilisations</th>
                                <th>Début</th>
                                <th>Expiration</th>
                                <th>Statut</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="promo-code-text">WELCOME20</span></td>
                                <td><span class="badge-type">percentage</span></td>
                                <td>20%</td>
                                <td>45 / 100</td>
                                <td class="text-muted">2025-01-01</td>
                                <td class="text-muted">2025-12-31</td>
                                <td><span class="badge-active">Actif</span></td>
                                <td class="text-end">
                                    <button class="btn-action"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action text-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="promo-code-text">NOEL5000</span></td>
                                <td><span class="badge-type">fixed</span></td>
                                <td>5 000 FCFA</td>
                                <td>12 / 50</td>
                                <td class="text-muted">2025-12-01</td>
                                <td class="text-muted">2025-12-31</td>
                                <td><span class="badge-active">Actif</span></td>
                                <td class="text-end">
                                    <button class="btn-action"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action text-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="promo-code-text">VIP10</span></td>
                                <td><span class="badge-type">percentage</span></td>
                                <td>10%</td>
                                <td>8 / ∞</td>
                                <td class="text-muted">2025-01-01</td>
                                <td class="text-muted">2026-06-30</td>
                                <td><span class="badge-active">Actif</span></td>
                                <td class="text-end">
                                    <button class="btn-action"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action text-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddPromo" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="fw-bold">Générer un Code Promo</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Code (unique)</label>
                            <input type="text" class="form-control" name="code" placeholder="Ex: ETE2025"
                                style="text-transform: uppercase;">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label small fw-bold">Type de remise</label>
                                <select class="form-select" name="discount_type">
                                    <option value="percentage">Pourcentage (%)</option>
                                    <option value="fixed">Montant Fixe (FCFA)</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label small fw-bold">Valeur</label>
                                <input type="number" class="form-control" name="discount_value">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Limite d'utilisation (usage_limit)</label>
                            <input type="number" class="form-control" placeholder="Laisser vide pour illimité">
                        </div>
                        <div class="row mb-3">
                            <div class="col"><label class="form-label small fw-bold">Début</label><input
                                    type="date" class="form-control" name="starts_at"></div>
                            <div class="col"><label class="form-label small fw-bold">Expiration</label><input
                                    type="date" class="form-control" name="expires_at"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Assigner à un utilisateur (optionnel)</label>
                            <select class="form-select" name="user_id">
                                <option value="">Tous les utilisateurs</option>
                                <option value="1">Amadou Diallo</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-add w-100 py-2">Créer le code promo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
