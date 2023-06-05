<!DOCTYPE html>
<html>

<head>
    <title>Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="bar-chart"></canvas>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">home</a>

    <script>
        var labels = {!! json_encode($labels) !!};
        var data = {!! json_encode($data) !!};
    
        var ctx = document.getElementById('bar-chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Messaggi',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            callback: function(value, index, values) {
                                if (Number.isInteger(value)) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
