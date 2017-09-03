@extends('layouts.main')

@section('content')
  <div class="row">
        <div style="padding-top:50px;"> </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="{{asset($data->profilepic)}}" width="300px" height="300px">
                        </div>
                        <div class="media-body">
                            <hr>
                            <h3><strong>Bio</strong></h3>
                            <p>
                              @if($data->bio != '')
                                {{$data->bio}}
                              @else
                                No biography found.
                              @endif
                            </p>
                            <hr>
                            <h3><strong>Location</strong></h3>
                            <p>{{$data->city}}</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                        <div class="row">
                          <h1 class="panel-title pull-left" style="font-size:30px;">{{$data->name}} {{$data->lastname}}<small> {{$data->email}}</small></h1>
                        </div>
                        <hr />
                        <div class="row">
                          <div class="col-md-3 pull-left">
                            <h4 style="margin-left:5px;color:#1b95e0">{{$data->roles()->pluck('name')->first()}}</h4>
                          </div>
                          <div class="col-md-3 pull-right">
                            <a class="btn btn-success btn-block" href="{{route('user-profile-edit')}}">Ndrysho Profilin</a>
                          </div>
                        </div>
                    </span><hr>
                    <div class="row">
                      <div class="col-md-4 pull-left">
                          <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> {{count($needs) == 0 ? 'Ska Nevoja' : (count($needs) > 1 ? count($needs).' Nevoja' : count($needs).' Nevoje')}}</a>
                          <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> {{ count($products) == 0 ? 'Ska Produkte' : (count($products) >= 1 ? count($products).' Produkte' : count($products).' Produkt')}}</a>
                      </div>
                    </div>

                </div>
            </div>
            <!-- Simple post content example. -->
            <div class="panel panel-default">
              <section class="col-xs-12 col-sm-6 col-md-12 section">
                <h1>Nevojat</h1>
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
                          <span class="clearfix borda"></span>
                        </article>
                    @endforeach
              </section>
              <hr />
              <section class="col-xs-12 col-sm-6 col-md-12 section">
                <h1>Produktet</h1>
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
                          <span class="clearfix borda"></span>
                        </article>
                    @endforeach
              </section>
            </div>
            <!-- Reshare Example -->

        </div>
    </div>
@endsection
