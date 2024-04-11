<?php
include "./partials/Connection.php";

try {
  $sql = "SELECT * FROM users;";

  $result = $conexion->query($sql);
  $json = [];

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $json[] = [ "id" => $row['id'], "name" => "{$row['name']}" ];
    }

  } else {
    echo "No se encontro el usuario";
  }

  echo json_encode($json);
} catch (PDOException $e) {
  die($e->getMessage());
}