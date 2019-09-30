@extends('adminmaster.index')
@section('title','list user')
@section('content')
	 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User List</h1>
                    </div>
                    @include('adminmaster.note')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Gender</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($users as $user)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $user ->id }}</td>
                                <td>{{ $user ->fullname }}</td>
                                <td>{{ $user ->email }}</td>
                                <td>
                                	@if( $user ->role ==0)
                                	{{'admin' }}
                                	@elseif( $user ->role ==1)
                                	{{ 'staff' }}
                                	@else
                                	{{ 'member' }}
                                	@endif
                                </td>
                                 <td>
                                    @if( $user ->gender ==0)
                                    {{'Male' }}
                                   
                                    @else
                                    {{ 'Female' }}
                                    @endif
                                </td>
                                <td>
                                	<img src="upload/user/{{$user->avatar  }}" alt="" width="80px" height="80px" style="border-radius: 50%">
                                </td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{ $user->id }}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{ $user->id }}" onclick="return confirm('Are you sure');"> Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <div style="text-align: center">
						{{$users->links()}}
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection