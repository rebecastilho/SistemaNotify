@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope='row'>{{$user->name}}</th>
                                    <th scope='row'>{{$user->email}}</th>
                                    <th scope='row'>{{ implode(', ',$user->roles()->get()->pluck('nome')->toArray() )}}</th>
                                    <th>
                                        <a href="{{ route('admin.users.edit',$user->id) }}">
                                            <button class='btn btn-primary'>Edit</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection