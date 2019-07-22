@extends('layouts.admin')

@section('content')

    <h1>Edit Users</h1>

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : "/images/placeholder.jpg"}}" alt="" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>'true']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Active status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Inactive'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Upload photo:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

@stop