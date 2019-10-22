@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pay Due') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('update-dues',$fees->fees_id) }}" enctype="multipart/form-data">
                        @csrf
                      
<input type='hidden' name='id' value="{{$fees->fees_id}}">
<div class="form-group row">
                            <label for="fee" class="col-md-4 col-form-label text-md-right">{{ __('Match fee(in Tk)') }}</label>

                            <div class="col-md-6">
                                <input id="fee" type="int" pattern="^\d*(\.\d{1,2})?$" class="form-control{{ $errors->has('fee') ? ' is-invalid' : '' }}" name="fee" value="{{ $fees->fee }}" readonly="readonly">

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fine" class="col-md-4 col-form-label text-md-right">{{ __('Match fine(in %)') }}</label>

                            <div class="col-md-6">
                                <input id="fine" type="int" pattern="^\d*(\.\d{1,2})?$" class="form-control{{ $errors->has('fine') ? ' is-invalid' : '' }}" name="fine" value="{{ $fees->fine }}" readonly="readonly">

                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fee" class="col-md-4 col-form-label text-md-right">{{ __('Pay fee(in Tk)') }}</label>

                            <div class="col-md-6">
                                <input id="fee" type="int" pattern="^\d*(\.\d{1,2})?$" class="form-control{{ $errors->has('paid_fee') ? ' is-invalid' : '' }}" name="paid_fee" value="{{ $fees->paid_fee }}">

                               @if ($errors->has('paid_fee'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('paid_fee') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fine" class="col-md-4 col-form-label text-md-right">{{ __('Pay fine(in Tk)') }}</label>

                            <div class="col-md-6">
                                <input id="fine" type="int" pattern="^\d*(\.\d{1,2})?$" class="form-control{{ $errors->has('paid_fine') ? ' is-invalid' : '' }}" name="paid_fine" >

                                @if ($errors->has('paid_fine'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('paid_fine') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pay') }}
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
