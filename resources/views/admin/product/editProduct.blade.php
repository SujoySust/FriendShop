@extends('admin.master')

@section('content')

<hr/>
<div class="row">
<div class="col-lg-12">
    <h3 style="text-align: center;color: #54A857">{{Session::get('message')}}</h3>
    <hr/>
<div class="well">
{!!Form::open([ 'url'=>'product/update/','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
{{ Form::hidden('id', $products->id) }}

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="productName" value="{{$products->productName}}"> 
        <span class="text-danger">{{$errors->has('productName')? $errors->first('productName'):''}}</span>  
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
    <div class="col-sm-10">
        <select class="form-control" name="categoryId">
            <option value="{{$products->categoryId}}">{{$products->name}}</option>
            @foreach($categories as $category)  
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            
        </select>       
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Manufacturer Name</label>
    <div class="col-sm-10">
        <select class="form-control" name="manufactureId">
            <option value="{{$products->manufactureId}}">{{$products->manufacturerName}}</option>
            @foreach($manufacturer as $manufacturer)    
            <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option>
            @endforeach
            
        </select>       
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" name="productPrice" value="{{$products->productPrice}}">  
        <span class="text-danger">{{$errors->has('productPrice')? $errors->first('productPrice'):''}}</span>    
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" name="productQuantity" value="{{$products->productQuantity}}">   
        <span class="text-danger">{{$errors->has('productQuantity')? $errors->first('productQuantity'):''}}</span>  
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Short Description</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="productShortDescription" rows="5">{{$products->productShortDescription}}</textarea>
        <span class="text-danger">{{$errors->has('productShortDescription')? $errors->first('productShortDescription'):''}}</span>      
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Long Description</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="productLongDescription" rows="8">{{$products->productLongDescription}}</textarea>
        <span class="text-danger">{{$errors->has('productLongDescription')? $errors->first('productLongDescription'):''}}</span>        
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>
    <div class="col-sm-10">
        <input type="file" name="productImage" accept="image/*">    
        <span class="text-danger">{{$errors->has('productImage')? $errors->first('productImage'):''}}</span>    
    </div>
</div>


<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pulication Status</label>
    <div class="col-sm-10">
        <select class="form-control" name="publicationStatus">
            <option value="{{$products->publicationStatus}}">{{$products->publicationStatus==1?'Published':'Unpublished'}}</option>
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