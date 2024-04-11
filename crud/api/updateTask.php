<?php
include "./partials/Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $taskID = $_POST['taskID'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $userID = $_POST['userID'];


  if (!empty($taskID) && !empty($title) && !empty($description) && !empty($userID)) {
   
      $sql = "UPDATE tasks SET title='$title', description='$description', userID='$userID' WHERE id='$taskID'";

      if ($conexion->query($sql) === TRUE) {
        header('Location: ../index.html');
        exit();
      } else {
        echo "No se pudo actualizar la tarea: " . $conexion->error;
      }
  } else {
      echo "Los campos estan incompletos.";
  }
}