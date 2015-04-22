<?php
  
  include 'C:/xampp/htdocs/learning/common.php';
  include DIR_ROOT . 'db/dbConnection.php'; 
  include DIR_ROOT . 'db/do_pdo_query.php';
   
  // include 'C:/xampp/htdocs/learning/db/dbConnection.php'; 
  // include 'C:/xampp/htdocs/learning/db/do_pdo_query.php';
 
  function getActors() {
    $dbConnection = pdo_connect_radweb();
    $get_actor_query['query']="SELECT *  FROM user order by created desc";
    $get_actor_query['params'] = array();
    $get_actor_stmt = do_pdo_query($dbConnection, $get_actor_query['query'], $get_actor_query['params']);
    return $get_actor_stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function getActor($id = null) {
    if (empty($id)) {
      $id = lastId();
    }

    if (empty($id)) {
      return null; 
    } else {
      $dbConnection = pdo_connect_radweb();
      $get_actor_query['params'] = array();
      $get_actor_query['query']="SELECT *  FROM user where id = :id";        
      $get_actor_query['params'][':id'] = $id;
      $get_actor_stmt = do_pdo_query($dbConnection, $get_actor_query['query'], $get_actor_query['params']);
      return $get_actor_stmt->fetch(PDO::FETCH_ASSOC);
    }
  }


  function addActor($name, $text) {
    $dbConnection = pdo_connect_radweb();
    $get_actor_query['query']="insert into user values (DEFAULT, :name, now(), :text )";
    $get_actor_query['params'] = array();
    $get_actor_query['params'][':name'] = $name;
    $get_actor_query['params'][':text'] = $text;
    $get_actor_stmt = do_pdo_query($dbConnection, $get_actor_query['query'], $get_actor_query['params']);


    $id = $dbConnection->lastInsertId();
    return getActor($id);   
  }

  function updateActor($id, $name, $text) {
    
    $dbConnection = pdo_connect_radweb();
    $get_actor_query['query']="update user 
        set 
          name = :name,
          text = :text
        where
          id = :id
          ";
    $get_actor_query['params'] = array();
    $get_actor_query['params'][':name'] = $name;
    $get_actor_query['params'][':text'] = $text;
    $get_actor_query['params'][':id'] = $id;
    $get_actor_stmt = do_pdo_query($dbConnection, $get_actor_query['query'], $get_actor_query['params']);

    return getActor($id);
  }


  function lastId() {
    $dbConnection = pdo_connect_radweb();
    $get_actor_query['query']="SELECT id FROM user ORDER BY id DESC LIMIT 0, 1";
    $get_actor_query['params'] = array();
    $get_actor_stmt = do_pdo_query($dbConnection, $get_actor_query['query'], $get_actor_query['params']);
    $get_actor_row = $get_actor_stmt->fetch();
    return $get_actor_row['id'];  
  }

  ?>
