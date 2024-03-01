@extends('layouts.admin')

@section('content')
<div class="types">
    {{-- <p><strong>Your Restaurant Types:</strong></p> --}}
    @if (Auth::user()->types->count() > 0)
    <ul>
        @foreach (Auth::user()->types as $type)
        <li class="mybg">{{ $type->name }}</li>
        @endforeach
    </ul>
    @else
    <p>No restaurant types associated with your account.</p>
    @endif
</div>
<div class="container">
    <div class="row justify-content-around">
        <div class="plateLf mybg col-4">
            <div class="text-center fs-4 pt-3 dash-menu-width link">
                <a class="text-white" href="{{ route('admin.foods.index') }}">
                    <i class="fa-solid fa-book-open"></i>
                    <p>Il Tuo Menù </p>
                </a>
            </div>


            <ol class="overflow-y-scroll h-90 mt-3">
                @foreach ($foods as $food)
                <li class="d-flex p-3 menu-item c-white-to-violet">
                    <a href="{{ route('admin.foods.edit', $food->id) }}" class="btn d-flex text-white">
                        <div class="small_img">
                            <div class="img-container position-relative">
                                @if ($food->image)
                                @if (filter_var($food->image, FILTER_VALIDATE_URL))
                                <img src="{{ $food->image }}" class="w-100 cerchio object-fit-cover obj-pos-center"
                                    alt="">
                                @else
                                <img src="{{ asset('storage/' . $food->image) }}"
                                    class="w-100 object-fit-cover obj-pos-center" alt="">
                                @endif
                                @else
                                <p>No image available</p>
                                @endif
                                <div class="edit-btn"><i class="fa-regular fa-pen-to-square fa-2xl"></i></div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center p-3">
                            <b class="text-center">{{ $food->name }}</b>
                        </div>
                    </a>
                </li>
                @endforeach
            </ol>
        </div>

        <div class="statistic text-white mt-6 col-7">
            <p class="text-center fs-4">Le tue Statistiche</p>
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <script>
                var dynamicLabels = {!! json_encode($labels) !!};
                        var ordersData = {!! json_encode($data) !!};
    
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'polarArea',
                            data: {
                                labels: dynamicLabels,
                                datasets: [{
                                    label: '# of Orders',
                                    data: ordersData,
                                    backgroundColor: [
                                        'rgba(255, 99, 132)',
                                        'rgba(54, 162, 235)',
                                        'rgba(255, 206, 86)',
                                        'rgba(75, 192, 192)',
                                        'rgba(153, 102, 255)',
                                        'rgba(255, 159, 64)'
                                    ],
                                    borderColor: ['rgba(255,255,255,0.5)'],
                                    borderWidth: 1,
    
                                }]
                            },
                            options: {
                                scales: {
                                    yAxis: {
                                        ticks: {
                                            color: 'white' // Imposta il colore dei numeri della griglia sull'asse x a bianco
                                        }
                                    },
                                    y: {
                                        beginAtZero: true
                                    },
                                    r: {
                                        ticks: {
                                            color: 'black', // Imposta il colore dei numeri verticali su bianco
                                            minor: {
                                                color: 'white' // Imposta il colore dei numeri decimali a bianco
                                            }
                                        },
                                        grid: {
                                            color: 'rgba(255, 255, 255, 1)' // Imposta il colore della griglia su bianco
                                        }
                                    },
                                },
                                plugins: {
                                    legend: {
                                        labels: {
                                            font: {
                                                family: 'Ubuntu',
                                                weight: '100',
                                                size: 17
                                            },
                                            color: 'white'
                                        }
                                    }
                                },
                                elements: {
                                    line: {
                                        borderColor: 'rgba(255, 255, 255, 1)',
                                        borderWidth: 2
                                    },
                                    point: {
                                        backgroundColor: 'rgba(255, 255, 255, 1)', // Cambia il colore dei punti a bianco
                                        radius: 5
                                    }
                                },
                                animation: {
                                    maintainAspectRatio: false,
                                    animation: {
                                        animateRotate: true,
                                        animateScale: true,
                                        duration: 7000
                                    }
                                    // onComplete: function() {
                                    //     var chartInstance = this.chart;
                                    //     var ctx = chartInstance.ctx;
                                    //     var meta = chartInstance.controller.getDatasetMeta(0);
    
                                    //     meta.data.forEach(function(slice, index) {
                                    //         setTimeout(function() {
                                    //             slice.hidden = false;
                                    //             chartInstance.update();
                                    //         }, index * 5000); // Intervallo tra l'apparizione di ciascun spicchio
                                    //     });
                                    // }
                                }
                            }
                        });
                        //         animations: {
                        // tension: {
                        //     duration: 1000,
                        //     easing: 'linear',
                        //     from: 1,
                        //     to: 0,
                        //     loop: true
                        // }
                        // }
            </script>
        </div>
    </div>
</div>

</div>
@endsection