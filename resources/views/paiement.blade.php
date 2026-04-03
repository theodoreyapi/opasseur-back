<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiements - O'Passage</title>
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

        /* Table Style (Paiement.png) */
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

        /* Badges Méthodes */
        .badge-method {
            background-color: #f8f9fa;
            color: #495057;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 11px;
            border: 1px solid #e9ecef;
            text-transform: lowercase;
        }

        /* Statuts (Success, Pending, Failed) */
        .status-success {
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

        .status-failed {
            background-color: #fa5252;
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

        .transaction-id {
            font-family: monospace;
            font-size: 12px;
            color: #6c757d;
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
                <li><a href="#"><i class="bi bi-calendar-check me-2"></i> Réservations</a></li>
                <li><a href="#" class="active"><i class="bi bi-credit-card me-2"></i> Paiements</a></li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0">Paiements</h4>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPayment"><i
                        class="bi bi-plus-lg me-1"></i> Enregistrer un paiement</button>
            </div>

            <div class="content-card">
                <h5 class="fw-bold mb-4">Paiements (4)</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Réservation</th>
                                <th>Méthode</th>
                                <th>Acompte</th>
                                <th>Reste</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Transaction</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1</td>
                                <td class="fw-bold">#1</td>
                                <td><span class="badge-method">wave</span></td>
                                <td>30 000</td>
                                <td>30 000</td>
                                <td class="fw-bold">60 000 FCFA</td>
                                <td><span class="status-success">success</span></td>
                                <td class="transaction-id">TXN-001-WAVE</td>
                                <td class="text-muted">2025-06-28</td>
                            </tr>
                            <tr>
                                <td>#2</td>
                                <td class="fw-bold">#2</td>
                                <td><span class="badge-method">orange_money</span></td>
                                <td>52 500</td>
                                <td>52 500</td>
                                <td class="fw-bold">105 000 FCFA</td>
                                <td><span class="status-pending">pending</span></td>
                                <td class="transaction-id">-</td>
                                <td class="text-muted">2025-07-01</td>
                            </tr>
                            <tr>
                                <td>#4</td>
                                <td class="fw-bold">#4</td>
                                <td><span class="badge-method">djamo</span></td>
                                <td>72 500</td>
                                <td>72 500</td>
                                <td class="fw-bold">145 000 FCFA</td>
                                <td><span class="status-failed">failed</span></td>
                                <td class="transaction-id">-</td>
                                <td class="text-muted">2025-08-20</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddPayment" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="fw-bold">Nouveau Paiement</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">ID Réservation (reservation_id)</label>
                            <input type="number" class="form-control" placeholder="Ex: 5">
                        </div>
                        <div class="row mb-3">
                            <div class="col"><label class="form-label small fw-bold">Acompte</label><input
                                    type="number" class="form-control" name="deposit_amount" value="0"></div>
                            <div class="col"><label class="form-label small fw-bold">Montant Total</label><input
                                    type="number" class="form-control" name="amount"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Méthode (payment_method)</label>
                            <select class="form-select" name="payment_method">
                                <option value="wave">Wave</option>
                                <option value="orange_money">Orange Money</option>
                                <option value="djamo">Djamo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">ID Transaction (optionnel)</label>
                            <input type="text" class="form-control" name="transaction_id">
                        </div>
                        <button type="submit" class="btn-add w-100 py-2">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
