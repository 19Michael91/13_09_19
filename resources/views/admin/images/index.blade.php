
@extends('admin.index')
@section('admin-content')
	<div>
		<h1>Images</h1>
		@if (isset($errors->toArray()['image']))
			<p class="error text-center alert alert-danger">{{$errors->toArray()['image'][0]}}</p>
		@endif
		<div>
			<div class="table table-responsive">
				<table class="table table-bordered" id="table">
					<tr>
						<th class="col-sm-5">Name</th>
						<th class="col-sm-5">Name</th>
						<th class="text-center col-sm-2">
							<a href="#" class="create-modal btn btn-success btn-sm">
								Add <i class="glyphicon glyphicon-plus"></i>
							</a>
						</th>
					</tr>
					@foreach ($images as $image)
						<tr id="image-{{$image->id}}">	
							<td>{{ $image->name }}</td>
							<td style="width:100px">
								<img src="{{url('/images/' . $image->name)}}" style="width:100px; height: 100px">
							</td>
							<td class="text-center">
								<button class="btn btn-danger btn-sm delete_admin_images" data-id="{{$image->id}}">
									<i class="glyphicon glyphicon-trash"></i>
								</button>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>



{{-- Form Create Image --}}
<div id="create" class="modal fade" role="dialog">
	<div class="modal-dialog" style="left: auto;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-titel"></h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" role="form" enctype="multipart/form-data" id="form-create" action="{{ route('admin.images.store') }}">
					@csrf
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
						<button class="btn btn-warning" type="button" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"></span>Close
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>


@endsection