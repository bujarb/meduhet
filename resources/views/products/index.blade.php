@extends('layouts.main')

@section('content')
	<div class="row">
	  <div class="col-md-10 col-md-offset-1">
	    <hgroup class="mb20">
	      <div class="row">
	        <div class="col-md-8">
	          <h1>Te gjitha produktet</h1>
	        </div>
	        <div class="col-md-2">
	          @if (Auth::check())
							<a href="{{route('add.product')}}" class="btn btn-primary bnt-sm btn-block frombottom">Shto</a>
	          @endif
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
	          					<li><i class="glyphicon glyphicon-time"></i> <span><strong>Nga:</strong> {{$product->user()->pluck('firstname')->first()}}</span></li>
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
	  </div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			{{$products->links()}}
		</div>
	</div>
@endsection
