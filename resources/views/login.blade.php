@extends('layout')
@section('content')

<div class="col-md-8">
    <form method="post" action="{{route('login.store')}}">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name='email' placeholder="Email">
            </div>
            <div class="form-group">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div> {{$errors->first()}}</div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>

</div>

@endsection
