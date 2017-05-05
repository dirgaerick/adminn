@extends('image_upload.layout')

@section('body')
    @include('image_upload.error-notification')
    {!! Form::open(['url'=>'/image', 'method'=>'POST', 'files'=>'true']) !!}

    <div class="form-group">
        <label for="userfile">Image File</label>
        <input type="file" class="form-control" name="userfile">
    </div>

    <div class="form-group">
        <label for="caption">Company Name</label>
        <input type="text" class="form-control" name="caption" value="">
    </div>
	<div class="form-group">
        <label for="caption">Location</label>
        <input type="text" class="form-control" name="location" value="">
    </div>
	<div class="form-group">
        <label for="caption">Email</label>
        <input type="text" class="form-control" name="email" value="">
    </div>
	<div class="form-group">
        <label for="caption">Phone Number</label>
        <input type="text" class="form-control" name="phone_number" value="">
    </div>
	<div class="form-group">
        <label for="caption">Company Type </label>
        <input type="text" class="form-control" name="type" value="">
    </div>
	<div class="form-group">
        <label for="caption">Rating</label>
        <input type="text" class="form-control" name="rating" value="">
    </div>
	<div class="form-group">
        <label for="caption">Open Hour</label>
        <input type="text" class="form-control" name="open_hour" value="">
    </div>
	<div class="form-group">
        <label for="caption">Facility</label>
        <input type="text" class="form-control" name="facility" value="">
    </div>
	<div class="form-group">
        <label for="caption">Quota</label>
        <input type="text" class="form-control" name="quota" value="">
    </div>
	<div class="form-group">
        <label for="caption">Price</label>
        <input type="text" class="form-control" name="price" value="">
    </div>
	
	

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
    <a href="{{ url('/image') }}" class="btn btn-warning">Cancel</a>

    {!! Form::close() !!}
@stop
