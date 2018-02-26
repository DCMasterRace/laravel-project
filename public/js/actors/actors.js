$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).on('click', '.delete-modal', function() {
		// $('#footer_action_button').text(" Delete");
		// $('#footer_action_button').removeClass('glyphicon-check');
		// $('#footer_action_button').addClass('glyphicon-trash');
		// $('.actionBtn').removeClass('btn-success');
		// $('.actionBtn').addClass('btn-danger');
		// $('.actionBtn').addClass('delete');
		// $('.modal-title').text('Delete');
		// $('.did').text($(this).data('id'));
		// $('.deleteContent').show();
		// $('.form-horizontal').hide();
		// $('.dname').html($(this).data('name'));
		// $('#myModal').modal('show');
	});

	$('.delete-modal').on('click', function() {
		var id = ($(this).attr('data-id'));
		console.log(id);
		$.ajax({
			type: 'delete',
			url: '/api/actors',
			data : {
				'id': id
			},
			success: function(data) {
				$('.item' + $('.did').text()).remove();
			}
		});
	});

	$("#add").click(function() {

		$.ajax({
			type: 'post',
			url: '/api/actors',
			data: {
				'name': $('input[name=name]').val(),
				'sex': 'male',
				'bio': 'just a testing',
				'dob': '2017-06-06'
			},
			success: function(data) {
				console.log(data);
			},

		});
		$('#name').val('');
	});

});
