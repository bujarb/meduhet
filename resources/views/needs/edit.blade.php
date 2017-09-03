@extends('layouts.main')

@section('content')
  <div class="page-header">
    <h1 class="text-center">Ndrysho nevojen tuaj</h1>
  </div>

    <div class="row">
      <form action="{{route('update.need',$need->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="col-md-4 col-md-offset-1 ">
        <img src="{{asset($need->cover_image)}}" class="img-rounded"/>
        <input type="file" name="file" id="form" class="martop"/>
      </div>
      <div class="col-md-4  col-md-offset-1">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" value="{{$need->name}}" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="description">Pershkrimi</label>
          <textarea class="form-control" name="description" id="description">{{$need->description}}</textarea>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="pricefrom">Qmimi prej:</label>
            <input type="text" name="pricefrom" id="pricefrom" class="form-control text-center" value="{{$need->priceFrom}}" />
          </div>
          <div class="col-md-6">
            <label for="priceto">Qmimi prej:</label>
            <input type="text" name="priceto" id="priceto" class="form-control text-center" value="{{$need->priceTo}}"/>
          </div>
        </div>
        <div class="form-group">
          <label for="category">Kategoria</label>
          <select class="form-control" name="category" id="category">
            @foreach (DB::table('categories')->get() as $category)
              <<option selected="{{$need->id}}" value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="city">Qyteti</label>
          <select class="form-control" name="city" id="city">
            @foreach (DB::table('cities')->get() as $city)
              <<option selected="{{$need->id}}" value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
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
