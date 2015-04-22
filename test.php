<!DOCTTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<div></div>
<div>		
	<!--<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>--><div>
	<?php 

	include 'functions/actor.php';
	$id = lastId();
	echo 'hi: ' . $id . '<br />';
	$actor = getActors();

	function getStuff($property, $object) {
		if (isset($object[$property])) {
			return $object[$property];
		} else {
			return "";
		}
	}
	//$inserted_stmt = addActor();
	// $actor = getActor(48);

	//$actor = addActor('live', 'test');
	// $rowCount = updateActor($actor['id'], 'new name', 'update success');

	// $actor = getActor($id);

	//echo 'row count: ' . $rowCount;
	// echo '<pre>';
	// print_r($actor);
	// echo '</pre>';

	//echo 'last inserted id: ' . $inserted_stmt['name'] . ' ' .  $inserted_stmt['created']  .'<br />';
	?>
	<h1>jquery ajax tutorial</h1>
	<h3>add a user</h3>
	<p>id: <input disabled type="text" id="txtId"></input></p>
	<p>created: <input disabled type="text" id="txtCreated"></input></p>
	<p>name: <input type="text" id="txtName"></input></p>
	<p>text: <input type="text" id="txtText"></input></p>
	<button id="get">get</button>
	<button id="clear">clear</button>
	<button id="update">update</button>
	
	<button id="insert">insert</button>

	
	<h2>coffee orders</h2>
	<ul id="orders">

	<?php
	

	$actors = getActors();

// foreach ($actors as $actor) {
// 	echo '<li class="listOrder' . $actor['id'] . ' " id="' . $actor['id'] . '">'. $actor['name'] . '</li>';
// }
	 // echo '<pre>';
	 // print_r($actors);
	 // echo '</pre>';

echo '</ul>';
echo '<pre>';
print_r($actor);
echo '</pre>';
?>
<div>

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/handlebars-v3.0.1.js"></script>
	<script src="js/main.js"></script>


<script>
	$(function() {
		$('#panel1').hide(300).show(1000);
	});
</script>
</body>
</html>
