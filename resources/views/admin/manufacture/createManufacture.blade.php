@extends('admin.master')

@section('content')

<hr/>
<div class="row">
<div class="col-lg-12">
	<h3 style="text-align: center;color: #54A857">{{Session::get('message')}}</h3>
	<hr/>
<div class="well">

{!!Form::open([ 'url'=>'manufacture/save','method'=>'POST','class'=>'form-horizontal'])!!}

<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">Manufacture Name</label>
	<div class="col-sm-10">
        <input type="text" class="form-control" name="manufacturerName">		
	</div>
</div>

<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">Manufacture Description</label>
	<div class="col-sm-10">
        <textarea class="form-control" name="manufacturerDescription" rows="8"></textarea>		
	</div>
</div>
<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">Pulication Status</label>
	<div class="col-sm-10">
        <select class="form-control" name="publicationStatus">
        	<option>Select Publication Status</option>
        	<option value="1">Published</option>
        	<option value="0">Unpublished</option>
        </select>		
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" name="btn" class="btn btn-success btn-block">Save</button>
		
	</div>
	

</div>

{!!Form::close()!!}
</div>
</div>
</div>	

@endsection