<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Boolivery Business') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-3 col-xl-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-1 top-1em">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link text-white bg-unclick" href="/">
                                    <img src="/logo.png" class="logo-width"> Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-click' : 'bg-unclick' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white     {{
                                    (Route::currentRouteName() == 'admin.orders.index' || Route::currentRouteName() == 'admin.orders.show') 
                                    ? 'bg-click' 
                                    : 'bg-unclick'
                                }}" href="{{ route('admin.orders.index') }}">
                                    <i class="fa-solid fa-list" style="color: #ffffff;"></i> Ordini
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.foods.index' ? 'bg-click' : 'bg-unclick' }}"
                                    href="{{ route('admin.foods.index') }}">
                                    <i class="fa-solid fa-book-open"></i> Piatti
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.foods.create' ? 'bg-click' : 'bg-unclick' }}"
                                    href="{{ route('admin.foods.create') }}">
                                    <i class="fa-solid fa-utensils"></i> Aggiungi Piatto
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link text-white bg-unclick" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                        <div class="row justify-content-center myDiv m-auto">
                            <img class="m-4 text-center fs-2"
                                src="{{ asset('storage/images/' . basename($user->logo_activity)) }}"
                                alt="{{ $user->activity_name }}">
                        </div>




                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>