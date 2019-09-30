@extends('layout')
@section('content')

<div class="col-md-8">
    <h4> Control panel for Admin</h4>
    <h6> Table of users </h6>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Nmae</th>
                <th>E-mail</th>
                <th>User</th>
                <th>Editor</th>
                <th>Admin</th>
            </tr>
            @foreach ($users as $user)
                <form action="{{route('addRole')}}" method="post">
                @csrf
                    <input type="hidden" name="email" value="{{$user->email}}">
                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>
                            <input type="checkbox" name="user" onchange="this.form.submit()" {{$user->hasRole('user')? 'checked': ' '}}>
                        </th>
                        <th>
                            <input type="checkbox" name="editor" onchange="this.form.submit()" {{$user->hasRole('editor')? 'checked': ' '}}>
                        </th>
                        <th>
                            <input type="checkbox" name="admin" onchange="this.form.submit()" {{$user->hasRole('admin')? 'checked': ' '}}>
                        </th>
                    </tr>
                </form>
            @endforeach
        </table>
    </div>
</div>

@endsection
