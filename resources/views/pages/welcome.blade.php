@extends('layouts.main')

@section('content')
@if (count($products)>0)
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <hgroup class="mb20">
        <div class="row">
          <div class="col-md-10">
            <h1>Produktet e fundit</h1>
          </div>
          <div class="col-md-2">
            <a href="{{route('products.all')}}" class="btn btn-primary btn-sm frombottom">Shiko te gjitha</a>
          </div>
        </div>
      </hgroup>
      <section class="col-xs-12 col-sm-6 col-md-12 section">
          	@foreach ($products as $product)
              <article class="search-result row">
            			<div class="col-xs-12 col-sm-12 col-md-3">
            				<a href="#" class="thumbnail"><img src="{{asset($product->cover_image)}}" /></a>
            			</div>
            			<div class="col-xs-12 col-sm-12 col-md-3 borright">
            				<ul class="meta-search">
                      <li><i class="glyphicon glyphicon-time"></i> <span><strong>Data:</strong>{{$product->created_at->format('M d Y')}}</span></li>
            					<li><i class="glyphicon glyphicon-time"></i> <span><strong>Nga:</strong> <a href="{{route('view-user-profile',$product->user_id)}}">{{$product->user()->pluck('name')->first()}}</a></span></li>
                      <li><i class="glyphicon glyphicon-tags"></i> <span><strong>Nr. Telefonit:</strong> {{$product->phone_number}}</span></li>
            				</ul>
            			</div>
            			<div class="col-xs-12 col-sm-12 col-md-6 excerpet borright">
                    <div class="row">
            				      <h3 class="fromleft"><a href="#" title="">{{$product->name}}</a></h3>
                    </div>
                    <div class="row description ">
                      <p class="fromleft">{{substr(strip_tags($product->description),0,200)}}{{strlen($product->description)>200 ? "...": ""}}</p>
                    </div>
                    <hr class="myhr"/>
                    <div class="row smallbox">
                      <div class="col-md-4 ">
                        <h5> <strong>{{$product->price}}</strong> EUR</h5>
                      </div>
                      <div class="col-md-4 ">
                        <h5> <strong>{{$product->category()->pluck('name')->first()}}</strong></h5>
                      </div>
                      <div class="col-md-4 ">
                        <h5><strong>{{$product->city()->pluck('name')->first()}}</strong></h5>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-4">
                        <a href="{{route('compose',$product->user_id)}}" class="btn btn-success btn-block">Kontakto</a>
                      </div>
                      <div class="col-md-4">
                        <a href="{{route('product.single',$product->id)}}" class="btn btn-info btn-block">Shiko</a>
                      </div>
                        <div class="col-md-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" class="btn btn-primary btn-block">Shperndaje</a>
                        </div>
                    </div>
            			</div>
            			<span class="clearfix borda"></span>
            		</article>
          	@endforeach
      </section>
    </div>
  </div>
@else
  <h3 class="text-center">Nuk u gjend asnje produkt</h3>
  <hr />
@endif
@if (count($needs)>0)
  <hr />
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <hgroup class="mb20">
        <div class="row">
          <div class="col-md-10">
            <h1>Nevojat e fundit</h1>
          </div>
          <div class="col-md-2">
            <a href="{{route('needs.all')}}" class="btn btn-primary btn-sm frombottom">Shiko te gjitha</a>
          </div>
        </div>
      </hgroup>
      <section class="col-xs-12 col-sm-6 col-md-12 section">
          	@foreach ($needs as $need)
              <article class="search-result row">
            			<div class="col-xs-12 col-sm-12 col-md-3">
            				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{asset($need->cover_image)}}" alt="Lorem ipsum" /></a>
            			</div>
            			<div class="col-xs-12 col-sm-12 col-md-3 borright">
            				<ul class="meta-search">
            					<li><i class="glyphicon glyphicon-calendar"></i> <span>{{$need->created_at->format('M d Y')}}</span></li>
            					<li><i class="glyphicon glyphicon-time"></i> <span><strong>Nga:</strong> {{$need->user()->pluck('name')->first()}}</span></li>
            					<li><i class="glyphicon glyphicon-tags"></i> <span><strong>Nr. Telefonit:</strong> {{$need->phone_number}}</span></li>
            				</ul>
            			</div>
            			<div class="col-xs-12 col-sm-12 col-md-6 excerpet borright">
                    <div class="row">
            				      <h3 class="fromleft"><a href="#" title="">{{$need->name}}</a></h3>
                    </div>
                    <div class="row description">
                      <p class="fromleft">{{substr(strip_tags($need->description),0,300)}}{{strlen($need->description)>300 ? "...": ""}}</p>
                    </div>
                    <hr class="myhr"/>
                    <div class="row smallbox">
                      <div class="col-md-4 ">
                        <h5> <strong>{{$need->priceFrom}} - {{$need->priceTo}} </strong> EUR</h5>
                      </div>
                      <div class="col-md-4 ">
                        <h5> <strong>{{$need->category()->pluck('name')->first()}}</strong></h5>
                      </div>
                      <div class="col-md-4 ">
                        <h5><strong>{{$need->city()->pluck('name')->first()}}</strong></h5>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-4">
                        <a href="#" class="btn btn-success btn-block">Kontakto</a>
                      </div>
                      <div class="col-md-4">
                        <a href="{{route('need.single',$need->id)}}" class="btn btn-info btn-block">Shiko</a>
                      </div>
                        <div class="col-md-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" class="btn btn-primary btn-block">Shperndaje</a>
                        </div>
                    </div>
            			</div>
            			<span class="clearfix borda"></span>
            		</article>
          	@endforeach
      </section>
    </div>
  </div>
  <div class="frombottom">

  </div>
@else
  <h3 class="text-center">Nuk u gjend asnje nevoje</h3>
@endif
@endsection
