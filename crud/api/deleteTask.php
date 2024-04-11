<?php
include "./partials/Connection.php";

if ( isset($_GET['id']) ) {

  $taskID = $_GET['id'];

  $sql = "DELETE FROM tasks WHERE id = $taskID";

  if ( $conexion->query($sql) === TRUE ) {
    header("Location: ../index.html");
    exit();
  } else {
    echo "Error al eliminar la tarea". $conexion->error;
  }

} else {
  echo "No se identifico la tarea";
}