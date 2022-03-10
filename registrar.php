<?php

extract($_POST);

$error = false;

include('./validacion.php');

// Connection to database
$connect = mysqli_connect('localhost', 'root', 'root', 'repaso1') or
  die("Error: " . mysqli_connect_error());

// User query
$query_user = "INSERT INTO `usuarios` VALUES('$nombre', '$apellidos', '$correo', sha1('$clave'), '$sexo')";

// Insertion of user
$result_user = mysqli_query($connect, $query_user) or
  die("La inserción del usuario ha fallado. " . mysqli_error($connect));

// For every `tema` we create separate entity in the table `temas`
foreach ($interes as $tema) {
  // Tema query
  $query_temas = "INSERT INTO `temas` VALUES('$correo', '$tema')";

  // Insertion of tema
  $result_temas = mysqli_query($connect, $query_temas) or
    die("La inserción de las temas han fallados. " . mysqli_error($connect));
}

if (!$error) {
  echo "El usuario fue creado con éxito";
}
