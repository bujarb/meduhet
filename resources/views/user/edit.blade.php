@extends('layouts.main')

@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form>
          <div class="form-group">
            <img src="{{$user->profilepic}}"/>
          </div>
          <div class="form-group">
            <label>Emri</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}"/>
          </div>
          <div class="form-group">
            <label>Mbiemri</label>
            <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}"/>
          </div>
          <div class="form-group">
            <label>Emaili</label>
            <input type="text" name="email" class="form-control" value="{{$user->email}}"/>
          </div>
          <div class="form-group">
            <label>Bio</label>
            <textarea class="form-control" name="bio"></textarea>
          </div>
          <div class="form-group">
            <label>Qyteti</label>
            <input type="text" name="city" class="form-control" value="{{$user->city}}"/>
          </div>
          <button class="btn btn-primary btn-block">Ndrysho</button>
      </form>
    </div>
  </div>
@endsection
