<?php 
	include '../common.php';
	include DIR_ROOT . 'functions/actor.php';

	if (!empty($_GET['action'])) {
		$action = $_GET['action'];
	} elseif (!empty($_POST['action'])) {
		$action = $_POST['action'];
	}

	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
	} elseif (!empty($_POST['id'])) {
		$id = $_POST['id'];
	} else {
		$id = lastId();
	}


	if (!empty($action)) {
		switch($action) {
			case 'getAll':			
				header("Content-Type:application/json");					
				$actors = getActors();
				if (empty($actors)) {
					deliver_response(200, "actors not here", null);
				} else {
					deliver_response(200, "actors found", $actors);
				}
				break;
			case 'get':			
				header("Content-Type:application/json");					
				$actor = getActor($id);
				if (empty($actor)) {
					deliver_response(200, "actors not here", null);
				} else {
					deliver_response(200, "actors found", $actor);
				}
				break;
			case 'insert':
				header("Content-Type:application/json");					
				if (!empty($_POST['name'])) {
					$name = $_POST['name'];
				} 

				if (!empty($_POST['text'])) {
					$text = $_POST['text'];
				} 

				$actors = addActor($name, $text);
				if (empty($actors)) {
					deliver_response(200, "actors not here", null);
				} else {
					deliver_response(200, "actor found", $actors);
				}
				break;

			// case 'clear':
			// 	header("Content-Type:application/json");									
			// 	if (empty($actors)) {
			// 		deliver_response(200, "actors not here", null);
			// 	} else {
			// 		deliver_response(200, "actors found", $actors);
			// 	}
			// 	break;
			case 'updateActor':
				header("Content-Type:application/json");

				if (!empty($_POST['name'])) {
					$name = $_POST['name'];
				} 

				if (!empty($_POST['text'])) {
					$text = $_POST['text'];
				} 

				$actor = updateActor($id, $name, $text);				
				if (empty($actor)) {
					deliver_response(200, "actors not here", 'hi');
				} else {
					deliver_response(200, "actors found", $actor);
				}
				break;

		}

	}



	function deliver_response($status, $status_message, $data) {
		header("HTTP/1.1 $status $status_message");
		$response['status'] = $status;
		$response['status_message'] = $status_message;
		$response['data'] = $data;

		$json_response=json_encode($response);
		echo $json_response;
	}
?>