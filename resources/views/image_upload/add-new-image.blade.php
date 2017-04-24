@extends('image_upload.layout')

@section('body')
    @include('image_upload.error-notification')
    {!! Form::open(['url'=>'/image', 'method'=>'POST', 'files'=>'true']) !!}

    <div class="form-group">
        <label for="userfile">Cover Photo</label>
        <input type="file" class="form-control" name="userfile">
    </div>

    <div class="form-group">
        <label for="caption">Company Name</label>
        <input type="text" class="form-control" name="caption" value="">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
	

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Space Type</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
        <label for="userfile">Space Photo</label>
        <input type="file" class="form-control" name="userfile">
    </div>

    <div class="panel-body">
        <label for="caption">Title</label>
        <input type="text" class="form-control" name="caption" value="">
    </div>

    <div class="panel-body">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Menu</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
         <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
        <label for="userfile">Menu Photo</label>
        <input type="file" class="form-control" name="userfile">
    </div>

    <div class="panel-body">
        <label for="caption">Title</label>
        <input type="text" class="form-control" name="caption" value="">
    </div>

    <div class="panel-body">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
      </div>
    </div>
    <div class="panel panel-default">
     
    </div>
  </div> 
</div>
	
    <button type="submit" class="btn btn-primary">Upload</button>
    <a href="{{ url('/image') }}" class="btn btn-warning">Cancel</a>

    {!! Form::close() !!}
@stop
