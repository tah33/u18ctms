@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Team') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('save-team') }}" enctype="multipart/form-data">
                        @csrf
                      <div><select type="text"  id="team" name="team" class="form-control{{ $errors->has('team') ? ' is-invalid' : '' }}" value="{{ old('team') }}" autofocus>
                          <option value="">Select Team</option>
         <option value="Dhaka">Dhaka-U18</option>
         <option value="Comilla">Comilla-U18</option>
         <option value="Barisal">Barisal-U18</option>
         <option value="Chittagong">Chittagong-U18</option>
         <option value="Rangpur">Rangpur-U18</option>
         <option value="Rajshahi">Rajshahi-U18</option>
         <option value="Sylhet">Sylhet-U18</option>
         <option value="Khulna">Khulna-U18</option>
      </select>

  
                                @if ($errors->has('team'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('team') }}</strong>
                                    </span>
                                @endif
                          
                     </div></br>

                          <div class="form-group row">
                            <label for="coach" class="col-md-4 col-form-label text-md-right">{{ __('Coach') }}</label>

                            <div class="col-md-6">
                                <input id="coach" type="text" class="form-control{{ $errors->has('coach') ? ' is-invalid' : '' }}" name="coach" value="{{ old('coach') }}">

                                @if ($errors->has('coach'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('coach') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
</br>
                 
                        <div><select type="text"  id="manager" name="manager" class="form-control{{ $errors->has('manager') ? ' is-invalid' : '' }}" value="{{ old('manager') }}">
                          <option value="">Select Team Manger</option>
                          @foreach($manager as $man)
                          <option value="{{$man->username}}">{{$man->name}}</option>
                          @endforeach
         
      </select>

  
                                @if ($errors->has('manager'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('manager') }}</strong>
                                    </span>
                                @endif
                          
                     </div>


     
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Team') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div></div>
        </div>
    </div>
</div>
@endsection
