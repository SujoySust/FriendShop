@extends('admin.master')
@section('content')

   <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Manage Category</br>
                            <h3 style="text-align: center;color: #54A857">{{Session::get('message')}}</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Category Name</th>
                                            <th>Manufacture Name</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                            <th>Piblication Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($products as $product)
                                        <tr>
                                            <td>{{$product->productName}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->manufacturerName}}</td>
                                            <td>{{$product->productPrice}}</td>
                                            <td>{{$product->productQuantity}}</td>
                                            <td>{{$product->publicationStatus == 1?'Published':'Unpublished'}}</td>
                                            <td>
                                             <a href="{{ url('product/view/'.$product->id) }}" class="btn btn-info">
                                                  <span class="glyphicon glyphicon-eye-open"></span>
                                              </a>
                                              <a href="{{ url('product/edit/'.$product->id) }}" class="btn btn-success">
                                                  <span class="glyphicon glyphicon-edit"></span>
                                              </a>
                                               <a href="{{ url('product/delete/'.$product->id) }}" class="btn btn-danger">
                                                  <span class="glyphicon glyphicon-trash"></span>
                                              </a> 

                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

@endsection