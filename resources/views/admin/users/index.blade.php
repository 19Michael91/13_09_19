@extends('admin.index')
@section('admin-content')
	<div>
		<h1>Users :</h1>
		<div>
			<div class="table table-responsive">
				<table class="table table-bordered" id="table">
					<tr>
						<th class="col-sm-2">Name</th>
						<th class="col-sm-2">Email</th>
						<th class="col-sm-2">Status</th>
						<th class="col-sm-2">Image</th>
						<th class="col-sm-2">News</th>
						<th class="text-center col-sm-2">
							<a href="{{route('admin.users.create')}}" class="create-modal btn btn-success btn-sm">
								Add <i class="glyphicon glyphicon-plus"></i>
							</a>
						</th>
					</tr>

					@foreach ($users as $user)
						<tr id="user-{{$user->id}}">	
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if (App\User::STATUS_NOT_ACTIVE == $user->status)
									Not Active
								@elseif (App\User::STATUS_ACTIVE == $user->status)
									Active
								@endif		
							</td>
							@if($user->image != null)
								<td style="width:100px"><img id="image-{{$user->id}}" src="{{url('/images/' . $user->id . '.jpg')}}" style="width:100px; height: 100px"></td>
							@else
								<td style="width:100px"><img id="image-{{$user->id}}" src="{{url('/images/default_image.jpg')}}" style="width:100px; height: 100px"></td>
							@endif
							<td>
								@if ($user->news != null)
									@foreach ($user->news as $news)
										<p>{{ $news->title }}</p>
									@endforeach
								@endif
							</td>
							<td class="text-center">
								<a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-warning btn-sm" >
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								<button class="btn btn-danger btn-sm delete_admin_user" data-id="{{$user->id}}">
									<i class="glyphicon glyphicon-trash"></i>
								</button>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection