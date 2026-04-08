@extends('layouts.master', ['title' => 'Admins', 'titleHeader' => 'Admins', 'description' => 'Liste des Admins', 'icone' => 'bi-file-earmark-text'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-4">Administrateurs (Staff)</h5>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPlan"><i class="bi bi-plus-lg me-1"></i>
                Ajouter un Staff</button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Admin</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Dernière connexion</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">Admin O'Passage</td>
                        <td>admin@opassage.com</td>
                        <td><span class="badge bg-dark">super-admin</span></td>
                        <td class="text-muted">Il y a 10 min</td>
                        <td class="text-end">
                            <button class="btn-action"><i class="bi bi-lock"></i></button>
                            <button class="btn-action text-danger"><i class="bi bi-trash"></i></button>
                        </td>
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
