@extends('layouts.master', ['title' => 'Paramètres', 'titleHeader' => 'Paramètres', 'description' => 'Configuration', 'icone' => 'bi-file-earmark-text'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <h5 class="fw-bold mb-4">Configuration Système</h5>
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label small fw-bold">Nom de la plateforme</label>
                <input type="text" class="form-control" value="O'Passage">
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold">Devise par défaut</label>
                <input type="text" class="form-control" value="FCFA" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold">Commission O'Passage (%)</label>
                <input type="number" class="form-control" value="15">
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-bold">Délai d'annulation gratuit (Heures)</label>
                <input type="number" class="form-control" value="24">
            </div>
        </div>
        <hr class="my-4 opacity-0">
        <div class="text-end">
            <button class="btn-add">Sauvegarder les paramètres</button>
        </div>
    </div>
@endsection
