$(document).ready(function() {
  $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('#footer_action_button').removeClass('glyphicon-plus');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete add');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#b').val($(this).data('bio'));
        $('#sex').val($(this).data('sex'));
        $('#d').val($(this).data('dob'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-plus');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').removeClass('edit add');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

	$(document).on('click', '#add', function() {
        $('#footer_action_button').text("Add");
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-plus');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('edit');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').addClass('add');
        $('.modal-title').text('Add');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#myModal').modal('show');
	});

    $('.modal-footer').on('click', '.edit', function() {
		var id = $('#fid').val();

        $.ajax({
            type: 'put',
            url: '/api/producer/'+id,
            data: {
                'id': id,
                'name': $('#n').val(),
				'sex' : $('#sex').val(),
				'bio' : $('#b').val(),
				'dob' : $('#d').val()
            },
            success: function(data) {
				var img;
				if(data.sex === 'male') {
					img = 'img.jpg';
				} else {
					img = 'imgf.jpg';
				}
				console.log(img);
                $('.item-' + data.id).replaceWith("<div class='col-md-3 item-" + data.id + "'><div class='card'><img src='/img/"+img+"' alt='img' style='width:100%'><h3>"+data.name+"</h3><p class='title'>"+data.bio+"</p><p>DOB: "+data.dob+"</p><p><button type='button' data-id='"+data.id+"' data-name='"+data.name+"' data-bio='"+data.bio+"' data-sex='"+data.sex+"' data-dob='"+data.dob+"' class='edit-modal btn btn-info'><span class='fa fa-edit'></span> EDIT</button><button type='button' data-id='"+data.id+"' data-name='"+data.name+"' class='delete-modal btn btn-danger'><span class='fa fa-trash'></span> DELETE</button></p>");
            }
        });
    });

    $('.modal-footer').on('click', '.delete', function() {
		var id = ($('.did').text());
		console.log('delete');
		$.ajax({
			type: 'delete',
			url: '/api/producer/' + id,
			success: function(data) {
				$('.item-' + $('.did').text()).remove();
			}
		});
	});

	$(".modal-footer").on('click', '.add', function() {

		$.ajax({
			type: 'post',
			url: '/api/producer',
			data: {
                'name': $('#n').val(),
				'sex' : $('#sex').val(),
				'bio' : $('#b').val(),
				'dob' : $('#d').val()
			},
			success: function(data) {
				if(data.sex === 'male') {
					img = 'img.jpg';
				} else {
					img = 'imgf.jpg';
				}
                $('#table').append("<div class='col-md-3 item-" + data.id + "'><div class='card'><img src='/img/"+img+"' alt='img' style='width:100%'><h3>"+data.name+"</h3><p class='title'>"+data.bio+"</p><p>DOB: "+data.dob+"</p><p><button type='button' data-id='"+data.id+"' data-name='"+data.name+"' data-bio='"+data.bio+"' data-sex='"+data.sex+"' data-dob='"+data.dob+"' class='edit-modal btn btn-info'><span class='fa fa-edit'></span> EDIT</button><button type='button' data-id='"+data.id+"' data-name='"+data.name+"' class='delete-modal btn btn-danger'><span class='fa fa-trash'></span> DELETE</button></p>");
			},

		});
	});

});

