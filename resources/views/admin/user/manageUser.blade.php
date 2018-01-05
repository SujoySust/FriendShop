@extends('admin.master')

@section('content')

   <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Manage User</br>
                            <h3 style="text-align: center;color: #54A857">{{Session::get('message')}}</h3>
                            <h5 style="color: #53C542">Showing {{$users->count()}} Out of {{$users->total()}}</h5>
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $i=1; ?>
                                    	@foreach($users as $user)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->email}}</td>   
                                            <td>
                                              <a href="#" class="btn btn-success">
                                                  <span class="glyphicon glyphicon-edit"></span>
                                              </a>
                                               <a href="#" class="btn btn-danger">
                                                  <span class="glyphicon glyphicon-trash"></span>
                                              </a> 

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                	 {{ $users->links() }}

                                </div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
@endsection