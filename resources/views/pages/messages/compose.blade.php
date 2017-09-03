@extends('layouts.main')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form action="{{route('send-message',$userTo->id)}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
          <label>Body</label>
          <textarea class="form-control" name="body"></textarea>
        </div>
        <button class="btn btn-primary btn-block">Dergo</button>
      </form>
    </div>
  </div>
@endsection
