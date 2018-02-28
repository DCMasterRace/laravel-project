@extends('home')
@section('content')

	<div class="col-md-12">
		<button class="btn btn-primary" type="submit" id="add">
			<span class="glyphicon glyphicon-plus"></span> ADD
		</button>
	</div>
	<div id='actor' class="row table-responsive text-center col-md-12">
		<div class="container">
			<div class="row col-md-12" id="table">
				@foreach($data as $item)
					<div class="col-md-3 item-{{$item->id}}">
						<div class="card">
							@if($item->sex === "male")
								<img src="/img/img.jpg" alt="img" style="width:100%">
							@else
								<img src="/img/imgf.jpg" alt="img" style="width:100%">
							@endif
							<h3>{{$item->name}}</h3>
							<p class="title">{{$item->bio}}</p>
							<p>DOB: {{$item->dob}}</p>
							<p><button type="button" data-id="{{$item->id}}" data-name="{{$item->name}}" data-bio="{{$item->bio}}" data-sex="{{$item->sex}}" data-dob="{{$item->dob}}" class="edit-modal btn btn-info"><span class="fa fa-edit"></span> EDIT</button><button type="button" data-id="{{$item->id}}" data-name="{{$item->name}}" class="delete-modal btn btn-danger"><span class="fa fa-trash"></span> DELETE</button></p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<div class="col-sm-10">
								<input type="name" class="form-control" id="fid" hidden>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Name:</label>
							<div class="col-sm-10">
								<input type="name" class="form-control" id="n">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Bio:</label>
							<div class="col-sm-10">
								<textarea class="form-control" id="b"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">Sex:</label>
							<div class="col-sm-10">
								<select type="sex" class="form-control col-md-10" style="height: 34px !important" id="sex">
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
							{{-- <label for="sel1 col-md-2">Sex</label> --}}
							{{-- <select type="sex" class="form-control col-md-10" id="sex"> --}}
								{{-- 	<option value="male">Male</option> --}}
								{{-- 	<option value="female">Female</option> --}}
								{{-- </select> --}}
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="name">DOB:</label>
							<div class="col-sm-10">
								<input type="name" class="form-control" id="d">
							</div>
						</div>
					</form>
					<div class="deleteContent">
						Are you Sure you want to delete <span class="dname"></span> ? <span
											class="hidden did"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class='glyphicon'> </span>
						</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class='glyphicon glyphicon-remove'></span> Close
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop

@section('script')
	<script type="text/javascript" src="{{ URL::asset('js/producers/producers.js') }}"></script>
@endsection
