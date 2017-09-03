@extends('layouts.adminmain')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-10">
        <h1>Te gjitha permissions</h1>
      </div>
      <div class="col-md-2">
        <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-success btn-block martop" data-toggle="modal" data-target="#myModal">Shto</button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Role Name:</th>
            <th>Edit Permissions</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
            <tr>
              <td>{{$role->name}}</td>
              <td><a href="{{route('role-permissions',$role->id)}}" class="btn btn-success btn-sm">Edit Permissions</a></td>
              <td>
                <form action="{{route('role-delete',$role->id)}}" method="post">
                  {{csrf_field()}}
                  <button class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
