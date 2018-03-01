@extends('home')
@section('content')

	this is movie
  		<div class="table-responsive text-center" id="movie">
  			<table class="table table-borderless" id="table">
  				<thead>
  				</thead>
  				@foreach($data as $item)
  				<tr class="item{{$item->id}}">
  					<td class='imgs col-md-1'><img src="/img/movies/{{$item->poster}}.jpg"</td>
  					<td>
						<h4 class="row"><b>{{$item->name}}</b></h4>
						<h5 class="row">{{$item->plot}}</h5>
						<span class="row"><b>Producer:</b></span>
						<span class="row"><b>Actors:</b></span>
					</td>
  					<td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
  							data-name="{{$item->name}}">
  							<span class="glyphicon glyphicon-edit"></span> Edit
  						</button>
  						<button class="delete-modal btn btn-danger"
  							data-id="{{$item->id}}" data-name="{{$item->name}}">
  							<span class="glyphicon glyphicon-trash"></span> Delete
  						</button></td>
  				</tr>
  				@endforeach
  			</table>
  		</div>

@stop

@section('script')
<script type="text/javascript" src="{{ URL::asset('js/movies/movies.js') }}"></script>
</script>
@endsection
