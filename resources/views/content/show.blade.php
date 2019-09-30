@extends('layout')
@php
    $public_path = URL::asset('public');
@endphp
@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">

    <!-- First Blog Post -->
    <h2>
    <a href="#">{{$post->title}}</a>
    </h2>
    <p><span class="glyphicon glyphicon-time"></span> Posted on : {{$post->created_at->toDayDateTimeString()}} , <strong> Category:
    </strong>  <a href="{{route('category',$post->category->name)}}">{{$post->category->name}}</a></p>
    <hr>
    <p>{{$post->body}}</p>
    <hr>
    @if($post->imgUrl)
    <p><img src="{{$public_path.'/upload'.'/'.$post->imgUrl}}" width="600px" alt="img" ></p>
    @endif

    <form method="POST" action="{{route('comments.store',$post->id)}}" >
        <div class="form-group" >
            <textarea name="commentBody" class="form-control" placeholder="Enter your comment"></textarea>
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-primary"> Add Comment</button>
        </div>
        @csrf
    </form>
    @foreach ($post->comment as $comment)
        <p>{{$comment->body}}</p>
        <p><span class="glyphicon glyphicon-time"></span> Commented on : {{$comment->created_at->toDayDateTimeString()}} </p>

        <form action="{{route('comment.destroy',$post)}}" method="post">
                @method('DELETE')
                <button class="btn btn-primary" type="submit" >Delete</button>
                @csrf
        </form>
        <hr>

    @endforeach



</div>


@endsection
