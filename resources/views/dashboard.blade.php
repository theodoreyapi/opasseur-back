@extends('layouts.master', ['title' => 'Tableau de bord', 'titleHeader' => 'Tableau de bord', 'description' => "Vue d'ensemble de l'activité", 'icone' => 'bi-grid-1x2'])

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Labels for months
        const labels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

        // --- Bar Chart (Réservations) ---
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Réservations',
                    data: [12, 18, 22, 15, 28, 35, 42, 38, 25, 20, 16, 30],
                    backgroundColor: '#151c2c', // Dark blue/black color from image
                    borderRadius: 4,
                    barPercentage: 0.7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 60,
                        ticks: {
                            stepSize: 15,
                            font: {
                                size: 10
                            }
                        },
                        grid: {
                            color: '#f0f0f0',
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: 10
                            }
                        }
                    }
                }
            }
        });

        // --- Line Chart (Revenus) ---
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Revenus',
                    data: [350, 500, 600, 450, 800, 1050, 1250, 1150, 750, 600, 480,
                        900
                    ], // Representing thousands (k)
                    borderColor: '#151c2c',
                    backgroundColor: '#fff',
                    borderWidth: 2,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#151c2c',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    tension: 0.4 // Makes the line curved
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1400,
                        ticks: {
                            stepSize: 350,
                            font: {
                                size: 10
                            },
                            callback: function(value) {
                                return value + 'k';
                            }
                        },
                        grid: {
                            color: '#f0f0f0',
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            color: '#f0f0f0',
                            drawBorder: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            font: {
                                size: 10
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-4 g-4">
            <div class="col-md-4">
                <div class="card kpi-card h-100">
                    <div class="card-body">
                        <div>
                            <div class="kpi-title">Hôtels</div>
                            <div class="kpi-value">4</div>
                        </div>
                        <div class="kpi-icon text-blue"><i class="bi bi-building"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card kpi-card h-100">
                    <div class="card-body">
                        <div>
                            <div class="kpi-title">Réservations</div>
                            <div class="kpi-value">5</div>
                        </div>
                        <div class="kpi-icon text-green"><i class="bi bi-calendar-check"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card kpi-card h-100">
                    <div class="card-body">
                        <div>
                            <div class="kpi-title">Revenus</div>
                            <div class="kpi-value">220 000 FCFA</div>
                        </div>
                        <div class="kpi-icon text-yellow"><i class="bi bi-credit-card"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 g-4">
            <div class="col-md-4">
                <div class="card kpi-card h-100">
                    <div class="card-body">
                        <div>
                            <div class="kpi-title">Clients</div>
                            <div class="kpi-value">3</div>
                        </div>
                        <div class="kpi-icon text-purple"><i class="bi bi-people"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card kpi-card h-100">
                    <div class="card-body">
                        <div>
                            <div class="kpi-title">En attente</div>
                            <div class="kpi-value">1</div>
                        </div>
                        <div class="kpi-icon text-orange"><i class="bi bi-clock-history"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card kpi-card h-100">
                    <div class="card-body">
                        <div>
                            <div class="kpi-title">Chambres</div>
                            <div class="kpi-value">7</div>
                        </div>
                        <div class="kpi-icon text-teal"><i class="bi bi-graph-up-arrow"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card chart-card h-100">
                    <div class="card-body">
                        <div class="chart-title">Réservations par mois</div>
                        <div style="position: relative; height: 250px; width: 100%">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card chart-card h-100">
                    <div class="card-body">
                        <div class="chart-title">Revenus par mois (FCFA)</div>
                        <div style="position: relative; height: 250px; width: 100%">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
