@extends('layouts.master', ['title' => 'Reservation', 'titleHeader' => 'Reservation', 'description' => 'Liste des Reservation', 'icone' => 'bi-calendar-check'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0"></h4>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddReservation"><i
                    class="bi bi-plus-lg me-1"></i> Créer une réservation</button>
        </div>
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
                        <button class="btn btn-outline-dark btn-sm text-start"><i class="bi bi-check2-circle me-2"></i>
                            Confirmer</button>
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
@endsection
