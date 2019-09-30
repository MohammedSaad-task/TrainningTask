@php
    $public_path = URL::asset('public');
@endphp
@extends('layout')

@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">
    <!-- Create new post -->
    @if(auth()->check())
        @if(auth()->user()->hasAnyRole(['admin','editor']))
        <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            <div class="form-group" style="padding:0px">
                <label for="title">Post Title</label>
                <input name="title" type="text" class="form-control" placeholder="Enter the title of the new post">
            </div>
            <div> {{$errors->first('title')}}</div>
            <div class="form-group" style="padding:0px">
                <label for="body">Post Body</label>
                <textarea name="body" class="form-control" placeholder="Enter the body of the new post"></textarea>
            </div>
            <div> {{$errors->first('body')}}</div>
            <div class="form-group">
                <label for="category">Category: </label>
                <select  class="form-control" name="name" placeholder="Choose your category">>
                        <option value="computer">computer </option>
                        <option value="web">web </option>
                        <option value="programing">programing </option>
                        <option value="sales">sales </option>
                </select>
            </div>
            <div> {{$errors->first('name')}}</div>
            <div class="form-group">
                    <label for="imgUrl">choose an Image</label>
                    <input name="imgUrl"  type="file">
            </div>
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Post</button>
            </div>
            @csrf
        </form>
        @endif

        @endif

        <!-- Blog Post -->
        @foreach ($posts as $post)
            <h2><a href="{{route('show',$post)}}">{{$post->title}}</a></h2>
            <p><span class="glyphicon glyphicon-time"></span> Posted on : {{$post->created_at->toDayDateTimeString()}} , <strong> Category:
            </strong>  <a href="{{route('category',$post->category->name)}}">{{$post->category->name}}</a></p>
            <p>{{$post->body}}</p>
            <br>
            @if($post->imgUrl)
            <p><img src="{{$public_path.'/upload'.'/'.$post->imgUrl}}" width="600px" alt="img" ></p>
            @endif
            {{-- <p><span class="glyphicon glyphicon-time"></span> Posted on : {{$post->created_at->format('l j F Y | h:i:s A')}} </p> --}}

            <form action="{{route('destroy',$post)}}" method="post">
                    @method('DELETE')
                    <a class="btn btn-primary mb-2" href="{{route('show',$post)}}">
                            Read More</a>
                    <input class="btn btn-primary" type="submit" value="Delete">
                @csrf
            </form>
        @endforeach

</div>
@endsection
