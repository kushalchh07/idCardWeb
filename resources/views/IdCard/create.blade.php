@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <button class="btn btn-secondary" onclick="history.back()">
                        <i class="bi bi-arrow-left-circle"></i> Back
                    </button>
                </div>
                @if($idCard->exists)
                    <h2 class="text-center">Edit ID Card Details</h2>
                @else
                    <h2 class="text-center">Add Id Card Details</h2>
                @endif
                <form action="{{ $idCard->exists ? route('idCard.update',['idCard'=>$idCard->id]) : route('idCard.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($idCard->exists)
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="photo">Upload Photo</label>
                        @if($idCard->exists && $idCard->photo)
                            <img id="previewImage" src="{{ asset('storage/' . $idCard->photo) }}" class="img-thumbnail" style="width:60px">
                            <input type="file" class="form-control-file mt-2" id="photo" name="photo" accept="image/*" onchange="previewFile()">
                        @else
                            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" onchange="previewFile()">
                        @endif
                        @error('photo')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>                   
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{old('full_name',$idCard->full_name ?? '')}}">
                        @error('full_name')
                            <span class="form-error">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="college_name">College</label>
                        <input type="text" class="form-control" id="college_name" name="college_name" value="{{old('college_name',$idCard->college_name ?? '')}}">
                        @error('college_name')
                            <span class="form-error">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email',$idCard->email ?? '')}}">
                        @error('email')
                            <span class="form-error">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address',$idCard->address ?? '')}}">
                        @error('address')
                            <span class="form-error">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{old('dob',$idCard->dob ?? '')}}">
                        @error('dob')
                            <span class="form-error">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Card Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{old('expiry_date',$idCard->expiry_date ?? '')}}">
                        @error('expiry_date')
                            <span class="form-error">{{$message}} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Position</label>
                        <select class="form-control" id="position" name="position">
                            <option value="">Select Position</option>
                            <option value="Student" {{ old('position') == 'Student' || $idCard->position == 'Student' ? 'selected' : '' }}>Student</option>
                            <option value="Staff" {{ old('position') == 'Staff' || $idCard->position == 'Staff' ? 'selected' : '' }}>Staff</option>
                            <option value="Faculty" {{ old('position') == 'Faculty' || $idCard->position == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                        </select>
                        @error('position')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>                    
                    <button type="submit" class="btn btn-primary">{{$idCard->exists?'Update':'Create'}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection