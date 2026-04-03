<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'Passage Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            overflow-x: hidden;
        }

        /* Layout Structure */
        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #e9ecef;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .sidebar-brand {
            padding: 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
        }

        .brand-logo {
            background-color: #5B0FA8;
            color: #FFC107;
            font-weight: bold;
            border-radius: 8px;
            padding: 8px 10px;
            margin-right: 12px;
            font-size: 14px;
        }

        .brand-text h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
        }

        .brand-text span {
            font-size: 11px;
            color: #6c757d;
        }

        .nav-section-title {
            font-size: 11px;
            color: #adb5bd;
            text-transform: uppercase;
            padding: 15px 20px 5px;
            font-weight: 600;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            color: #495057;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .sidebar-nav li a i {
            margin-right: 12px;
            font-size: 16px;
            color: #6c757d;
        }

        .sidebar-nav li a:hover {
            background-color: #e9ecef;
        }

        .sidebar-nav li a.active {
            background-color: #f0f2f5;
            font-weight: 600;
            color: #5B0FA8;
            border-left: 3px solid #FFC107;
            padding-left: 17px;
        }

        .sidebar-nav li a.active i {
            color: #000;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 20px;
            font-size: 12px;
            color: #6c757d;
            border-top: 1px solid #e9ecef;
        }

        /* Main Content Styling */
        #page-content-wrapper {
            flex-grow: 1;
            padding: 20px 30px;
            width: calc(100% - 250px);
        }

        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .page-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 1.25rem;
        }

        /* Custom Cards */
        .kpi-card {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s;
        }

        .kpi-card .card-body {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .kpi-title {
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .kpi-value {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            color: #1a1d20;
        }

        .kpi-icon {
            font-size: 20px;
        }

        /* Chart Cards */
        .chart-card {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        .chart-card .card-body {
            padding: 25px;
        }

        .chart-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Icon Colors */
        .text-blue {
            color: #4dabf7;
        }

        .text-green {
            color: #40c057;
        }

        .text-yellow {
            color: #fab005;
        }

        .text-purple {
            color: #be4bdb;
        }

        .text-orange {
            color: #fd7e14;
        }

        .text-teal {
            color: #20c997;
        }
    </style>
</head>

<body>

    <div id="wrapper">
       @include('layouts.menu')

        <div id="page-content-wrapper">
            <div class="page-header">
                <i class="bi bi-layout-sidebar me-3 fs-5 text-muted"></i>
                <h4>Dashboard</h4>
            </div>

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
        </div>
    </div>

    @include('layouts.script')
</body>

</html>
