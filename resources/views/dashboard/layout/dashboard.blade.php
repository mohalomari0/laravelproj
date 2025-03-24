@extends("dashboard.masterpage")


@section("content")
<div class="container-fluid py-4">
    <h1 class="text-center mb-5 section-title">Barber Shop Analytics Dashboard</h1>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="stat-card p-3 text-center">
                <h5 class="stat-label mb-3">Total Clients</h5>
                <p class="stat-value">{{ $stats['total_users'] }}</p>
                <small class="text-muted">{{ $stats['new_users'] }} new clients</small>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card p-3 text-center">
                <h5 class="stat-label mb-3">Total Appointments</h5>
                <p class="stat-value">{{ $stats['total_appointments'] }}</p>
                <small class="text-muted">{{ $stats['completed_appointments'] }} completed</small>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card p-3 text-center">
                <h5 class="stat-label mb-3">Available Services</h5>
                <p class="stat-value">{{ $stats['total_services'] }}</p>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card p-3 text-center">
                <h5 class="stat-label mb-3">Total Revenue</h5>
                <p class="stat-value">JD {{ number_format($financialStats['total_revenue'], 2) }}</p>
                <small class="text-muted">Avg: JD {{ number_format($financialStats['avg_revenue'], 2) }}</small>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="section-title mb-4">Appointments by Status</h5>
                <canvas id="statusChart"></canvas>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="section-title mb-4">Most Requested Services</h5>
                <canvas id="topServicesChart"></canvas>
            </div>
        </div>
        
        <div class="col-md-12 mt-4">
            <div class="chart-container">
                <h5 class="section-title mb-4">Monthly Appointments Trend</h5>
                <canvas id="monthlyTrendChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    // Appointments by Status Chart
    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($appointmentStats['by_status']->keys()) !!},
            datasets: [{
                data: {!! json_encode($appointmentStats['by_status']->values()) !!},
                backgroundColor: [
                    '#2980B9',
                    '#27AE60',
                    '#8E44AD',
                    '#34495E'
                ],
            }]
        }
    });

    // Top Services Chart
    new Chart(document.getElementById('topServicesChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($appointmentStats['by_service']->pluck('name')) !!},
            datasets: [{
                label: 'Number of Appointments',
                data: {!! json_encode($appointmentStats['by_service']->pluck('appointments_count')) !!},
                backgroundColor: '#2980B9',
            }]
        }
    });

    // Monthly Trend Chart
    new Chart(document.getElementById('monthlyTrendChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($appointmentStats['monthly_trend']->map(fn($item) => $item->month . '/' . $item->year)) !!},
            datasets: [{
                label: 'Appointments Count',
                data: {!! json_encode($appointmentStats['monthly_trend']->pluck('count')) !!},
                borderColor: '#27AE60',
                tension: 0.1,
                fill: false
            }]
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  

@endsection
