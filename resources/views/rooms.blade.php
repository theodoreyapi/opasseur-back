@extends('layouts.master', ['title' => 'Chambres', 'titleHeader' => 'Chambres', 'description' => 'Liste des Chambres', 'icone' => 'bi-door-open'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold m-0">Chambres (7)</h5>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddRoom">
                <i class="bi bi-plus-lg me-1"></i> Ajouter une chambre
            </button>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Hôtel</th>
                        <th>Chambres</th>
                        <th>SDB</th>
                        <th>Salons</th>
                        <th>Capacité</th>
                        <th>Prix/nuit</th>
                        <th>Disponible</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="room-name">Studio Standard</td>
                        <td class="text-muted">Résidence O'Passage Cocody</td>
                        <td>1</td>
                        <td>1</td>
                        <td>0</td>
                        <td>2 pers.</td>
                        <td class="fw-bold">25 000 FCFA</td>
                        <td><span class="badge-available">Oui</span></td>
                        <td class="text-end">
                            <button class="btn-action" data-bs-toggle="modal" data-bs-target="#modalEditRoom"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn-action text-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteRoom"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="room-name">Suite Familiale</td>
                        <td class="text-muted">Résidence O'Passage Cocody</td>
                        <td>2</td>
                        <td>2</td>
                        <td>1</td>
                        <td>5 pers.</td>
                        <td class="fw-bold">55 000 FCFA</td>
                        <td><span class="badge-unavailable">Non</span></td>
                        <td class="text-end">
                            <button class="btn-action"><i class="bi bi-pencil"></i></button>
                            <button class="btn-action text-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalAddRoom" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="fw-bold">Nouvelle Chambre / Studio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nom (name)</label>
                                <input type="text" class="form-control" name="name" placeholder="Ex: Studio Premium">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Hôtel (hotel_id)</label>
                                <select class="form-select" name="hotel_id">
                                    <option value="1">Résidence O'Passage Cocody</option>
                                    <option value="2">Hôtel Le Plateau</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Chambres (bedrooms)</label>
                                <input type="number" class="form-control" name="bedrooms" value="1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">SDB (bathrooms)</label>
                                <input type="number" class="form-control" name="bathrooms" value="1">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Salons (living_rooms)</label>
                                <input type="number" class="form-control" name="living_rooms" value="0">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold">Capacité (capacity)</label>
                                <input type="number" class="form-control" name="capacity" value="2">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Prix / nuit (price_per_night)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price_per_night">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Disponibilité</label>
                                <select class="form-select" name="is_available">
                                    <option value="1">Disponible (Oui)</option>
                                    <option value="0">Indisponible (Non)</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn-add w-100 mt-4 py-2">Enregistrer la chambre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDeleteRoom" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 p-4 text-center">
                <i class="bi bi-exclamation-octagon text-danger fs-1 mb-2"></i>
                <h5 class="fw-bold">Supprimer la chambre ?</h5>
                <p class="text-muted small">Cette action supprimera également les images et tarifs associés.</p>
                <div class="d-flex gap-2">
                    <button class="btn btn-light w-100" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger w-100">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
@endsection
