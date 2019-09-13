@extends('admin.index')
@section('admin-content')

	<div>
		<h1>Create User</h1>
		<br/>
		<form class="form-horizontal"  enctype="multipart/form-data" role="form" method="POST" action="{{route('admin.users.store')}}">
			<div class="form-group row" >
				<label class="control-label col-sm-2" for="name">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="Name"  value="{{ old('name') }}" required>
					@if (isset($errors->toArray()['name']))
						<p class="error text-center alert alert-danger">{{$errors->toArray()['name'][0]}}</p>
					@endif
				</div>
			</div>
			<div class="form-group" >
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="{{ old('email') }}" required>
					@if (isset($errors->toArray()['email']))
						<p class="error text-center alert alert-danger">{{$errors->toArray()['email'][0]}}</p>
					@endif
				</div>
			</div>
			<div class="form-group row">
                <label for="password" class="control-label col-sm-2">Password</label>
                <div class="col-sm-10">
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                    @if (isset($errors->toArray()['password']))
		                @foreach ($errors->toArray()['password'] as $error)
							<p class="error text-center alert alert-danger">{{$error}}</p>
		                @endforeach
					@endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password-confirm" class="control-label col-sm-2">Confirm Password</label>
                <div class="col-sm-10">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                </div>
            </div>
			<div class="form-group" >
				<label class="control-label col-sm-2" for="status">Status</label>
				<div class="col-sm-10">
					<select  class="form-control" id="status" name="status">
						<option value="0">Not Active</option>
						<option value="1">Active</option>
					</select>
					@if (isset($errors->toArray()['status']))
						<p class="error text-center alert alert-danger">{{$errors->toArray()['status'][0]}}</p>
					@endif
				</div>
			</div>
			<div class="form-group" >
				<label class="control-label col-sm-2" for="image">Image</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" id="image" name="image">
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-warning" type="submit" id="add" >
					<span class="glyphicon glyphicon-plus"></span>Save
				</button>
				<a class="btn btn-warning" href="{{route('admin.users')}}">
					<span class="glyphicon glyphicon-remove"></span>Back
				</a>
			</div>
			@csrf
		</form>
	</div>
@endsection