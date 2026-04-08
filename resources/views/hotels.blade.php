@extends('layouts.master', ['title' => 'Hotels', 'titleHeader' => 'Hôtels', 'description' => 'Liste des Hôtels', 'icone' => 'bi-building'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <div class="card-title-area">
            <h5 class="fw-bold m-0"></h5>
            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#modalAddHotel">
                <i class="bi bi-plus-lg me-1"></i> Ajouter un hôtel
            </button>
        </div>
        <div class="d-flex gap-3 mb-4">
            <input type="text" class="form-control" style="width: 250px;" placeholder="Rechercher...">
            <select class="form-select" style="width: 150px;">
                <option>Tous les types</option>
            </select>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Ville</th>
                        <th>Prix/nuit</th>
                        <th>Note</th>
                        <th>Réservations</th>
                        <th>Statut</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">Résidence O'Passage Cocody</td>
                        <td><span class="badge-type">residence</span></td>
                        <td>Cocody, CI</td>
                        <td>25 000 FCFA</td>
                        <td><span class="rating-text"><i class="bi bi-star-fill"></i> 4.7</span> (42)</td>
                        <td>156</td>
                        <td><span class="badge-status-actif">Actif</span></td>
                        <td class="text-end">
                            <a href="hotel-detail.html" class="btn-action"><i class="bi bi-eye"></i></a>
                            <button class="btn-action" data-bs-toggle="modal" data-bs-target="#modalEditHotel"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn-action text-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalAddHotel" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="fw-bold">Nouvel Établissement</h5><button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-8"><label class="form-label small fw-bold">Nom (name)</label><input
                                    type="text" class="form-control" placeholder="Nom de l'hôtel"></div>
                            <div class="col-md-4"><label class="form-label small fw-bold">Type</label>
                                <select class="form-select">
                                    <option value="hotel">Hôtel</option>
                                    <option value="residence">Résidence</option>
                                    <option value="appartement">Appartement</option>
                                </select>
                            </div>
                            <div class="col-md-6"><label class="form-label small fw-bold">Pays
                                    (country_id)</label><select class="form-select">
                                    <option value="1">Côte d'Ivoire</option>
                                </select></div>
                            <div class="col-md-6"><label class="form-label small fw-bold">Ville (city_id)</label><select
                                    class="form-select">
                                    <option value="1">Cocody</option>
                                </select></div>
                            <div class="col-md-12"><label class="form-label small fw-bold">Description courte</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-4"><label class="form-label small fw-bold">Prix de base
                                    (price_per_night)</label><input type="number" class="form-control" placeholder="25000">
                            </div>
                            <div class="col-md-4"><label class="form-label small fw-bold">Manager
                                    (manager_id)</label><select class="form-select">
                                    <option>Amadou Diallo</option>
                                </select></div>
                            <div class="col-md-4"><label class="form-label small fw-bold">Image
                                    principale</label><input type="file" class="form-control"></div>
                        </div>
                        <button type="submit" class="btn-add w-100 mt-4 py-2">Créer l'établissement</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelete" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content border-0 text-center p-4">
                <i class="bi bi-trash text-danger fs-1"></i>
                <h5 class="fw-bold mt-2">Supprimer ?</h5>
                <p class="text-muted small">Toutes les chambres et réservations liées seront supprimées.</p>
                <div class="d-flex gap-2"><button class="btn btn-light w-100" data-bs-dismiss="modal">Non</button><button
                        class="btn btn-danger w-100">Oui,
                        supprimer</button></div>
            </div>
        </div>
    </div>
@endsection
