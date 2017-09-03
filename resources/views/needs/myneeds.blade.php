@extends('layouts.main')

@section('content')
	<div class="row">
	  <div class="col-md-10 col-md-offset-1">
	    <hgroup class="mb20">
	      <div class="row">
	        <div class="col-md-6">
	          <h1>Nevojat	 e mija</h1>
	        </div>
					<div class="col-md-4">
				 </div>
	        <div class="col-md-2">
	          <a href="{{route('add.need')}}" class="btn btn-primary bnt-sm btn-block frombottom">Shto</a>
	        </div>
	      </div>
	    </hgroup>
	    <section class="col-xs-12 col-sm-6 col-md-12 section">
	        	@foreach ($myneeds as $need)
	            <article class="search-result row">
	          			<div class="col-xs-12 col-sm-12 col-md-3">
	          				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{asset($need->cover_image)}}" alt="Lorem ipsum" /></a>
	          			</div>
	          			<div class="col-xs-12 col-sm-12 col-md-3 borright">
	          				<ul class="meta-search">
	          					<li><i class="glyphicon glyphicon-calendar"></i> <span>{{$need->created_at->format('M d Y')}}</span></li>
	          					<li><i class="glyphicon glyphicon-time"></i> <span><strong>Nga:</strong> {{$need->user()->pluck('name')->first()}}</span></li>
	          					<li><i class="glyphicon glyphicon-tags"></i> <span><strong>Qmimi:</strong> {{$need->priceFrom}} - {{$need->priceTo}}</span></li>
	                    <li><i class="glyphicon glyphicon-tags"></i> <span><strong>Kategoria:</strong> {{$need->category()->pluck('name')->first()}}</span></li>
											<li><i class="glyphicon glyphicon-tags"></i> <span><strong>Qyteti:</strong> {{$need->city()->pluck('name')->first()}}</span></li>
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
											<div class="col-md-4">
												<a href="{{route('buyer.for.need',$need->id)}}" class="btn btn-primary btn-block">Gjej Bleres</a>
											</div>
	                    <div class="col-md-4">
												<a href="{{route('myneed.single',$need->id)}}" class="btn btn-info btn-block">Shiko</a>
											</div>
											<div class="col-md-4">
												<form action="{{route('delete.need',$need->id)}}" method="post">
													{{csrf_field()}}
													<button class="btn btn-danger btn-block">Fshije</button>
												</form>
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
@endsection
