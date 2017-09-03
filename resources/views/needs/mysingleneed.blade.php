@extends('layouts.main')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="row title">
        <div class="col-md-10 col-md-offset-1">
          <h1>{{$need->name}}</h1>
        </div>
      </div>
      <hr />
      <div class="row image">
        <div class="col-md-10 col-md-offset-1">
          <img src="{{asset($need->cover_image)}}"/>
        </div>
      </div>
      <hr />
      <div class="row info border abc">
        <div class="col-md-2">
          <p><strong>Qmimi</strong>: {{$need->priceFrom}} - {{$need->priceTo}}</p>
        </div>
        <div class="col-md-2">
          <p><strong>Komuna:</strong>: {{$need->city->pluck('name')->first()}}</p>
        </div>
        <div class="col-md-2">
          <p><strong>Kategoria:</strong>: {{$need->category->pluck('name')->first()}}</p>
        </div>
        <div class="col-md-2">
          <p><strong>Telefoni:</strong>: {{$need->phone_number}}</p>
        </div>
        <div class="col-md-2">
          <p><strong>Postuar Nga:</strong>: {{$need->user->pluck('name')->first()}}</p>
        </div>
      </div>
      <div class="row description border martop">
        <div class="col-md-10 col-md-offset-1">
          <p>
            {{$need->description}}
          </p>
        </div>
      </div>
      <div class="row buttons martop">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <a href="#" class="btn btn-primary btn-block">Kontakto</a>
          </div>
        </div>
      </div>
      <div class="frombottom">

      </div>
    </div>
  </div>
@endsection
