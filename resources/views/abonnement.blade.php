@extends('layouts.master', ['title' => 'Abonnements', 'titleHeader' => 'Abonnements', 'description' => 'Liste des Abonnements', 'icone' => 'bi-award'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold m-0">Plan d'abonnement (3)</h5>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPlan"><i class="bi bi-plus-lg me-1"></i>
                Créer un plan</button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Durée</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="plan-name">Classic</td>
                        <td class="fw-bold">5 000 FCFA</td>
                        <td>Mensuel (monthly)</td>
                        <td><span class="status-active">Actif</span></td>
                        <td class="text-end"><button class="btn border-0 text-muted"><i class="bi bi-pencil"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="plan-name">Premium</td>
                        <td class="fw-bold">45 000 FCFA</td>
                        <td>Annuel (yearly)</td>
                        <td><span class="status-active">Actif</span></td>
                        <td class="text-end"><button class="btn border-0 text-muted"><i class="bi bi-pencil"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="plan-name">Pro</td>
                        <td class="fw-bold">15 000 FCFA</td>
                        <td>Mensuel</td>
                        <td><span class="status-inactive">Inactif</span></td>
                        <td class="text-end"><button class="btn border-0 text-muted"><i class="bi bi-pencil"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-card">
        <h5 class="fw-bold mb-4">Abonnements utilisateurs (3)</h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Plan</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Renouvellement</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">Amadou Diallo</td>
                        <td><span class="badge bg-light text-dark border">Premium</span></td>
                        <td class="text-muted">2025-01-01</td>
                        <td class="text-muted">2026-01-01</td>
                        <td><span class="small">Auto (auto_renew)</span></td>
                        <td><span class="status-active">active</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Moussa Traoré</td>
                        <td><span class="badge bg-light text-dark border">Classic</span></td>
                        <td class="text-muted">2025-06-01</td>
                        <td class="text-muted">2025-07-01</td>
                        <td><span class="small">Manuel</span></td>
                        <td><span class="status-expired">expired</span></td>
                    </tr>
                </tbody>
            </table>
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
@endsection
