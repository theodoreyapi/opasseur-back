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
