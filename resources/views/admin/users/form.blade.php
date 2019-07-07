@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$user->id}}</div>

                <div class="card-body">
                    <form action="{{route('admin.users.update',['user' =>$user->id])}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            @foreach($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input position-static" name="roles[]" {{$user->hasAnyRole($role->nome)?'checked': ''}} type="checkbox" id="{{$role->id}}" value="{{$role->id}}">
                                <label for='{{$role->id}}'>{{$role->nome}}</label>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection