<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations - O'Passage</title>
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

        /* Table Styling exact à reservation.png */
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

        .client-name {
            font-weight: 600;
            color: #1a1d20;
            display: block;
        }

        .client-phone {
            font-size: 11px;
            color: #adb5bd;
        }

        /* Badges Statuts selon l'image */
        .status-confirmed {
            background-color: #1a1d20;
            color: white;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-pending {
            background-color: #f8f9fa;
            color: #adb5bd;
            border-radius: 20px;
            border: 1px solid #e9ecef;
            padding: 4px 12px;
            font-size: 10px;
        }

        .status-completed {
            background-color: #e9ecef;
            color: #495057;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 10px;
        }

        .status-canceled {
            background-color: #fa5252;
            color: white;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 10px;
        }

        .status-noshow {
            background-color: #e03131;
            color: white;
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
                <li><a href="#"><i class="bi bi-door-open me-2"></i> Chambres</a></li>
                <li><a href="#" class="active"><i class="bi bi-calendar-check me-2"></i> Réservations</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Réservations</h4>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddReservation"><i
                        class="bi bi-plus-lg me-1"></i> Créer une réservation</button>
            </div>

            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0">Réservations (5)</h5>
                    <select class="form-select w-auto fw-bold" style="font-size: 13px; border-radius: 8px;">
                        <option>Tous les statuts</option>
                        <option>Confirmé</option>
                        <option>En attente</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Hôtel / Chambre</th>
                                <th>Dates</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Créé le</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1</td>
                                <td><span class="client-name">Fatou Koné</span><span class="client-phone">+225 05 06 07
                                        08</span></td>
                                <td>
                                    <div class="fw-bold small">Résidence O'Passage</div>
                                    <div class="text-muted" style="font-size: 11px;">Studio Standard</div>
                                </td>
                                <td><small>2025-07-10 → 2025-07-13</small></td>
                                <td class="fw-bold">60 000 FCFA</td>
                                <td><span class="status-confirmed">confirmed</span></td>
                                <td class="text-muted">2025-06-28</td>
                                <td class="text-end">
                                    <button class="btn-action" title="Détails" data-bs-toggle="modal"
                                        data-bs-target="#modalViewReservation"><i class="bi bi-eye"></i></button>
                                    <button class="btn-action" title="Modifier statut" data-bs-toggle="modal"
                                        data-bs-target="#modalEditStatus"><i class="bi bi-arrow-repeat"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>#2</td>
                                <td><span class="client-name">Awa Cissé</span><span class="client-phone">+225 09 10 11
                                        12</span></td>
                                <td>
                                    <div class="fw-bold small">Résidence O'Passage</div>
                                    <div class="text-muted" style="font-size: 11px;">Studio Premium</div>
                                </td>
                                <td><small>2025-07-15 → 2025-07-18</small></td>
                                <td class="fw-bold">105 000 FCFA</td>
                                <td><span class="status-pending">pending</span></td>
                                <td class="text-muted">2025-07-01</td>
                                <td class="text-end">
                                    <button class="btn-action"><i class="bi bi-eye"></i></button>
                                    <button class="btn-action"><i class="bi bi-arrow-repeat"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddReservation" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="fw-bold">Nouvelle Réservation</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label small fw-bold">Client</label><select
                                    class="form-select">
                                    <option>Sélectionner un client</option>
                                </select></div>
                            <div class="col-md-6"><label class="form-label small fw-bold">Hôtel /
                                    Résidence</label><select class="form-select">
                                    <option>Résidence O'Passage</option>
                                </select></div>
                            <div class="col-md-6"><label class="form-label small fw-bold">Date Arrivée</label><input
                                    type="date" class="form-control"></div>
                            <div class="col-md-6"><label class="form-label small fw-bold">Date Départ</label><input
                                    type="date" class="form-control"></div>
                            <div class="col-md-12"><label class="form-label small fw-bold">Chambre</label><select
                                    class="form-select">
                                    <option>Studio Standard</option>
                                </select></div>
                        </div>
                        <button type="submit" class="btn-add w-100 mt-4 py-2">Valider la réservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditStatus" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-body p-4">
                    <h6 class="fw-bold mb-3">Changer le statut (#1)</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-dark btn-sm text-start"><i
                                class="bi bi-check2-circle me-2"></i> Confirmer</button>
                        <button class="btn btn-outline-dark btn-sm text-start"><i class="bi bi-flag me-2"></i> Terminé
                            (Completed)</button>
                        <button class="btn btn-outline-danger btn-sm text-start"><i class="bi bi-x-circle me-2"></i>
                            Annuler (Canceled)</button>
                        <button class="btn btn-danger btn-sm text-start"><i class="bi bi-person-x me-2"></i> No
                            Show</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
