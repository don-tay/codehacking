@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif

    <h1>Users</h1>

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit User</th>
          </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
          <tr style="text-align:justify">
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{$user->photo ? $user->photo->file : "/images/placeholder.jpg"}}" alt=""></td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a> </td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>

            {{--Edit user button here--}}
            <td>
                    <a href="{{route('admin.users.edit', $user->id)}}" type="button" class="btn btn-primary">Edit</a>
            </td>
            {{--Delete user button here--}}
            <td>
                  {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

                  <div class="form-group">
                      {!! Form::submit('Delete', ['class'=>'btn btn-sq-xs btn-danger']) !!}
                  </div>
            </td>
                  {!! Form::close() !!}
          </tr>

            @endforeach

        @endif

        </tbody>
    </table>
@stop