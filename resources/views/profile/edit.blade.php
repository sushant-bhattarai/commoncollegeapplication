@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Your Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                        <option value="Male" {{ ($profile->gender) == "Male"?"selected":"" }}>Male</option>
                                        <option value="Female" {{ ( $profile->gender) == "Female"?"selected":"" }}>Female</option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" placeholder="(Format: Municipality/VDC - wardNo, District)" value="{{$profile->address}}" autofocus >

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth (A.D.)') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required autocomplete="dob" value="{{$profile->dob}}" autofocus>

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="phone_number" value="{{$profile->phone_number}}" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="your_photo" class="col-md-4 col-form-label text-md-right">{{ __('Your Photo') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="your_photo" id="your_photo" class="form-control @error('your_photo') is-invalid @enderror" required>

                                    @error('your_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="citizenship_photo" class="col-md-4 col-form-label text-md-right">{{ __('Citizenship Copy') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="citizenship_photo" id="citizenship_photo" class="form-control @error('citizenship_photo') is-invalid @enderror" required>

                                    @error('citizenship_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="school_name" class="col-md-4 col-form-label text-md-right">{{ __('School Name') }}</label>

                                <div class="col-md-6">
                                    <input id="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" name="school_name" required autocomplete="school_name" value="{{$profile->school_name}}" autofocus>

                                    @error('school_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="marksheet_photo" class="col-md-4 col-form-label text-md-right">{{ __('Marksheet copy') }}</label>

                                <div class="col-md-6">
                                    <input type="file" name="marksheet_photo" id="marksheet_photo" class="form-control @error('marksheet_photo') is-invalid @enderror" required>
                                    
                                    @error('marksheet_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Your Interests') }}</label>

                                <div class="col-md-6">
                                <?php  
                                    $arrayOfInterest = explode(',', $profile->interest);
                                ?>
                                    <label><input type="checkbox" name="interest[]" value="Academic" 
                                    <?php foreach($arrayOfInterest as $interest){
                                        echo ($interest == "Academic")?"checked":"";
                                    } ?>
                                    > Academic </label><br>
                                    
                                    <label><input type="checkbox" name="interest[]" value="Sports" 
                                    <?php foreach($arrayOfInterest as $interest){
                                        echo ($interest == "Sports")?"checked":"";
                                    } ?>
                                    > Sports </label><br>
                                    
                                    <label><input type="checkbox" name="interest[]" value="ECA" 
                                    <?php foreach($arrayOfInterest as $interest){
                                        echo ($interest == "ECA")?"checked":"";
                                    } ?>
                                    > ECA </label><br>
                                    
                                    <label><input type="checkbox" name="interest[]" value="Leadership" 
                                    <?php foreach($arrayOfInterest as $interest){
                                        echo ($interest == "Leadership")?"checked":"";
                                    } ?>
                                    > Leadership </label><br>

                                    @error('interest')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
