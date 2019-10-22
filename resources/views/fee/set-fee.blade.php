@extends('layouts.app')

@section('content')
 <head>
    <title>Register Account</title>
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
                <div class="card-header">{{ __('Add fine') }}</div>
                <div class="card-body">
                  @foreach($fees as $fee)
                    <form method="POST" action="{{ url('update-fine',$fee->fees_id) }}" enctype="multipart/form-data">
                        @csrf
                      
<input type='hidden' name='fees_id' value="{{$fee->fees_id}}">
@endforeach

  <div><select type="text"  id="player" name="player" class="form-control{{ $errors->has('player') ? ' is-invalid' : '' }}" >
                          <option value="">Select player</option>
                          @foreach($fees as $player)
         <option value="{{$player->name}}@if($player->captain)({{$player->captain}})@endif" >{{$player->name}}@if($player->captain)({{$player->captain}})@endif</option>
       @endforeach
      </select>

  
                                @if ($errors->has('player'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('player') }}</strong>
                                    </span>
                                @endif
                          
                     </div>
</br>
                     <div class="form-group row">
                            <label for="fine" class="col-md-4 col-form-label text-md-right">{{ __('Fine(in %)') }}</label>

                            <div class="col-md-6">
                                <input id="fine" type="int" class="form-control{{ $errors->has('fine') ? ' is-invalid' : '' }}" name="fine" value="{{old('fine')}}">

                                @if ($errors->has('fine'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fine') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                      <div><select type="text"  id="reason" name="reason" class="form-control{{ $errors->has('reason') ? ' is-invalid' : '' }}" >
                          <option value="">Select Reason</option>
                          
         <option value="Match Delay">Match Delay</option>
       <option value="Bad Behaviour">Bad Behaviour</option>
      </select>

  
                                @if ($errors->has('reason'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                @endif
                          
                     </div>  

     <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
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
