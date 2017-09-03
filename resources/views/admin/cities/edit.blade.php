@extends('layouts.adminmain')

@section('content')
  <div class="row" style="border-bottom:1px solid #e6e6e6;">
			<div class="col-md-6 col-md-offset-3">
				<h1>Ndrysho kategorine - {{$city->name}}</h1>
			</div>
	</div>
  <div class="row martopinput">
    <div class="col-md-4 col-md-offset-4">
      <form action="{{route('city-update',$city->id)}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Emri i kategorise</label>
          <input type="text" class="form-control" name="name" id="name" value="{{$city->name}}"/>
        </div>
        <input type="submit" class="btn btn-success btn-block" value="Ndrysho"/>
      </form>
    </div>
  </div>
@endsection
