
@extends('layouts.app')
@section('content')
<head>
    <title>Schedule Match</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- aos js-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        });

    </script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


<section class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('add-match') }}">Set Match</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('point') }}">Results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('matches')}}">Match History</a>
                </li>
            </ul>
        </div>
    </nav>
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Match') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('save-match') }}" enctype="multipart/form-data">
                        @csrf
                    <div><select type="text"  id="team1" name="team1" class="form-control{{ $errors->has('team1') ? ' is-invalid' : '' }}" value="{{ old('team1') }}">
                          <option value="">Select Team</option>
                          <option value="">First Round Team</option>
                        @foreach($teams as $team1)
         <option value="{{$team1->team}}">{{$team1->team}}-U18</option>
         @endforeach
         @if(count($first_match) == 8 && count($kos) > 0)
          <option value="">Selected For Knock-Out</option>
                          @foreach($kos as $ko)
         <option value="{{$ko->team}}">{{$ko->team}}-U18</option>
         @endforeach
         @endif
         @if(count($ko_match) == 4 && count($finals) > 0)
          <option value="">Selected For Final</option>
                          @foreach($finals as $final)
         <option value="{{$final->team}}">{{$final->team}}-U18</option>
         @endforeach
         @endif
      </select>

  
                                @if ($errors->has('team1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('team1') }}</strong>
                                    </span>
                                @endif
                          
                     </div>
      </br>
              <div><select type="text"  id="team2" name="team2" class="form-control{{ $errors->has('team2') ? ' is-invalid' : '' }}" value="{{ old('team2') }}">
                          <option value="">Select Team</option>
                          @foreach($teams as $team2)
         <option value="{{$team2->team}}">{{$team2->team}}-U18</option>
         @endforeach
@if(count($first_match) == 8 && count($kos) > 0)
          <option value="">Selected For Knock-Out</option>
                          @foreach($kos as $ko)
         <option value="{{$ko->team}}">{{$ko->team}}-U18</option>
         @endforeach
         @endif
       @if(count($ko_match) == 4 && count($finals) > 0)
          <option value="">Selected For Final</option>
                          @foreach($finals as $final)
         <option value="{{$final->team}}">{{$final->team}}-U18</option>
         @endforeach
         @endif
      </select>
  
                                @if ($errors->has('team2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('team2') }}</strong>
                                    </span>
                                @endif
                          
                     </div>               </br>  
         <div><select type="text"  id="venues" name="venue" class="form-control{{ $errors->has('venue') ? ' is-invalid' : '' }}" >
                          <option value="">Select Venue</option>
                          @foreach($venues as $venue)
         <option value="{{$venue->name}}" >{{$venue->name}}</option>
         @endforeach
      </select>

  
                                @if ($errors->has('venue'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('venue') }}</strong>
                                    </span>
                                @endif
                          
                     </div>  </br>
<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>

                            <div class="col-md-6">
                                <input id="time" type="datetime-local" id='time' class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ old('time') }}">

                                @if ($errors->has('time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Schedule Match') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
