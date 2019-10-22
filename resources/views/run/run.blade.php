@extends('layouts.app')
@section('content')
<head>
    <title>Laravel</title>
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
                <div class="card-header">{{ __('Calculate Run') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('save-run') }}" enctype="multipart/form-data">
                        @csrf
                        <div><select type="text"  id="match_name" name="match_name" class="form-control{{ $errors->has('match_name') ? ' is-invalid' : '' }}" value="{{ old('match_name') }}"><option value="">Select Match</option>
                          <option value="">First Round Matches</option>
                          @foreach($first as $first)
         <option value="{{$first->match_name}}">{{$first->match_name}}</option>
         @endforeach
          @if(count($ko)>0)
          <option value="">Knock-out Round Matches</option>
                          @foreach($ko as $ko)
         <option value="{{$ko->match_name}}">{{$ko->match_name}}</option>
         @endforeach
         @endif
         @if(count($final)>0)
          <option value="">Final Match</option>
                          @foreach($final as $final)
         <option value="{{$final->match_name}}">{{$final->match_name}}</option>
         @endforeach
         @endif
      </select>
                                @if ($errors->has('match_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('match_name') }}</strong>
                                    </span>
                                @endif
                          
                     </div></br>
<div><select type="text"  id="team" name="team" class="form-control{{ $errors->has('team') ? ' is-invalid' : '' }}" value="{{ old('team') }}">
                          <option value="">Select Team</option>
                          @foreach($teams as $team)
         <option value="{{$team->team1}}">{{$team->team1}}-U18</option>
         @endforeach
      </select>
  
                                @if ($errors->has('team'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('team') }}</strong>
                                    </span>
                                @endif
                          
                     </div>
                        <div class="form-group row">
                            <label for="ov1" class="col-md-4 col-form-label text-md-right">{{ __('First Over') }}</label>

                            <div class="col-md-6">
                                <input id="ov1" type="text" class="form-control{{ $errors->has('ov1') ? ' is-invalid' : '' }}" name="ov1" value="{{ old('ov1') }}">

                                @if ($errors->has('ov1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ov1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
          <div class="form-group row">
                            <label for="ov2" class="col-md-4 col-form-label text-md-right">{{ __('2nd Over') }}</label>

                            <div class="col-md-6">
                                <input id="ov2" type="text" class="form-control{{ $errors->has('ov2') ? ' is-invalid' : '' }}" name="ov2" value="{{ old('ov2') }}">

                                @if ($errors->has('ov2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ov2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ov3" class="col-md-4 col-form-label text-md-right">{{ __('3rd Over') }}</label>

                            <div class="col-md-6">
                                <input id="ov3" type="text" class="form-control{{ $errors->has('ov3') ? ' is-invalid' : '' }}" name="ov3" value="{{ old('ov3') }}">

                                @if ($errors->has('ov3'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ov3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="ov4" class="col-md-4 col-form-label text-md-right">{{ __('4th Over') }}</label>

                            <div class="col-md-6">
                                <input id="ov4" type="text" class="form-control{{ $errors->has('ov4') ? ' is-invalid' : '' }}" name="ov4" value="{{ old('ov4') }}">

                                @if ($errors->has('ov4'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ov4') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="ov5" class="col-md-4 col-form-label text-md-right">{{ __('5th Over') }}</label>

                            <div class="col-md-6">
                                <input id="ov5" type="text" class="form-control{{ $errors->has('ov5') ? ' is-invalid' : '' }}" name="ov5" value="{{ old('ov5') }}">

                                @if ($errors->has('ov5'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ov5') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Calculate Run') }}
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
