@extends('layouts.master', ['title' => 'Hote', 'titleHeader' => 'Hote', 'description' => 'Liste des hôtes', 'icone' => 'bi-people'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <div class="card-title-area">
            <h5 class="fw-bold m-0">Utilisateurs (6)</h5>
            <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-plus-lg me-1"></i> Ajouter un utilisateur
            </button>
        </div>

        <div class="d-flex gap-3 mb-4">
            <input type="text" class="search-input" placeholder="Rechercher...">
            <select class="form-select filter-select">
                <option>Tous</option>
                <option>Opasseur</option>
                <option>Client</option>
            </select>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Rôle</th>
                        <th>OTP</th>
                        <th>Inscrit le</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="username-cell">Amadou Diallo</td>
                        <td>amadou@opassage.com</td>
                        <td>+225 07 08 09 10</td>
                        <td><span class="badge-role-opasseur">opasseur</span></td>
                        <td><span class="badge-otp-verified">Vérifié</span></td>
                        <td>2025-01-15</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="username-cell">Fatou Koné</td>
                        <td>fatou@gmail.com</td>
                        <td>+225 05 06 07 08</td>
                        <td><span class="badge-role-client">client</span></td>
                        <td><span class="badge-otp-verified">Vérifié</span></td>
                        <td>2025-02-20</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="username-cell">Awa Cissé</td>
                        <td>awa@yahoo.fr</td>
                        <td>+225 09 10 11 12</td>
                        <td><span class="badge-role-client">client</span></td>
                        <td><span class="badge-otp-unverified">Non vérifié</span></td>
                        <td>2025-04-10</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow" style="border-radius: 15px;">
                <div class="modal-header border-0 pt-4 px-4">
                    <h5 class="fw-bold">Nouvel Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username_opasseur" placeholder="Ex: Jean Marc">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label small fw-bold">Email</label>
                                <input type="email" class="form-control" name="email_opasseur"
                                    placeholder="exemple@mail.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label small fw-bold">Téléphone</label>
                                <input type="text" class="form-control" name="telephone_opasseur" placeholder="+225...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Mot de passe</label>
                            <input type="password" class="form-control" name="password_opasseur">
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Rôle</label>
                            <select class="form-select" name="role_opasseur">
                                <option value="client">Client</option>
                                <option value="opasseur">Opasseur</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-add w-100 py-2">Enregistrer l'utilisateur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
