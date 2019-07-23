@extends('layouts.admin')

@section('content')
    <h1>All Posts</h1>

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo_id</th>
            <th>User</th>
            <th>Category_id</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created_at</th>
            <th>Updated_at</th>
          </tr>
        </thead>

        <tbody>
            @if($posts)
                @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="{{$post->photo ? $post->photo->file : "/images/placeholder.jpg"}}" alt=""></td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category_id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
                @endforeach
            @endif


        </tbody>
    </table>
@stop
