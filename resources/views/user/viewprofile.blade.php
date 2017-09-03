@extends('layouts.main')

@section('content')
  <div class="row">
        <div style="padding-top:50px;"> </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="300px" height="300px">
                        </div>
                        <div class="media-body">
                            <hr>
                            <h3><strong>Bio</strong></h3>
                            <p>
                              @if($user->bio != '')
                                {{$user->bio}}
                              @else
                                No biography found.
                              @endif
                            </p>
                            <hr>
                            <h3><strong>Location</strong></h3>
                            <p>{{$user->city}}</p>
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
                        <h1 class="panel-title pull-left" style="font-size:30px;">{{$user->name}} {{$user->lastname}}<small> {{$user->email}}</small></h1>
                        <div class="dropdown pull-right">
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Familly</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Friends</a></li>
                                <li><a href="#">Work</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Add a new aspect</a></li>
                            </ul>
                        </div>
                    </span>
                    <br><br>
                    <br><br><hr>
                    <span class="pull-left">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> {{count($needs) == 0 ? 'Ska Nevoja' : (count($needs) > 1 ? count($needs).' Nevoja' : count($needs).' Nevoje')}}</a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> {{ count($products) == 0 ? 'Ska Produkte' : (count($products) >= 1 ? count($products).' Produkte' : count($products).' Produkt')}}</a>
                    </span>
                    <span class="pull-right">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-at" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Mention"></i></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-envelope-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Message"></i></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-ban" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Ignore"></i></a>
                    </span>
                </div>
            </div>
            <!-- Simple post content example. -->
            <div class="panel panel-default">
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
                          <span class="clearfix borda"></span>
                        </article>
                        <hr />
                    @endforeach
              </section>

            </div>
            <!-- Reshare Example -->

        </div>
    </div>
@endsection
