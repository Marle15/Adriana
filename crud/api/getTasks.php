<?php 
include './partials/Connection.php';

try {
  
  $sql = "
    SELECT tasks.id, tasks.title, tasks.description, users.name AS user_name
    FROM tasks
    INNER JOIN users ON tasks.userID = users.id;
  ";

  $result = $conexion->query($sql);
  $json = [];

  if ( $result -> num_rows > 0 ) {

    while( $row = $result->fetch_assoc() ) {
      $json[] = [
        "id" => $row['id'],
        "title" => $row['title'],
        "description" => $row['description'],
        "user_name" => $row['user_name']
      ];
    }

  } else {
    echo "No se encontró la identificación de la tarea";
  }

  echo json_encode( $json );
} catch (PDOException $e) {
  die($e->getMessage());
}