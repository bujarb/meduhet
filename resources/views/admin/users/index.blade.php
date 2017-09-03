<?php  $count = 1;?>
@extends('layouts.adminmain')

@section('content')
  <div class="row" style="border-bottom:1px solid #e6e6e6;">
			<div class="col-md-6">
				<h1>Te gjithe perdoruesit</h1>
			</div>
	</div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>name</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Linked Accounts</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users  as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->lastname}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->roles()->pluck('name')->first()}}</td>
              <td>
                @if($user->facebook_user_id)
                  Facebook
                @endif
              </td>
              <td><a href="{{route('user-edit',$user->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
              <td>
                <form action="{{route('user-delete',$user->id)}}" method="post">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->links() }}
    </div>
  </div>
@endsection
