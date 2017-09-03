@extends('layouts.main')

@section('content')
	<div class="row">
	  <div class="col-md-10 col-md-offset-1">
	    <hgroup class="mb20">
	      <div class="row">
	        <div class="col-md-6">
	          <h1>Produktet e mija</h1>
	        </div>
					<div class="col-md-4">
					 @if (Auth::check())
						 <a href="#">Shiko kujt i nevojiten produktet tuaja</a>
					 @endif
				 </div>
	        <div class="col-md-2">
	          <a href="{{route('add.product')}}" class="btn btn-primary bnt-sm btn-block frombottom">Shto</a>
	        </div>
	      </div>
	    </hgroup>
	    <section class="col-xs-12 col-sm-6 col-md-12 section">
	        	@foreach ($myproducts as $myproduct)
	            <article class="search-result row">
	          			<div class="col-xs-12 col-sm-12 col-md-3">
	          				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="{{asset($myproduct->cover_image)}}" alt="Lorem ipsum" /></a>
	          			</div>
	          			<div class="col-xs-12 col-sm-12 col-md-3 borright">
	          				<ul class="meta-search">
	          					<li><i class="glyphicon glyphicon-calendar"></i> <span>{{$myproduct->created_at->format('M d Y')}}</span></li>
	          					<li><i class="glyphicon glyphicon-time"></i> <span><strong>Nga:</strong> {{$myproduct->user()->pluck('name')->first()}}</span></li>
	          					<li><i class="glyphicon glyphicon-tags"></i> <span><strong>Qmimi:</strong> {{$myproduct->price}}</span></li>
	                    <li><i class="glyphicon glyphicon-tags"></i> <span><strong>Kategoria:</strong> {{$myproduct->category()->pluck('name')->first()}}</span></li>
											<li><i class="glyphicon glyphicon-tags"></i> <span><strong>Qyteti:</strong> {{$myproduct->city()->pluck('name')->first()}}</span></li>
	          				</ul>
	          			</div>
									<div class="col-xs-12 col-sm-12 col-md-6 excerpet borright">
	                  <div class="row">
	          				      <h3 class="fromleft"><a href="#" title="">{{$myproduct->name}}</a></h3>
	                  </div>
	                  <div class="row description">
	                    <p class="fromleft">{{substr(strip_tags($myproduct->description),0,300)}}{{strlen($myproduct->description)>300 ? "...": ""}}</p>
	                  </div>
										<hr class="myhr"/>
	                  <div class="row smallbox">
	                    <div class="col-md-4 ">
	                      <h5> <strong>{{$myproduct->price}}</strong> EUR</h5>
	                    </div>
	                    <div class="col-md-4 ">
	                      <h5> <strong>{{$myproduct->category()->pluck('name')->first()}}</strong></h5>
	                    </div>
	                    <div class="col-md-4 ">
	                      <h5><strong>{{$myproduct->city()->pluck('name')->first()}}</strong></h5>
	                    </div>
	                  </div>
	                  <div class="row">
											<div class="col-md-3">
												<a href="{{route('buyer.for.need',$myproduct->id)}}" class="btn btn-success btn-block">Gjej Blers</a>
											</div>
	                    <div class="col-md-3">
												<a href="{{route('product.single',$myproduct->id)}}" class="btn btn-info btn-block">Shiko</a>
											</div>
											<div class="col-md-3">
											 <a href="{{route('edit.product',$myproduct->id)}}" class="btn btn-primary btn-block">Ndrysho</a>
										 </div>
											<div class="col-md-3">
												<form action="{{route('delete.product',$myproduct->id)}}" method="post">
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
@endsection
