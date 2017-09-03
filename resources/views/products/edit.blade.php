@extends('layouts.main')

@section('content')
  <div class="page-header">
    <h1 class="text-center">Ndrysho produktin tuaj</h1>
  </div>

    <div class="row">
      <form action="{{route('update.product',$product->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="col-md-4 col-md-offset-1 ">
        <img src="{{asset($product->cover_image)}}" class="img-rounded"/>
        <input type="file" name="file" id="form" class="martop"/>
      </div>
      <div class="col-md-4  col-md-offset-1">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="description">Pershkrimi</label>
          <textarea class="form-control" name="description" id="description" rows="10">{{$product->description}}</textarea>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="price">Qmimi:</label>
            <input type="text" name="price" id="price" class="form-control text-center" value="{{$product->price}}" />
          </div>
          <div class="col-md-8">
            <label for="city">Qyteti</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{$product->phone_number}}"/>
          </div>
        </div>
        <div class="form-group">
          <label for="category">Qyteti</label>
          <select class="form-control" name="city" id="city">
            @foreach (DB::table('cities')->get() as $city)
              <option selected="{{$product->id}}" value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="category">Kategoria</label>
          <select class="form-control" name="category" id="category">
            @foreach (DB::table('categories')->get() as $category)
              <<option selected="{{$product->id}}" value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <hr />
        <div class="row frombottom">
          <div class="col-md-6">
            <input type="submit" class="btn btn-success btn-block" value="Ndrysho"/>
          </div>
          <div class="col-md-6">
            <input type="submit" class="btn btn-danger btn-block" value="Anulo"/>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
