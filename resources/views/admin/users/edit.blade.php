@extends('layouts.adminmain')

@section('content')
  <div>
    <h1 class="text-center">Update {{$user->firstname}}'s profile</h1>
  </div>
  <hr />
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form action="{{route('user-update',$user->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="firstname">Emri</label>
          <input type="text" name="firstname" id="firstname" class="form-control" value="{{$user->firstname}}"/>
        </div>
        <div class="form-group">
          <label for="lastname">Mbriemri</label>
          <input type="text" name="lastname" id="lastname" class="form-control" value="{{$user->lastname}}"/>
        </div>
        <div class="form-group">
          <label for="email">Emaili</label>
          <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}" readonly=""/>
        </div>
        <div class="form-group">
          <label>Roli</label>
          <select class="form-control" id="role" name="role">
            @foreach(Spatie\Permission\Models\Role::all() as $role)
              <option value="{{$role->name}}" selected="{{$user->roles()->pluck('id')->first()}}">{{$role->name}}</option>
            @endforeach
          </select>
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="Ndrysho"/>
      </form>
    </div>
  </div>
@endsection
