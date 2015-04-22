$(function() {

	// var $users = $('#orders');
	// $.ajax({
	// 	type:'GET',
	// 	url: '/learning/rest/get/47',
	// 	success: function(user) {
	// 		$users.append('<li id=' + user['data'].id + '>user: ' + user['data'].name + ' ' + user['data'].created + '</li>');
	// 		if (user) {
	// 			$('#txtId').val(user['data'].id);
	// 			$('#txtName').val(user['data'].name);
	// 			$('#txtCreated').val(user['data'].created);
	// 			$('#txtText').val(user['data'].text);				
	// 		}
	// 	}	
	// });
	// 
	var $users = $('#orders');
		$.ajax({
			type:'GET',
			url: '/learning/rest/getAll',
			success: function(users) {
				$.each(users['data'], function(i, user) {
					$users.append('<li id=' + user.id + '>user: ' + user.name + ' ' + user.created + '</li>');

					$('#' + user.id).on('click', function(e) {
						console.log($('#' + user.id).attr('id'));
			 			$('#txtId').val(user.id);
			 			$('#txtName').val(user.name);
			 			$('#txtCreated').val(user.created);
			 			$('#txtText').val(user.text);				
					});
				});
			}
		});

	$('#get').on('click', function(e) {
		var $users = $('#orders');
		$.ajax({
			type:'GET',
			url: '/learning/rest/getAll',
			success: function(users) {
				$.each(users['data'], function(i, user) {
					$users.append('<li id=' + user.id + '>user: ' + user.name + ' ' + user.created + '</li>');
				});
			}
		});
	});
	
	
	$('#insert').on('click', function(e) {
		var $orders = $('#orders');
		$.ajax({
			type:'POST',
			data: { name: $('#txtName').val(), text: $('#txtText').val(), action: 'insert'},
			url: '/learning/rest/',
			success: function(user) {
				$orders.prepend('<li id=' + user.id + '>user: ' + user.name + ' ' + user.created + '</li>');
			}

		});
	});	

	$('#update').on('click', function(e) {
		var $orders = $('#orders');
		$.ajax({
			type:'POST',
			data: { id: $('#txtId').val(), name: $('#txtName').val(), text: $('#txtText').val(), action: 'updateActor'},
			url: '/learning/rest/',
			success: function(user) {
				//$('#orders').prepend('<li>asdf</li>');
				//console.log('hi');
				$('#' + user['data'].id).replaceWith('<li id=' + user['data'].id + '>user: ' + user['data'].name + ' ' + user['data'].created + '</li>');
			}			
		});
	});	


	$('#clear').on('click', function(e) {
		$('#orders').children('li').remove();
	});	
});