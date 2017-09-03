  @extends('layouts.main')

@section('content')
<div class="row">
  <h3 class="text-center">Ketu mund te beni kerkim te avanuar per produktet apo nevojat</h3>
</div>
<div id="search">
  <form action="{{route('search-res')}}" method="get">
    <div class="row">
      <div class="col-sm-12">
        <div class="col-md-4 ">
          <label>Fjale:</label>
          <input type="text" class="form-control" name="name"/ id="name" value="{{ Input::get('name') }}">
        </div>
        <div class="col-md-2 ">
          <label>Qfar kerkoni:</label>
          <select class="form-control" name="type" id="type">
            <option value="need">Nevoje</option>
            <option value="product">Produkt</option>
          </select>
        </div>
        <div class="col-md-2 ">
          <label>Kategoria:</label>
          <select class="form-control" name="category" id="category">
            @foreach (DB::table('categories')->get() as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2 ">
          <label>Qyteti:</label>
          <select class="form-control" name="city" id="city">
            @foreach (DB::table('cities')->get() as $city)
              <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <button class="btn btn-info btn-block buttontop">Kerko</button>
        </div>
      </div>
    </div>
  </form>
</div>
<hr class="searchhr"/>
@if (isset($needs))
  @if(count($needs)>0)
    <hgroup class="mb20">
      <div class="row">
        <div class="col-md-8">
          <h1>Rezultatet i kerkimit per nevojen <strong>{{Request::input('name')}}</strong></h1>
        </div>
        <div class="col-md-2">

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
                      <h5> <strong>{{$need->price}}</strong> EUR</h5>
                    </div>
                    <div class="col-md-4 ">
                      <h5> <strong>{{$need->category()->pluck('name')->first()}}</strong></h5>
                    </div>
                    <div class="col-md-4 ">
                      <h5><strong>{{$need->city()->pluck('name')->first()}}</strong></h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <a href="#" class="btn btn-success btn-block">Kontakto</a>
                    </div>
                    <div class="col-md-6 pull-right">
                      <a href="{{route('need.single',$need->id)}}" class="btn btn-info btn-block">Shiko</a>
                    </div>
                  </div>
                </div>
                <span class="clearfix borda"></span>
              </article>
          @endforeach
    </section>
  @else
    <h3>Nuk egziston !</h3>
  @endif
@endif

@if (isset($products))
  @if(count($products)>0)
    <hgroup class="mb20">
      <div class="row">
        <div class="col-md-8">
          <h1>Rezultatet i kerkimit per produktin <strong>{{Request::input('name')}}</strong></h1>
        </div>
        <div class="col-md-2">

        </div>
      </div>
    </hgroup>
    <section class="col-xs-12 col-sm-6 col-md-12 section">
          @foreach ($products as $product)
            <article class="search-result row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                  <a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{asset($product->cover_image)}}" alt="Lorem ipsum" /></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 borright">
                  <ul class="meta-search">
                    <li><i class="glyphicon glyphicon-calendar"></i> <span>{{$product->created_at->format('M d Y')}}</span></li>
                    <li><i class="glyphicon glyphicon-time"></i> <span><strong>Nga:</strong> {{$product->user()->pluck('name')->first()}}</span></li>
                    <li><i class="glyphicon glyphicon-tags"></i> <span><strong>Nr. Telefonit:</strong> {{$product->phone_number}}</span></li>
                  </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 excerpet borright">
                  <div class="row">
                        <h3 class="fromleft"><a href="#" title="">{{$product->name}}</a></h3>
                  </div>
                  <div class="row description">
                    <p class="fromleft">{{substr(strip_tags($product->description),0,300)}}{{strlen($product->description)>300 ? "...": ""}}</p>
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
                  <div class="row">
                    <div class="col-md-6">
                      <a href="#" class="btn btn-success btn-block">Kontakto</a>
                    </div>
                    <div class="col-md-6 pull-right">
                      <a href="{{route('need.single',$product->id)}}" class="btn btn-info btn-block">Shiko</a>
                    </div>
                  </div>
                </div>
                <span class="clearfix borda"></span>
              </article>
          @endforeach
    </section>
  @else
    <h3>Nuk egziston !</h3>
  @endif
@endif
@endsection
