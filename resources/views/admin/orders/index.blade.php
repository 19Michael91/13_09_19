@extends('admin.index')
@section('admin-content')

<h3>Click on nubmer to order</h3>

<style>
	.to_lock {
		background-color: #ff7f00;
	}
	.locked {
		background-color: #f00;
	}
</style>

<div style="max-width: 200px; margin: 0 auto; text-align: center;">

	@foreach ($orders as $key => $order)
		<div class="order_number @if($order->user_id != null) locked @endif" data-id="{{$order->id}}" style="border: 1px solid #000; width: 25px; display: inline-block; margin-bottom: 4px">{{$order->id}}</div>
		@if ($key % 5 == 4)
			<br>
		@endif
	@endforeach

</div>

<div style="text-align: center;">
	<button class="btn btn-success" type="button" id="save-order" >
		Save
	</button>
</div>


@endsection