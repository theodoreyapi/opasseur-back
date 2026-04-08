@extends('layouts.master', ['title' => 'Paiement', 'titleHeader' => 'Paiement', 'description' => 'Liste des Paiement', 'icone' => 'bi-credit-card'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0">Paiements (4)</h4>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPayment"><i class="bi bi-plus-lg me-1"></i>
                Enregistrer un paiement</button>
        </div>

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
                            <div class="col"><label class="form-label small fw-bold">Acompte</label><input type="number"
                                    class="form-control" name="deposit_amount" value="0"></div>
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
@endsection
