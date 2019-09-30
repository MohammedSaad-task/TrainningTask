@extends('layout')
@section('content')

<div class="col-md-8">
    <form method="post" action="{{route('register.store')}}">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" name='name' placeholder="Enter your full name">
            </div>
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name='email' placeholder="Email">
            </div>
            <div class="form-group">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
    </form>

</div>

@endsection
