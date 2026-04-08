@extends('layouts.master', ['title' => 'Pays & Communes', 'titleHeader' => 'Pays & Communes', 'description' => 'Liste des Pays & Communes', 'icone' => 'bi-globe'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    @include('layouts.statuts')

    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold m-0">Pays ({{ $paysCount }})</h5>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddPays"><i class="bi bi-plus-lg"></i> Ajouter
                un Pays</button>
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
                    @foreach ($pays as $item)
                        <tr>
                            <td>{{ $item->id_pays }}</td>
                            <td class="fw-bold">{{ $item->nom_pays }}</td>
                            <td><span class="badge-count">
                                    @php
                                        $count = \App\Models\Communes::where('pays_id', '=', $item->id_pays)->count();
                                        echo $count;
                                    @endphp
                                </span></td>
                            <td class="text-end">
                                <a href="#" class="btn-action" data-bs-toggle="modal"
                                    data-bs-target="#modalEditPays"><i class="bi bi-pencil"></i></a>
                                <a href="#" class="btn-action btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#modalConfirmDelete"><i class="bi bi-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold m-0">Communes ({{ $communeCount }})</h5>
            <button class="btn-add" data-bs-toggle="modal" data-bs-target="#modalAddCommune"><i class="bi bi-plus-lg"></i>
                Ajouter une Commune</button>
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
                    @foreach ($commune as $itemC)
                        <tr>
                            <td>{{ $itemC->id_commune }}</td>
                            <td class="fw-bold">{{ $itemC->nom_commune }}</td>
                            <td>{{ $itemC->nom_pays }}</td>
                            <td class="text-end">
                                <a href="#" class="btn-action" data-bs-toggle="modal" data-bs-target="#modalEditCommune"><i
                                        class="bi bi-pencil"></i></a>
                                <a href="#" class="btn-action btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#modalConfirmDelete"><i class="bi bi-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                        <div class="mb-3"><label class="form-label small fw-bold">Nom du Pays</label><input type="text"
                                class="form-control" name="nom_pays" placeholder="Ex: France"></div>
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
                        <div class="mb-3"><label class="form-label small fw-bold">Nom du Pays</label><input type="text"
                                class="form-control" name="nom_pays" value="Côte d'Ivoire"></div>
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
@endsection
