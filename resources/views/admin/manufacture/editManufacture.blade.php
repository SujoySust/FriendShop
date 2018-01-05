@extends('admin.master')

@section('content')

<hr/>
<div class="row">
<div class="col-lg-12">
   
    <hr/>
<div class="well">
@foreach($manufacture as $manufacture)
{!!Form::open([ 'url'=>'manufacture/update/','method'=>'POST','class'=>'form-horizontal'])!!}
{{ Form::hidden('id', $manufacture->id) }}

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="manufacturerName" value="{{ $manufacture->manufacturerName }}">        
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Category Description</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="manufacturerDescription" rows="8">{{ $manufacture->manufacturerDescription }}</textarea>      
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
@endforeach
</div>
</div>
</div>
  
@endsection