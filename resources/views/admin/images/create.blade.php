@extends('admin.index')
@section('admin-content')

	<div>
		<h1>Create News</h1>
		<br/>
		<form class="form-horizontal" role="form" method="POST" action="{{route('admin.news.store')}}">
			<div class="form-group row" >
				<label class="control-label col-sm-2" for="title">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title" placeholder="Title"  value="{{ old('title') }}" required>
					@if (isset($errors->toArray()['title']))
						<p class="error text-center alert alert-danger">{{$errors->toArray()['title'][0]}}</p>
					@endif
				</div>
			</div>
			<div class="form-group" >
				<label class="control-label col-sm-2" for="text">Text</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="text" name="text" placeholder="Text"  value="{{ old('text') }}" required></textarea>
					@if (isset($errors->toArray()['text']))
						<p class="error text-center alert alert-danger">{{$errors->toArray()['text'][0]}}</p>
					@endif
				</div>
			</div>
			<div class="form-group" >
				<label class="control-label col-sm-2" for="status">Status</label>
				<div class="col-sm-10">
					<select  class="form-control" id="status" name="status">
						<option value="0">Draft</option>
						<option value="1">Prodaction</option>
					</select>
					@if (isset($errors->toArray()['status']))
						<p class="error text-center alert alert-danger">{{$errors->toArray()['status'][0]}}</p>
					@endif
				</div>
			</div>
			<div class="form-group" >
				<label class="control-label col-sm-2" for="user_id">User</label>
				<div class="col-sm-10">
					<select  class="form-control" id="user_id" name="user_id">
						@foreach ($users as $user)
							<option value="{{$user->id}}">{{$user->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-warning" type="submit" id="add" >
					<span class="glyphicon glyphicon-plus"></span>Save
				</button>
				<a class="btn btn-warning" href="{{route('admin.news')}}">
					<span class="glyphicon glyphicon-remove"></span>Back
				</a>
			</div>
			@csrf
		</form>
	</div>	
@endsection