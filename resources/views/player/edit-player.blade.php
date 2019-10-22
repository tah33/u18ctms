@extends('layouts.app')

@section('content')
<h2>{{Session::get('msg')}}</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('update-player',$players->id) }}" enctype="multipart/form-data" name='edit'>
                        @csrf
                     
<input type='hidden' name='id' value="{{$players->id}}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  value="{{$players->name}}" required autofocus>

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
                                <input id="height" type="text" class="form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" name="height" value="{{$players->height}}" required>

                                @if ($errors->has('height'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('height') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="text" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ $players->weight }}" required>

                                @if ($errors->has('weight'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="day" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>
<div>
                            <input id="bday" type="date" class="form-control{{ $errors->has('bday') ? ' is-invalid' : '' }}" name="bday" value="{{ $players->bday }}" required>
<font size="2" color="red">{{ Session::get('error') }}</font>
                                @if ($errors->has('bday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

</br>
<div class="radio">
  <label><input type="radio" name="category"  <?= $players->category=='batsman'? 'checked':'' ?> value="batsman">Batsman</label>
  <label><input type="radio" name="category" value="bowler"  <?= $players->category=='bowler'? 'checked':'' ?>>Bowler</label>

  <label><input type="radio" name="category" value="wc"  <?= $players->category=='wc'? 'checked':'' ?>>Wicket Keeper</label>
</div>
                       
</br>
                 
                          <div><select type="text" class="form-control" id="batting_style" name="batting_style">
         <option value="rhb">Right Hand Bat</option>
         <option value="lhb">Left Hand Bat</option>

      </select>
</div>

<div></br>
	<select type="text" class="form-control" id="bowling_style" name="bowling_style">
<option value="rhb" <?php echo ($players->bowling_style=='rhb')?'selected':'' ?>>Right Hand Bowl</option>
         <option value="lhb" <?php echo ($players->bowling_style=='lhb')?'selected':'' ?>>Left Hand Bowl</option>

      </select>
</div>     <div>     
<input type="file" name="image" id="image"/></div>
 <img src="{{asset('public/images/'.$players->image)}}" width="100"/>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id= "mybutton" class="btn btn-primary">
                                    {{ __('Update') }}
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
<script>
document.forms['edit'].elements['batting_style'].value={{$players->batting_style}}

</script>