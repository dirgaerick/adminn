@extends('image_upload.layout')

@section('body')
    @include('image_upload.error-notification')
    {!! Form::model($image,['url' => '/image/edit/'.$image->id, 'method' => 'PUT', 'files'=>true]) !!}
	
    <img src="{{ asset($image->file) }}" height="150" />
    <div class="form-group">
        <label for="userfile">Image File</label>
        {!! Form::file('userfile',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="caption">Company name</label>
        {!! Form::text('caption',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        <label for="caption">Location</label>
        {!! Form::text('location',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        <label for="caption">Email</label>
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        <label for="caption">Phone Number</label>
        {!! Form::text('phone_number',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        <label for="caption">Rating</label>
        {!! Form::text('rating',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        <label for="caption">Open Hour</label>
        {!! Form::text('open_hour',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        <label for="caption">Facility</label>
        {!! Form::text('facility',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        <label for="caption">Quota</label>
        {!! Form::text('quota',null,['class'=>'form-control']) !!}
    </div>
	<div class="form-group">
        <label for="caption">Price</label>
        {!! Form::text('price',null,['class'=>'form-control']) !!}
    </div>
	
    <div class="form-group">
        <label for="description">Description</label>
        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
    </div>
	
	<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Space Type</a>
        </h4>
      </div>
	  
	
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="{!! route('image.show', $image->id) !!}">
                        <img id="myImg" src="{{asset($image->file)}}" class="img-responsive"/>
                    </a>
                    <div class="caption">
                        <h3>{{$image->caption}}</h3>
                        <p>{!! substr($image->description, 0,100) !!}</p>
                        <p>
                        <div class="row text-center" style="padding-left:1em;">
                            <!--<a href="{{ url('/image/'.$image->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>-->
                            <span class="pull-left">&nbsp;</span>
                            {!! Form::open(['url'=>'/image/'.$image->id, 'class'=>'pull-left']) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure?\')']) !!}
                            {!! Form::close() !!}
                        </div>
                        </p>
                    </div>
                </div>
            </div>
       
            
	  
	  
	  
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
			<label for="suserfile">Space Photo</label>
			<input type="file" class="form-control" name="suserfile">
		</div>
		<div class="panel-body">
			<label for="scaption">Title</label>
			<input type="text" class="form-control" name="scaption" value="">
		</div>
		<div class="panel-body">
			<label for="sdescription">Description</label>
			<textarea class="form-control" name="sdescription"></textarea>
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
				<label for="muserfile">Menu Photo</label>
				<input type="file" class="form-control" name="muserfile">
			</div>
			<div class="panel-body">
				<label for="mcaption">Title</label>
				<input type="text" class="form-control" name="mcaption" value="">
			</div>
			<div class="panel-body">
				<label for="mdescription">Description</label>
				<textarea class="form-control" name="mdescription"></textarea>
			</div>
		</div>
	  </div>
    </div>
	</div>
	
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ url('/image') }}" class="btn btn-warning">Cancel</a>

    {!! Form::close() !!}
@stop
