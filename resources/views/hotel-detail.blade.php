<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Hôtel - O'Passage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
        }

        .detail-header {
            background: white;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .hotel-cover {
            height: 250px;
            background: #1a1d20 url('https://via.placeholder.com/1200x400') center/cover;
        }

        .stats-box {
            border-right: 1px solid #eee;
            padding: 0 20px;
        }

        .stats-box:last-child {
            border-right: none;
        }

        .nav-tabs-custom .nav-link {
            border: none;
            color: #6c757d;
            font-weight: 600;
            padding: 15px 20px;
        }

        .nav-tabs-custom .nav-link.active {
            color: #1a1d20;
            border-bottom: 3px solid #1a1d20;
        }

        .amenity-tag {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 10px 15px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            margin: 5px;
        }
    </style>
</head>

<body>

    <div class="container py-5" style="max-width: 1000px;">
        <a href="hotels.html" class="text-decoration-none text-dark mb-4 d-inline-block"><i
                class="bi bi-arrow-left"></i> Retour aux hôtels</a>

        <div class="detail-header">
            <div class="hotel-cover"></div>
            <div class="p-4 d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge bg-dark mb-2">RESIDENCE</span>
                    <h3 class="fw-bold m-0">Résidence O'Passage Cocody</h3>
                    <p class="text-muted mb-0"><i class="bi bi-geo-alt"></i> Cocody, Rue des Jardins, Abidjan</p>
                </div>
                <div class="d-flex text-center">
                    <div class="stats-box">
                        <div class="fw-bold fs-4">4.7</div><small class="text-muted">Note</small>
                    </div>
                    <div class="stats-box">
                        <div class="fw-bold fs-4">156</div><small class="text-muted">Réservations</small>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs nav-tabs-custom px-4">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#infos">Informations</a>
                </li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tarifs">Tarifications</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#avis">Avis (42)</a></li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="infos">
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 12px;">
                            <h5 class="fw-bold mb-3">À propos de l'établissement</h5>
                            <p class="text-muted">Cette résidence haut de gamme située au cœur de Cocody offre un cadre
                                calme et sécurisé. Idéal pour les séjours d'affaires ou de détente...</p>
                            <hr>
                            <h5 class="fw-bold mb-3">Équipements (Amenities)</h5>
                            <div class="d-flex flex-wrap">
                                <div class="amenity-tag"><i class="bi bi-wifi text-primary"></i> Wifi HD</div>
                                <div class="amenity-tag"><i class="bi bi-water text-info"></i> Piscine</div>
                                <div class="amenity-tag"><i class="bi bi-snow text-primary"></i> Climatisation</div>
                                <div class="amenity-tag"><i class="bi bi-p-circle-fill text-dark"></i> Parking gratuit
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-4" style="border-radius: 12px;">
                            <h6 class="fw-bold text-muted small text-uppercase">Règles</h6>
                            <div class="mb-3">
                                <small class="d-block text-muted">Check-in</small>
                                <span class="fw-bold">14:00</span>
                            </div>
                            <div class="mb-3">
                                <small class="d-block text-muted">Check-out</small>
                                <span class="fw-bold">12:00</span>
                            </div>
                            <div class="mb-0">
                                <small class="d-block text-muted">Annulation gratuite</small>
                                <span class="fw-bold">Jusqu'à 48h avant</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tarifs">
                <div class="card border-0 shadow-sm p-4" style="border-radius: 12px;">
                    <h5 class="fw-bold mb-4">Packs de tarification</h5>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Label</th>
                                    <th>Nuits</th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">Séjour Court</td>
                                    <td>1 nuit</td>
                                    <td>25 000 FCFA</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Offre Weekend</td>
                                    <td>3 nuits</td>
                                    <td>70 000 FCFA</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Long Séjour</td>
                                    <td>7 nuits</td>
                                    <td>150 000 FCFA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
