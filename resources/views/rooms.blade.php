<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Chambres - O'Passage</title>

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

        /* Sidebar Style (Uniforme) */
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

        /* Table Styling (selon chambre.png) */
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

        .room-name {
            font-weight: 600;
            color: #1a1d20;
        }

        /* Badges Disponibilité */
        .badge-available {
            background-color: #1a1d20;
            color: white;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-unavailable {
            background-color: #fa5252;
            color: white;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 11px;
            font-weight: 600;
        }

        .btn-add {
            background-color: #1a1d20;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            border: none;
            font-size: 14px;
            font-weight: 500;
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
                <li><a href="#" class="active"><i class="bi bi-door-open me-2"></i> Chambres</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Chambres</h4>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddRoom">
                    <i class="bi bi-plus-lg me-1"></i> Ajouter une chambre
                </button>
            </div>

            <div class="content-card">
                <h5 class="fw-bold mb-4">Chambres (7)</h5>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Hôtel</th>
                                <th>Chambres</th>
                                <th>SDB</th>
                                <th>Salons</th>
                                <th>Capacité</th>
                                <th>Prix/nuit</th>
                                <th>Disponible</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="room-name">Studio Standard</td>
                                <td class="text-muted">Résidence O'Passage Cocody</td>
                                <td>1</td>
                                <td>1</td>
                                <td>0</td>
                                <td>2 pers.</td>
                                <td class="fw-bold">25 000 FCFA</td>
                                <td><span class="badge-available">Oui</span></td>
                                <td class="text-end">
                                    <button class="btn-action" data-bs-toggle="modal" data-bs-target="#modalEditRoom"><i
                                            class="bi bi-pencil"></i></button>
                                    <button class="btn-action text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteRoom"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="room-name">Suite Familiale</td>
                                <td class="text-muted">Résidence O'Passage Cocody</td>
                                <td>2</td>
                                <td>2</td>
                                <td>1</td>
                                <td>5 pers.</td>
                                <td class="fw-bold">55 000 FCFA</td>
                                <td><span class="badge-unavailable">Non</span></td>
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

    <div class="modal fade" id="modalAddRoom" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="fw-bold">Nouvelle Chambre / Studio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nom (name)</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Ex: Studio Premium">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Hôtel (hotel_id)</label>
                                <select class="form-select" name="hotel_id">
                                    <option value="1">Résidence O'Passage Cocody</option>
                                    <option value="2">Hôtel Le Plateau</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Chambres (bedrooms)</label>
                                <input type="number" class="form-control" name="bedrooms" value="1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">SDB (bathrooms)</label>
                                <input type="number" class="form-control" name="bathrooms" value="1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Salons (living_rooms)</label>
                                <input type="number" class="form-control" name="living_rooms" value="0">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Capacité (capacity)</label>
                                <input type="number" class="form-control" name="capacity" value="2">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Prix / nuit (price_per_night)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price_per_night">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Disponibilité</label>
                                <select class="form-select" name="is_available">
                                    <option value="1">Disponible (Oui)</option>
                                    <option value="0">Indisponible (Non)</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn-add w-100 mt-4 py-2">Enregistrer la chambre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDeleteRoom" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 p-4 text-center">
                <i class="bi bi-exclamation-octagon text-danger fs-1 mb-2"></i>
                <h5 class="fw-bold">Supprimer la chambre ?</h5>
                <p class="text-muted small">Cette action supprimera également les images et tarifs associés.</p>
                <div class="d-flex gap-2">
                    <button class="btn btn-light w-100" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger w-100">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
