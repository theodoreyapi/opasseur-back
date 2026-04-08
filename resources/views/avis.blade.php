@extends('layouts.master', ['title' => 'Avis clients', 'titleHeader' => 'Avis clients', 'description' => 'Liste des Avis clients', 'icone' => 'bi-star'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <h5 class="fw-bold mb-4">Avis (5)</h5>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Hôtel</th>
                        <th>Utilisateur</th>
                        <th>Note</th>
                        <th>Commentaire</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="hotel-name">Résidence O'Passage Cocody</td>
                        <td class="user-name">Fatou Koné</td>
                        <td>
                            <div class="star-rating">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                        </td>
                        <td class="comment-text">"Excellent séjour, personnel très accueillant !"</td>
                        <td class="text-muted">2025-07-14</td>
                        <td class="text-end">
                            <button class="btn-action text-danger" title="Supprimer l'avis" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteReview">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="hotel-name">Hôtel Le Plateau</td>
                        <td class="user-name">Awa Cissé</td>
                        <td>
                            <div class="star-rating">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star star-empty"></i>
                            </div>
                        </td>
                        <td class="comment-text">"Bon rapport qualité/prix pour le business."</td>
                        <td class="text-muted">2025-09-01</td>
                        <td class="text-end">
                            <button class="btn-action text-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalDeleteReview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 p-4 text-center">
                <i class="bi bi-exclamation-triangle text-danger fs-1 mb-2"></i>
                <h5 class="fw-bold">Supprimer cet avis ?</h5>
                <p class="text-muted small">Cette action est irréversible et impactera la note globale de l'hôtel.</p>
                <div class="d-flex gap-2">
                    <button class="btn btn-light w-100" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-danger w-100">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
@endsection
