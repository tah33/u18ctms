@extends('layouts.app')

@section('content')
<h2>{{Session::get('msg')}}</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Venue') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('save-venue') }}" enctype="multipart/form-data">
                        @csrf
                        
<div><select type="text"  id="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                          <option value="">Select Stadium</option>
         <option value="Bangabandhu Stadium">Bangabandhu Stadium</option>
         <option value="Khan Shaheb Osman Ali Stadium">Khan Shaheb Osman Ali Stadium</option>
         <option value="M. A. Aziz Stadium">M. A. Aziz Stadium</option>
         <option value="Shaheed Chandu Stadium">Shaheed Chandu Stadium</option>
         <option value="Sheikh Abu Naser Stadium">Sheikh Abu Naser Stadium</option>
         <option value="Sher-e-Bangla Stadium">Sher-e-Bangla Stadium</option>
         <option value="Sylhet International Cricket Stadium">Sylhet International Cricket Stadium</option>
         <option value="Zohur Ahmed Chowdhury Stadium">Zohur Ahmed Chowdhury Stadium</option>
         
      </select>

      @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
                     </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Venue') }}
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
