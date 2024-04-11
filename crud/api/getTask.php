<?php

$taskData = array();

if (isset($_GET['id'])) {

  $taskID = $_GET['id'];

  $sql = "SELECT * FROM tasks WHERE id = $taskID";

  $result = $conexion->query($sql);

  if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $taskData['id'] = $row['id'];
    $taskData['title'] = $row['title'];
    $taskData['description'] = $row['description'];
    $taskData['userID'] = $row['userID'];
    $jsonData = json_encode($taskData);
    echo $jsonData;
  } else {
    echo json_encode(array('error' => 'No se encontró ninguna tarea con el ID ingresado.'));
  }
} else {

  echo json_encode(array('error' => 'ID de tarea no ingresado.'));
}