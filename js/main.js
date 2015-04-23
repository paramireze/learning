$(function() {
	
	var $users = $('#orders');
	$.ajax({
		type:'GET',
		url: '/learning/rest/getAll',		
		success: function(users) {
			displayUsers(users);
		 	$("tr").on('click', function(e){ 		
			 	populateFormOnClickUsingAjax($(this));
			});
		}
	});

	function displayUsers(users) {
		var data = [];
		var template = Handlebars.compile($('#template').html());						
		$('.users').append(template(data));
		$.each(users['data'], function(i, user) {
			data.push({id: user.id, name: user.name, text: user.text, created: user.created});
		});
		var html = template(data);
		$('.users').append(html);		
	}
	
	function displayUser(user) {
		/*
		<tr id={{id}}>
			<td>{{id}}</td>
			<td>{{name}}</td>
			<td>{{text}}</td>
			<td>{{created}}</td>		
		</tr>
		 */
		return '<tr id=' 
				+ user['data'].id + '><td>' 
				+ user['data'].id + '</td><td>' 
				+ user['data'].name + '</td><td>' 
				+ user['data'].text + '</td><td>' 
				+ user['data'].created + '</td><td></tr>';
	}

	function doStuff(users) {
		var data = [];
		var template = Handlebars.compile( $('#template').html());						
		$('.users').append(template(data));
		$.each(users['data'], function(i, user) {
			data.push({id: user.id, name: user.name, text: user.text, created: user.created});
		});
		var html = template(data);
		$('.users').append(html);		
	}


	$('#get').on('click', function(e) {
		var $users = $('#orders');
		$.ajax({
			type:'GET',
			url: '/learning/rest/getAll',
			success: function(users) {
				$.each(users, function(i, user) {
					//$users.append(displayUser(user));
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
				alert('fix me');
				//$orders.prepend(displayUser(user));
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
				$('#' + user['data'].id).replaceWith(displayUser(user));
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


function populateFormOnClickUsingAjax(myObj) {
	$.ajax({
 		type:'GET',
 		url: '/learning/rest/get/' + myObj.attr("id"),
 		success: function(user) {
 			console.log(user);
 			populateForm(user['data']);
 		}
 	});
}

function populateFormOnClick(user) {

	$('#' + user.id).on('click', function(e) {
		console.log($('#' + user.id).attr('id'));
		populateForm(user);
	});
}

function populateForm(user) {
	$('#txtId').val(user.id);
	$('#txtName').val(user.name);
	$('#txtCreated').val(user.created);
	$('#txtText').val(user.text);	
}