@extends('layouts.adminmain')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-10">
        <h1>Te gjitha permissions</h1>
      </div>
      <div class="col-md-2">
        <!-- Trigger the modal with a button -->
        <a href="{{route('add-permission-to-role',$role->id)}}" class="btn btn-success btn-block martop">Shto</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Permission</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
          <tr>
            <td>
              {{$permission->name}}
            </td>
            <td>
              <a href=""><i class="fa fa-minus" aria-hidden="true"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      {{$permissions->links()}}
    </div>
  </div>
@endsection
