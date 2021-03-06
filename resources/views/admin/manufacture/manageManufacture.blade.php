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
                                            <th>Id</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Piblication Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($manufacture as $manufacture)
                                        <tr>
                                            <td>{{$manufacture->id}}</td>
                                            <td>{{$manufacture->manufacturerName}}</td>
                                            <td>{{$manufacture->manufacturerDescription}}</td>
                                            <td>{{$manufacture->publicationStatus}}</td>
                                            <td>
                                              <a href="{{ url('manufacture/edit/'.$manufacture['id']) }}" class="btn btn-success">
                                                  <span class="glyphicon glyphicon-edit"></span>
                                              </a>
                                               <a href="{{ url('manufacture/delete/'.$manufacture['id']) }}" class="btn btn-danger">
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