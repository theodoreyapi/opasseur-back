@extends('layouts.master', ['title' => 'Notifications', 'titleHeader' => 'Notifications', 'description' => 'Envoyer des Notifications', 'icone' => 'bi-file-earmark-text'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <h5 class="fw-bold mb-4">Envoyer une notification</h5>
        <form>
            <div class="mb-3">
                <label class="form-label small fw-bold">Cible (Audience)</label>
                <select class="form-select">
                    <option>Tous les utilisateurs</option>
                    <option>Clients uniquement</option>
                    <option>Opasseurs uniquement</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Titre du message</label>
                <input type="text" class="form-control" placeholder="Ex: Nouvelle promotion d'été !">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold">Contenu du message (Push/In-app)</label>
                <textarea class="form-control" rows="3" placeholder="Votre message ici..."></textarea>
            </div>
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="emailCheck">
                <label class="form-check-label small" for="emailCheck">Envoyer aussi par Email</label>
            </div>
            <button type="submit" class="btn-add w-100">Diffuser la notification</button>
        </form>
    </div>
@endsection
