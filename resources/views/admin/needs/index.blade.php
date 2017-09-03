@extends('layouts.adminmain')

@section('content')
  <hgroup class="mb20">
    <div class="row">
      <div class="col-md-10">
        <h1>Te gjitha nevojat</h1>
      </div>
      <div class="col-md-2">
        @if (Auth::check())
          <a href="{{route('add.product')}}" class="btn btn-primary bnt-sm btn-block frombottom">Shto</a>
        @endif
      </div>
    </div>
  </hgroup>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price From</th>
            <th>Price To</th>
            <th>Category</th>
            <th>City</th>
            <th>Posted by</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($needs as $need)
            <tr>
              <td>{{$need->name}}</td>
              <td>{{substr(strip_tags($need->description),0,100)}}{{strlen($need->description)>100 ? "...": ""}}</td>
              <td>{{$need->priceFrom}}</td>
              <td>{{$need->priceTo}}</td>
              <td>{{$need->category->pluck('name')->first()}}</td>
              <td>{{$need->city->pluck('name')->first()}}</td>
              <td>{{$need->user->pluck('name')->first()}}</td>
              <td>
                <form action="{{route('admin-need-delete',$need->id)}}" method="post">
                  {{csrf_field()}}
                  <button class="btn btn-danger btn-sm">Fshije</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{$needs->links()}}
    </div>
  </div>
@endsection
