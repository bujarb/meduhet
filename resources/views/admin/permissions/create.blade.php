@extends('layouts.adminmain')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-10">
        <h1>Shto permissions</h1>
      </div>
      <div class="col-md-2">
        <!-- Trigger the modal with a button -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form action="{{route('permission-store')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Permission Name:</label>
          <input type="text" class="form-control" name="name" id="name" />
        </div>
        <div class="form-group">
          <label>Rolet</label>
          @foreach (DB::table('roles')->get() as $role)
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="roles[]" value="{{$role->id}}">{{$role->name}}
                </label>
              </div>
          @endforeach
        </div>
        <input type="submit" class="btn btn-success btn-block" value="Shto"/>
      </form>
    </div>
  </div>
@endsection
