@extends('layouts.master', ['title' => 'Pages légales', 'titleHeader' => 'Pages légales', 'description' => 'Liste des Pages légales', 'icone' => 'bi-file-earmark-text'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')
    <div class="content-card">
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-mentions" data-bs-toggle="pill" data-bs-target="#content-mentions"
                    type="button">Mentions légales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-politique" data-bs-toggle="pill" data-bs-target="#content-politique"
                    type="button">Politique de confidentialité</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-conditions" data-bs-toggle="pill" data-bs-target="#content-conditions"
                    type="button">Conditions générales</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="content-mentions" role="tabpanel">
                <form action="#" method="POST">
                    <textarea class="legal-editor mb-4" name="content">Mentions légales de la plateforme O'Passage...&#10;&#10;Société : O'Passage SARL&#10;Siège social : Abidjan, Côte d'Ivoire...</textarea>
                    <div class="text-end"><button type="submit" class="btn-save">Enregistrer les
                            modifications</button></div>
                </form>
            </div>

            <div class="tab-pane fade" id="content-politique" role="tabpanel">
                <form action="#" method="POST">
                    <textarea class="legal-editor mb-4" name="content">Politique de confidentialité de la plateforme O'Passage...&#10;&#10;Nous collectons vos données pour améliorer votre expérience...</textarea>
                    <div class="text-end"><button type="submit" class="btn-save">Enregistrer la
                            politique</button></div>
                </form>
            </div>

            <div class="tab-pane fade" id="content-conditions" role="tabpanel">
                <form action="#" method="POST">
                    <textarea class="legal-editor mb-4" name="content">Conditions générales d'utilisation de la plateforme O'Passage...&#10;&#10;L'utilisation du service implique l'acceptation des CGU...</textarea>
                    <div class="text-end"><button type="submit" class="btn-save">Enregistrer les
                            conditions</button></div>
                </form>
            </div>
        </div>
    </div>
@endsection
