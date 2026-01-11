@extends('admin.admin')

@section('content')
<div class="space-y-8 fade-in">
    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-light text-white">Laporan Penjualan</h1>
        <p class="text-zinc-400 text-sm mt-1">Analisis performa produk toko Anda.</p>
    </div>

    {{-- Chart Section --}}
    <div class="bg-zinc-900 p-6 rounded-2xl border border-zinc-800">
        <h3 class="text-lg font-medium text-white mb-6">Top 10 Produk Terlaris</h3>
        <div class="relative h-96 w-full">
            <canvas id="productSalesChart"></canvas>
        </div>
    </div>
</div>

{{-- Chart.js Script --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Config Dark Mode untuk Chart
        Chart.defaults.color = '#a1a1aa';
        Chart.defaults.borderColor = '#3f3f46';

        const ctx = document.getElementById('productSalesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Jumlah Terjual (Qty)',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(99, 102, 241, 0.8)', // Indigo
                        'rgba(16, 185, 129, 0.8)', // Emerald
                        'rgba(244, 63, 94, 0.8)',  // Rose
                        'rgba(245, 158, 11, 0.8)', // Amber
                        'rgba(59, 130, 246, 0.8)', // Blue
                    ],
                    borderRadius: 4,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y', // Horizontal Bar Chart
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: { color: '#27272a' }
                    },
                    y: {
                        grid: { display: false }
                    }
                }
            }
        });
    });
</script>
@endsection
