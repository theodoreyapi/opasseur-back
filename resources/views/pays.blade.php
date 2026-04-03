<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pays & Communes - O'Passage</title>
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

        .table thead th {
            color: #adb5bd;
            font-weight: 500;
            font-size: 13px;
            border-bottom: 1px solid #f8f9fa;
        }

        .table tbody td {
            vertical-align: middle;
            font-size: 14px;
            padding: 15px 8px;
            border-bottom: 1px solid #f8f9fa;
        }

        .badge-count {
            background-color: #f8f9fa;
            color: #6c757d;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
            border: 1px solid #e9ecef;
        }

        .btn-action {
            padding: 4px 8px;
            font-size: 14px;
            border-radius: 6px;
            border: none;
            background: none;
            color: #6c757d;
            transition: 0.2s;
        }

        .btn-action:hover {
            color: #1a1d20;
            background: #f0f2f5;
        }

        .btn-delete:hover {
            color: #dc3545;
            background: #fff5f5;
        }

        .btn-add {
            background-color: #1a1d20;
            color: white;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 13px;
            border: none;
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
                <li><a href="#" class="active"><i class="bi bi-globe me-2"></i> Pays & Communes</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Pays & Communes</h4>
            </div>

            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0">Pays (4)</h5>
                    <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPays"><i
                            class="bi bi-plus-lg"></i> Ajouter un Pays</button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Communes</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="fw-bold">Côte d'Ivoire</td>
                                <td><span class="badge-count">3</span></td>
                                <td class="text-end">
                                    <button class="btn-action" data-bs-toggle="modal" data-bs-target="#modalEditPays"><i
                                            class="bi bi-pencil"></i></button>
                                    <button class="btn-action btn-delete" data-bs-toggle="modal"
                                        data-bs-target="#modalConfirmDelete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="fw-bold">Sénégal</td>
                                <td><span class="badge-count">1</span></td>
                                <td class="text-end">
                                    <button class="btn-action"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action btn-delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0">Communes (6)</h5>
                    <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddCommune"><i
                            class="bi bi-plus-lg"></i> Ajouter une Commune</button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Commune</th>
                                <th>Pays</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="fw-bold">Cocody</td>
                                <td>Côte d'Ivoire</td>
                                <td class="text-end">
                                    <button class="btn-action" data-bs-toggle="modal"
                                        data-bs-target="#modalEditCommune"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action btn-delete" data-bs-toggle="modal"
                                        data-bs-target="#modalConfirmDelete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td class="fw-bold">Dakar Plateau</td>
                                <td>Sénégal</td>
                                <td class="text-end">
                                    <button class="btn-action"><i class="bi bi-pencil"></i></button>
                                    <button class="btn-action btn-delete"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddPays" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <h5 class="fw-bold">Ajouter un Pays</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3"><label class="form-label small fw-bold">Nom du Pays</label><input
                                type="text" class="form-control" name="nom_pays" placeholder="Ex: France"></div>
                        <button type="submit" class="btn-add w-100 py-2">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditPays" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <h5 class="fw-bold">Modifier le Pays</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3"><label class="form-label small fw-bold">Nom du Pays</label><input
                                type="text" class="form-control" name="nom_pays" value="Côte d'Ivoire"></div>
                        <button type="submit" class="btn-add w-100 py-2">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddCommune" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <h5 class="fw-bold">Nouvelle Commune</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3"><label class="form-label small fw-bold">Nom de la Commune</label><input
                                type="text" class="form-control" name="nom_commune"></div>
                        <div class="mb-3"><label class="form-label small fw-bold">Pays</label>
                            <select class="form-select" name="pays_id">
                                <option value="1">Côte d'Ivoire</option>
                                <option value="2">Sénégal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-add w-100 py-2">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditCommune" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <h5 class="fw-bold">Modifier Commune</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3"><label class="form-label small fw-bold">Nom de la Commune</label><input
                                type="text" class="form-control" name="nom_commune" value="Cocody"></div>
                        <div class="mb-3"><label class="form-label small fw-bold">Pays</label>
                            <select class="form-select" name="pays_id">
                                <option value="1" selected>Côte d'Ivoire</option>
                                <option value="2">Sénégal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-add w-100 py-2">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConfirmDelete" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0">
                <div class="modal-body p-4 text-center">
                    <i class="bi bi-exclamation-triangle text-danger fs-1 mb-3 d-block"></i>
                    <h5 class="fw-bold">Supprimer ?</h5>
                    <p class="text-muted small">Cette action est irréversible et supprimera les données liées
                        (cascade).</p>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-light w-100" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger w-100">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
