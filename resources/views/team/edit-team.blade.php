@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Team') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('update-team',$teams->teams_id) }}">
                        @csrf
<input type='hidden' name='teams_id' value="{{$teams->teams_id}}">
                            <div><select type="text" class="form-control" id="team" name="team">
                          <option value="">Select Team</option>
         <option value="Dhaka" <?php echo ($teams->team=='Dhaka')?'selected':'' ?>>Dhaka-U18</option>
      <option value="Comilla" <?php echo ($teams->team=='Comilla')?'selected':'' ?>>Comilla-U18</option>
        <option value="Barisal" <?php echo ($teams->team=='Barisal')?'selected':'' ?>>Barisal-U18</option>
         <option value="Chittagong" <?php echo ($teams->team=='Chittagong')?'selected':'' ?>>Chittagong-U18</option>
         <option value="Rangpur" <?php echo ($teams->team=='Rangpur')?'selected':'' ?>>Rangpur-U18</option>
         <option value="Rajshahi" <?php echo ($teams->team=='Rajshahi')?'selected':'' ?>>Rajshahi-U18</option>
         <option value="Sylhet" <?php echo ($teams->team=='Sylhet')?'selected':'' ?>>Sylhet-U18</option>
         <option value="Khulna" <?php echo ($teams->team=='Khulna')?'selected':'' ?>>Khulna-U18</option>
      </select>
</div>
                             

                        <div class="form-group row">
                            <label for="coach" class="col-md-4 col-form-label text-md-right">{{ __('Coach Name') }}</label>

                            <div class="col-md-6">
                                <input id="coach" type="text" class="form-control{{ $errors->has('coach') ? ' is-invalid' : '' }}" name="coach" value="{{$teams->coach}}" required>

                             </div></div>
                 
                          <div><select type="text" class="form-control" id="manager" name="manager">
      
         <option value="{{$teams->manager}}" <?php echo ($teams->manager==$teams->manager)?'selected':'' ?>>{{$teams->manager}}</option>

         
         @foreach($manager as $manager)
         <option value="{{$manager->username}}">{{$manager->name}}</option>
         @endforeach

      </select>
      
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
            </div>
        </div>
    </div>
</div>
@endsection
