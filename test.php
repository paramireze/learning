<!DOCTTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>jquery ajax tutorial</title>
	<?php 
	include 'common.php';
	include DIR_ROOT . 'functions/actor.php';
	?>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div></div>
<div>		
	<!--<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>-->
	<?php 
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
    <div class="jumbotron">
      <div class="container">
        <h1>jquery ajax tutorial</h1>
        <p>Will be using this project as a base for learning new client side technologies. On bat is mustache/handlebars js. </p>
      </div>
    </div>
	<h3 id='addUser'>add a user</h3>

<form class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label">id</label>
    <div class="col-sm-10">
      <input type="text" disabled="true" class="form-control" id="txtId">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">created</label>
    <div class="col-sm-10">
      <input type="text" disabled="true" class="form-control" id="txtCreated">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="txtName">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">text</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="txtText">
    </div>
  </div>  
</form>
	<button id="get">get</button>
	<button id="clear">clear</button>
	<button id="update">update</button>
	
	<button id="insert">insert</button>

	
	<h2>users</h2>
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
