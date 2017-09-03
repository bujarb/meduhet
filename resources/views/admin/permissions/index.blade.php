@extends('layouts.adminmain')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-10">
        <h1>Te gjitha permissions</h1>
      </div>
      <div class="col-md-2">
        <!-- Trigger the modal with a button -->
      <a href="{{route('permission-create')}}" class="btn btn-success btn-block martop">Shto</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Permissions Name:</th>
            <th>Role</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($permissions as $permission)
            <tr>
              <td>{{$permission->name}}</td>
              <td>
                  @foreach($permission->roles()->get() as $role)
                    | {{$role->name}} |
                  @endforeach
              </td>
              <td>
                <form action="{{route('permission-delete',$permission->id)}}" method="post">
                  {{csrf_field()}}
                  <button class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{$permissions->links()}}
    </div>
  </div>
@endsection
