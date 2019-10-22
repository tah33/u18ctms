@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Player') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('save-player') }}" enctype="multipart/form-data">
                        @csrf



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>

                            <div class="col-md-6">
                                <input id="height" type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{ old('height') }}" >

                                @if ($errors->has('height'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Weight(in Kg)') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="int" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" >

                                @if ($errors->has('weight'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="bday" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

                            <div class="col-md-6">
                                <input id="bday" type="date" class="form-control{{ $errors->has('bday') ? ' is-invalid' : '' }}" name="bday" value="{{ old('bday') }}" >
                                  
                                @if ($errors->has('bday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                          <div><select type="text"  id="category" name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('category') }}">
                          <option value="">Select Category</option>
         <option value="batsman">Batsman</option>
         <option value="bowler">Bowler</option>
         <option value="other">Other</option>
         
      </select>
                           

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>

</br>
                 
                           @csrf
                      <div><select type="text"  id="batting_style" name="batting_style" class="form-control{{ $errors->has('batting_style') ? ' is-invalid' : '' }}" value="{{ old('batting_style') }}">
                          <option value="">Select Batting Style</option>
         <option value="rhb">Right Hand Bat</option>
         <option value="lhb">Left Hand Bat</option>
         
      </select>

  
                                @if ($errors->has('batting_style'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('batting_style') }}</strong>
                                    </span>
                                @endif
                          
                     </div></br>
	 <div><select type="text"  id="bowling_style" name="bowling_style" class="form-control{{ $errors->has('bowling_style') ? ' is-invalid' : '' }}" value="{{ old('bowling_style') }}">
                          <option value="">Select Bowling Style</option>
         <option value="rhb">Right Hand Bowl</option>
         <option value="lhb">Left Hand Bowl</option>
         
      </select>
                                @if ($errors->has('bowling_style'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bowling_style') }}</strong>
                                    </span>
                                @endif
                          
                     </div></br>
 <center> <div>
<input type="file" name="image" id="image"/></div></center></br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Player') }}
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


