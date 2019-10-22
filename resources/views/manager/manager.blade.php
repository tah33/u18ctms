<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>U18CTMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- aos js-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--custom css-->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<head>
    <!--<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>-->
</head>

<body>
    <div class="container-fluid">
        @if (Route::has('login'))
        <div class="float-right">
            
            @guest
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endguest
        </div>
        @endif

        <!--<div class="content">
                <a href="{{ url('register') }}">Register</a>
                <a href="{{ url('add-player') }}">Add Player</a>
                <a href="{{ url('add-team') }}">Add Team</a>
                <a href="{{ url('add-venue') }}">Add Venue</a>
                <a href="{{ url('show-player') }}">Show Players</a>
                <a href="{{ url('show-team') }}">View Teams</a>
                <a href="{{ url('show-teams') }}">Teams info</a>
                <a href="{{ url('show-venues') }}">Show Venues</a>
                <a href="{{ url('set-match') }}">Set a Match</a>
                <a href="{{ url('show-match') }}">First Rund Matches</a>
                <a href="{{ url('ko') }}">Set a KO Matches</a>
                <a href="{{ url('final') }}">Set a final Matches</a>
                <a href="{{ url('show-final') }}">Final Match</a>
                <a href="{{ url('add-fee') }}">Set Fee</a>
                <a href="{{ url('see-fee') }}">See Fee</a>
                <a href="{{ url('point') }}">Point Table</a>
                <a href="{{ url('run-rate') }}">Run Rate</a>
                <a href="{{ url('kos') }}">Show Knockout Matches</a>
                <a href="{{ url('runs') }}">Show Run&Rate</a>
                <a href="{{ url('result') }}">Show Results</a>
            </div>-->
    </div>
    <h2 class="float-left under">Under 18 Cricket Tournament Management System</h2>
    <section class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Player
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('add-player') }}">Add Player</a>
                            <a class="dropdown-item" href="{{ url('manager') }}">View Player</a>
                        </div>
                        
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('match-result') }}">Match Results</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Venues
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('venues') }}">Venue List</a>
                        </div>
                    </li>
                   <li>     @auth
            
            <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form></li>@endauth
                </ul>
            </div>
        </nav>
    </section>

    <!-- section two main box of content-->
    <section class="container">
        <br>
        <div class="row text-center">
            <div class="col-sm-6">
                <div data-aos="fade-down-right" class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 20px;">
                    <div class="card-body">
                        <i class="fas fa-users"></i>
                        <a href="{{ url('manager') }}" class="btn btn-info" style="margin-top: 5px;">Player list</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div data-aos="fade-down-left" class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 20px;">
                    <div class="card-body">
                        <i class="fas fa-sort-numeric-down"></i>
                        <a href="{{url('point') }}" class="btn btn-info" style="margin-top: 5px;">Point Table</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div data-aos="fade-down-left" class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 20px;">
                    <div class="card-body">
                        <i class="fas fa-sort-numeric-down"></i>
                        <a href="{{url('result') }}" class="btn btn-info" style="margin-top: 5px;">Result</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div data-aos="fade-down-left" class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 20px;">
                    <div class="card-body">
                        <i class="fas fa-sort-numeric-down"></i>
                        <a href="{{url('fee') }}" class="btn btn-info" style="margin-top: 5px;">Fee</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div data-aos="fade-down-left" class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 20px;">
                    <div class="card-body">
                        <i class="fas fa-sort-numeric-down"></i>
                        <a href="{{url('view-run') }}" class="btn btn-info" style="margin-top: 5px;">Run</a>
                    </div>
                </div>
            </div>
                <div class="col-sm-6">
                    <div data-aos="fade-up-right" class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 20px;">
                        <div class="card-body">
                            <i class="fas fa-map-marked-alt"></i>
                            <a href="{{ url('venues') }}" class="btn btn-info">See Venue List</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
    </section>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init(
  {
      duration: 1000,
  });
</script>
</body>

</html>
