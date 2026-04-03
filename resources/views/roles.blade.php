<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnements - O'Passage</title>
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
            margin-bottom: 30px;
        }

        /* Table Styling */
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

        /* Badges Statuts */
        .status-active {
            background-color: #1a1d20;
            color: white;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-expired {
            background-color: #f8f9fa;
            color: #adb5bd;
            border-radius: 20px;
            border: 1px solid #e9ecef;
            padding: 4px 12px;
            font-size: 10px;
        }

        .status-inactive {
            background-color: #e9ecef;
            color: #adb5bd;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 10px;
        }

        .btn-add {
            background-color: #1a1d20;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            border: none;
            font-size: 14px;
        }

        .plan-name {
            font-weight: 600;
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
                <li><a href="#" class="active"><i class="bi bi-card-checklist me-2"></i> Abonnements</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Abonnements</h4>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPlan"><i
                        class="bi bi-plus-lg me-1"></i> Créer un plan</button>
            </div>

<div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0">Rôles & Permissions</h5>
                    <button class="btn-add btn-sm"><i class="bi bi-shield-plus me-1"></i> Nouveau rôle</button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rôle</th>
                                <th>Permissions accordées</th>
                                <th>Utilisateurs</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge bg-dark text-white">super-admin</span></td>
                                <td class="small text-muted">Accès total, gestion système, finances, suppressions</td>
                                <td>2</td>
                                <td class="text-end">
                                    <button class="btn-action"><i class="bi bi-pencil"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="badge bg-light text-dark border">manager</span></td>
                                <td class="small text-muted">Gestion hôtels, chambres, réservations, avis</td>
                                <td>12</td>
                                <td class="text-end">
                                    <button class="btn-action"><i class="bi bi-pencil"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddPlan" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="fw-bold">Nouveau Plan de Souscription</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nom du plan (name)</label>
                            <input type="text" class="form-control" placeholder="Ex: Premium">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label small fw-bold">Prix (price)</label>
                                <input type="number" class="form-control" placeholder="0.00">
                            </div>
                            <div class="col">
                                <label class="form-label small fw-bold">Durée (duration_type)</label>
                                <select class="form-select">
                                    <option value="monthly">Mensuel</option>
                                    <option value="yearly">Annuel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label small fw-bold">Plan actif</label>
                        </div>
                        <button type="submit" class="btn-add w-100 py-2">Enregistrer le plan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
