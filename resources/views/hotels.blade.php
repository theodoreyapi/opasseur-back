<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôtels - O'Passage</title>
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

        .table thead th {
            color: #adb5bd;
            font-weight: 500;
            font-size: 12px;
            border-bottom: 1px solid #f8f9fa;
        }

        .table tbody td {
            vertical-align: middle;
            font-size: 13.5px;
            padding: 15px 8px;
            border-bottom: 1px solid #f8f9fa;
        }

        /* Badges & UI elements */
        .badge-type {
            background-color: #f8f9fa;
            color: #6c757d;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
            border: 1px solid #e9ecef;
        }

        .badge-status-actif {
            background-color: #1a1d20;
            color: white;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
        }

        .badge-status-inactif {
            background-color: #e9ecef;
            color: #adb5bd;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
        }

        .rating-text {
            color: #fab005;
            font-weight: 600;
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
            color: #6c757d;
            border: none;
            background: none;
            padding: 5px;
            transition: 0.2s;
        }

        .btn-action:hover {
            color: #000;
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
                <li><a href="#" class="active"><i class="bi bi-building me-2"></i> Hôtels</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Hôtels</h4>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddHotel"><i
                        class="bi bi-plus-lg me-1"></i> Ajouter un hôtel</button>
            </div>

            <div class="content-card">
                <div class="d-flex gap-3 mb-4">
                    <input type="text" class="form-control" style="width: 250px;" placeholder="Rechercher...">
                    <select class="form-select" style="width: 150px;">
                        <option>Tous les types</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Type</th>
                                <th>Ville</th>
                                <th>Prix/nuit</th>
                                <th>Note</th>
                                <th>Réservations</th>
                                <th>Statut</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">Résidence O'Passage Cocody</td>
                                <td><span class="badge-type">residence</span></td>
                                <td>Cocody, CI</td>
                                <td>25 000 FCFA</td>
                                <td><span class="rating-text"><i class="bi bi-star-fill"></i> 4.7</span> (42)</td>
                                <td>156</td>
                                <td><span class="badge-status-actif">Actif</span></td>
                                <td class="text-end">
                                    <a href="hotel-detail.html" class="btn-action"><i class="bi bi-eye"></i></a>
                                    <button class="btn-action" data-bs-toggle="modal"
                                        data-bs-target="#modalEditHotel"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddHotel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="fw-bold">Nouvel Établissement</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-8"><label class="form-label small fw-bold">Nom (name)</label><input
                                    type="text" class="form-control" placeholder="Nom de l'hôtel"></div>
                            <div class="col-md-4"><label class="form-label small fw-bold">Type</label>
                                <select class="form-select">
                                    <option value="hotel">Hôtel</option>
                                    <option value="residence">Résidence</option>
                                    <option value="appartement">Appartement</option>
                                </select>
                            </div>
                            <div class="col-md-6"><label class="form-label small fw-bold">Pays
                                    (country_id)</label><select class="form-select">
                                    <option value="1">Côte d'Ivoire</option>
                                </select></div>
                            <div class="col-md-6"><label class="form-label small fw-bold">Ville (city_id)</label><select
                                    class="form-select">
                                    <option value="1">Cocody</option>
                                </select></div>
                            <div class="col-md-12"><label class="form-label small fw-bold">Description courte</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-4"><label class="form-label small fw-bold">Prix de base
                                    (price_per_night)</label><input type="number" class="form-control"
                                    placeholder="25000"></div>
                            <div class="col-md-4"><label class="form-label small fw-bold">Manager
                                    (manager_id)</label><select class="form-select">
                                    <option>Amadou Diallo</option>
                                </select></div>
                            <div class="col-md-4"><label class="form-label small fw-bold">Image
                                    principale</label><input type="file" class="form-control"></div>
                        </div>
                        <button type="submit" class="btn-add w-100 mt-4 py-2">Créer l'établissement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelete" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content border-0 text-center p-4">
                <i class="bi bi-trash text-danger fs-1"></i>
                <h5 class="fw-bold mt-2">Supprimer ?</h5>
                <p class="text-muted small">Toutes les chambres et réservations liées seront supprimées.</p>
                <div class="d-flex gap-2"><button class="btn btn-light w-100"
                        data-bs-dismiss="modal">Non</button><button class="btn btn-danger w-100">Oui,
                        supprimer</button></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
