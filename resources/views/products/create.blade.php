@extends('layouts.main')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="text-center">Shto nje produkt</h1>
			<form action="{{route('store.product')}}" method="post" enctype="multipart/form-data" multiple="true">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="name">Emri</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="name">Pershkrimi</label>
					<textarea id="description" name="description" class="form-control" rows="5" placeholder="Pershkruaj produktin tuaj..."></textarea>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="image">Fotografi</label>
						<input type="file" name="file" id="file"/>
					</div>
					<div class="col-md-6">
						<label for="phone">Numri i Telefonit</label>
						<input type="text" name="phone" id="phone" class="form-control"/>
					</div>
				</div>
				<div class="col-md-12" style="padding: 0; margin: 0">
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Qmimi</label>
							<input type="text" name="price" id="price" class="form-control text-center">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="category">Kategoria</label>
							<select class="form-control" id="category" name="category">
								@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="city">Qyteti</label>
							<select class="form-control" id="city" name="city">
								@foreach($cities as $city)
									<option value="{{$city->id}}">{{$city->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-success btn-block btn-lg">Shto</button>
			</form>
		</div>
	</div>
@endsection
