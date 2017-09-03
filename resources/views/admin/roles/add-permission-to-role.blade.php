@extends('layouts.adminmain')

@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form action="{{route('assign-permission-to-role',$role)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label>Add Permissions</label>
            @foreach ($permissions as $permission)
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->name}}
                  </label>
                </div>
            @endforeach
          <input type="submit" class="btn btn-success btn-block martop" value="Shto"/>
        </div>
      </form>
    </div>
  </div>
@endsection
