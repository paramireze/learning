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
<div>		

<div class="jumbotron">
  <div class="container">
    <h1>jquery ajax tutorial</h1>
    <p>Will be using this project as a base for learning new client side technologies. On bat is mustache/handlebars js. </p>
  </div>
</div>

<div  class="bg-success" id='alertMessage'></div> 
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
<button class="btn btn-default" id="get">get</button>
<button class="btn btn-default" id="clear">clear</button>
<button class="btn btn-default" id="update">update</button>
<button class="btn btn-default" id="insert">insert</button>
<h2>users</h2>
<ul id="orders">

<?php

$actors = getActors();
echo '</ul>';
echo '<pre>';
print_r($actor);
echo '</pre>';
?>
<div>
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/handlebars-v3.0.1.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
