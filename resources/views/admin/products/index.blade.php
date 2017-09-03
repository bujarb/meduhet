@extends('layouts.adminmain')

@section('content')
  <hgroup class="mb20">
    <div class="row">
      <div class="col-md-10">
        <h1>Te gjitha produktet</h1>
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
            <th>Price</th>
            <th>Category</th>
            <th>City</th>
            <th>Posted by</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td>{{$product->name}}</td>
              <td>{{substr(strip_tags($product->description),0,100)}}{{strlen($product->description)>100 ? "...": ""}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->category->pluck('name')->first()}}</td>
              <td>{{$product->city->pluck('name')->first()}}</td>
              <td>{{$product->user->pluck('firstname')->first()}}</td>
              <td>
                <form action="{{route('admin-product-delete',$product->id)}}" method="post">
                  {{csrf_field()}}
                  <button class="btn btn-danger btn-sm">Fshije</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{$products->links()}}
    </div>
  </div>
@endsection
