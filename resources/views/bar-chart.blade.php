@extends('layouts.app')

@section('content')
    <div class="container">
        <!DOCTYPE html>
        <html>

        <head>
            <title>Bar Chart</title>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </head>

        <body>
            <canvas id="bar-chart"></canvas>

            <script>
                var labels = {!! json_encode($labels) !!};
                var data = {!! json_encode($data) !!};
            
                var ctx = document.getElementById('bar-chart').getContext('2d');
            
                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color + '80';
                }
            
                var backgroundColors = labels.map(function(label) {
                    return getRandomColor();
                });
            
                var borderColor = 'rgba(75, 192, 192, 1)';
            
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Messaggi',
                            data: data,
                            backgroundColor: backgroundColors,
                            borderColor: borderColor,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Messaggi ricevuti per Mese/Anno',
                                color: 'white',
                            },
                            legend: {
                                display: true,
                                labels: {
                                    generateLabels: function(chart) {
                                        var data = chart.data;
                                        if (data.labels.length && data.datasets.length) {
                                            return data.labels.map(function(label, index) {
                                                var dataset = data.datasets[0];
                                                return {
                                                    text: label,
                                                    fillStyle: dataset.backgroundColor[index],
                                                    hidden: false,
                                                    index: index
                                                };
                                            });
                                        }
                                        return [];
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: 'white'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: 'white',
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
    </div>
@endsection
