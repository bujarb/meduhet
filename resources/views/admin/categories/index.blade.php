@extends('layouts.adminmain')

@section('content')
	<div class="row" style="border-bottom:1px solid #e6e6e6;">
			<div class="col-md-6" style="border-right:1px solid #e6e6e6;">
				<h1>Te gjitha kategorite</h1>
			</div>
			<div class="col-md-6">
				<div class="row martopinput">
					<form action="{{route('category-store')}}" method="post">
						{{ csrf_field() }}
						<div class="col-sm-8">
							<input type="text" class="form-control" id="name" name="name" placeholder="Shto nje kategori ..."/>
						</div>
						<div class="col-sm-4">
							<input type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal" value="Shto"/>
						</div>
					</form>
				</div>
			</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6 col-md-offset-3">
				<table class="table table-striped">
		    <thead>
		      <tr>
		        <th>Emri</th>
		        <th>Edit</th>
		        <th>Delete</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($categories as $category)
						<tr>
			        <td>{{$category->name}}</td>
							<td><a href="{{route('category-edit',$category->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
              <td>
                <form action="{{route('category-delete',$category->id)}}" method="post">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
			      </tr>
					@endforeach
		    </tbody>
		  </table>
			{{$categories->links()}}
			</div>
		</div>
	</div>

@endsection
