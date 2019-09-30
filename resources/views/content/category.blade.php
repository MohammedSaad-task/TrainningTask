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
            <div class="form-group" style="padding:0px">
                    <label for="Ctegory">Ctegory</label>
                    <input name="Ctegory_name" type="text" class="form-control" placeholder="Enter the Ctegory of the new post">
            </div>
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
                </strong>  {{$post->category->name}} </p>
            <p>{{$post->body}}</p>
            <br>
            @if($post->imgUrl)
            <p><img src="{{$public_path.'/upload'.'/'.$post->imgUrl}}" width="600px" alt="img" ></p>
            @endif
            {{-- <p><span class="glyphicon glyphicon-time"></span> Posted on : {{$post->created_at->format('l j F Y | h:i:s A')}} </p> --}}
            <a class="btn btn-primary" href="{{route('show',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            @endforeach

    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>

</div>
<!-- End Blog Entries Column -->
@endsection
