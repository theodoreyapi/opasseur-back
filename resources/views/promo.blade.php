@extends('layouts.master', ['title' => 'Code Promo', 'titleHeader' => 'Code Promo', 'description' => 'Liste des Code Promo', 'icone' => 'bi-tags'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold m-0">Codes Promo (3)</h5>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPromo"><i class="bi bi-plus-lg me-1"></i>
                Nouveau code</button>
        </div>
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
                            <div class="col"><label class="form-label small fw-bold">Début</label><input type="date"
                                    class="form-control" name="starts_at"></div>
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
@endsection
