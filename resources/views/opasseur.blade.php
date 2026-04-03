<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs - O'Passage</title>

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

        /* Sidebar (Réutilisée du dashboard) */
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

        .nav-section-title {
            font-size: 11px;
            color: #adb5bd;
            text-transform: uppercase;
            padding: 15px 20px 5px;
            font-weight: 600;
        }

        /* Main Content */
        #page-content-wrapper {
            flex-grow: 1;
            padding: 25px 40px;
        }

        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        /* Card Style */
        .content-card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        }

        .card-title-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        /* Table Styling */
        .table thead th {
            border-top: none;
            color: #adb5bd;
            font-weight: 500;
            font-size: 13px;
            text-transform: none;
            border-bottom: 1px solid #f8f9fa;
            padding-bottom: 15px;
        }

        .table tbody td {
            vertical-align: middle;
            font-size: 14px;
            padding: 18px 8px;
            border-bottom: 1px solid #f8f9fa;
            color: #495057;
        }

        .username-cell {
            font-weight: 600;
            color: #1a1d20;
        }

        /* Badges custom selon l'image */
        .badge-role-opasseur {
            background-color: #1a1d20;
            color: white;
            border-radius: 20px;
            padding: 5px 15px;
            font-weight: 500;
            font-size: 11px;
        }

        .badge-role-client {
            background-color: #e9ecef;
            color: #495057;
            border-radius: 20px;
            padding: 5px 15px;
            font-weight: 500;
            font-size: 11px;
        }

        .badge-otp-verified {
            background-color: #1a1d20;
            color: white;
            border-radius: 5px;
            padding: 4px 12px;
            font-size: 11px;
        }

        .badge-otp-unverified {
            background-color: #fa5252;
            color: white;
            border-radius: 5px;
            padding: 4px 12px;
            font-size: 11px;
        }

        /* Form elements */
        .search-input {
            border-radius: 8px;
            border: 1px solid #e9ecef;
            padding: 8px 15px;
            font-size: 14px;
            width: 250px;
        }

        .filter-select {
            border-radius: 8px;
            border: 1px solid #1a1d20;
            padding: 8px 15px;
            font-size: 14px;
            width: 120px;
            font-weight: 500;
        }

        .btn-add {
            background-color: #1a1d20;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            border: none;
            font-size: 14px;
        }

        .btn-add:hover {
            background-color: #343a40;
            color: white;
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
            <div class="nav-section-title">Gestion</div>
            <ul class="sidebar-nav">
                <li><a href="index.html"><i class="bi bi-grid-1x2 me-2"></i> Dashboard</a></li>
                <li><a href="#" class="active"><i class="bi bi-people me-2"></i> Utilisateurs</a></li>
                <li><a href="#"><i class="bi bi-globe me-2"></i> Pays & Communes</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="page-header">
                <i class="bi bi-layout-sidebar me-3 fs-5 text-muted"></i>
                <h4 class="m-0 fw-bold">Utilisateurs</h4>
            </div>

            <div class="content-card">
                <div class="card-title-area">
                    <h5 class="fw-bold m-0">Utilisateurs (6)</h5>
                    <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-lg me-1"></i> Ajouter un utilisateur
                    </button>
                </div>

                <div class="d-flex gap-3 mb-4">
                    <input type="text" class="search-input" placeholder="Rechercher...">
                    <select class="form-select filter-select">
                        <option>Tous</option>
                        <option>Opasseur</option>
                        <option>Client</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Rôle</th>
                                <th>OTP</th>
                                <th>Inscrit le</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="username-cell">Amadou Diallo</td>
                                <td>amadou@opassage.com</td>
                                <td>+225 07 08 09 10</td>
                                <td><span class="badge-role-opasseur">opasseur</span></td>
                                <td><span class="badge-otp-verified">Vérifié</span></td>
                                <td>2025-01-15</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="username-cell">Fatou Koné</td>
                                <td>fatou@gmail.com</td>
                                <td>+225 05 06 07 08</td>
                                <td><span class="badge-role-client">client</span></td>
                                <td><span class="badge-otp-verified">Vérifié</span></td>
                                <td>2025-02-20</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td class="username-cell">Awa Cissé</td>
                                <td>awa@yahoo.fr</td>
                                <td>+225 09 10 11 12</td>
                                <td><span class="badge-role-client">client</span></td>
                                <td><span class="badge-otp-unverified">Non vérifié</span></td>
                                <td>2025-04-10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow" style="border-radius: 15px;">
                <div class="modal-header border-0 pt-4 px-4">
                    <h5 class="fw-bold">Nouvel Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username_opasseur"
                                placeholder="Ex: Jean Marc">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label small fw-bold">Email</label>
                                <input type="email" class="form-control" name="email_opasseur"
                                    placeholder="exemple@mail.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label small fw-bold">Téléphone</label>
                                <input type="text" class="form-control" name="telephone_opasseur"
                                    placeholder="+225...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Mot de passe</label>
                            <input type="password" class="form-control" name="password_opasseur">
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Rôle</label>
                            <select class="form-select" name="role_opasseur">
                                <option value="client">Client</option>
                                <option value="opasseur">Opasseur</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-add w-100 py-2">Enregistrer l'utilisateur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
