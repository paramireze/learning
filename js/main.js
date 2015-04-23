$(function() {

	var data = {
		name: 'paul',
		text: 'handle bars'
	};
	var template = Handlebars.compile( $('#template').html());
	var temp = template(data);
	console.log(temp);
	$(document.body).append(template(data));

	var $users = $('#orders');
	$.ajax({
		type:'GET',
		url: '/learning/rest/getAll',
		success: function(users) {
			$.each(users['data'], function(i, user) {
				$users.append('<li id=' + user.id + '>user: ' + user.name + ' ' + user.created + '</li>');				
				populateFormOnClick(user);				
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
					populateFormOnClick(user);
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
				$orders.prepend('<li id=' + user['data'].id + '>user: ' + user['data'].name + ' ' + user['data'].created + '</li>');
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
				$('#' + user['data'].id).replaceWith('<li id=' + user['data'].id + '>user: ' + user['data'].name + ' ' + user['data'].created + '</li>');
				confirmationMessage('update successful');
			}			
		});
	});	

	$('#clear').on('click', function(e) {
		$('#orders').children('li').remove();
	});	
});

function confirmationMessage(message) {
	$('#alertMessage').replaceWith('<div class="bg-success" id="alertMessage"> ' + message + ' </div>');
}

function populateFormOnClick(user) {
	$('#' + user.id).on('click', function(e) {
		console.log($('#' + user.id).attr('id'));
		$('#txtId').val(user.id);
		$('#txtName').val(user.name);
		$('#txtCreated').val(user.created);
		$('#txtText').val(user.text);	
	});
}