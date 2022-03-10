<?php

function isValidLength($value, $minSize, $maxSize)
{
  return (strlen($value) >= $minSize && strlen($value) <= $maxSize);
}

if (strlen($nombre) == 0 || strlen($apellidos) == 0 || strlen($correo) == 0 || strlen($clave) == 0 || !isset($sexo) || !isset($interes)) {
  $error = true;
  die("Rellena los campos obligatorios<br />");
}

$lengthValidation = array(
  'nombre' => array(
    $nombre, 2, 50
  ),
  'apellidos' => array(
    $apellidos, 4, 100
  ),
  'correo' => array(
    $correo, 5, 320
  ),
  'clave' => array(
    $clave, 5, 20
  ),
  'sexo' => array(
    $sexo, 1, 1
  )
);

// Validacion de los tamaños
foreach ($lengthValidation as $fieldName => $field) {
  if (!isValidLength($field[0], $field[1], $field[2])) {
    $error = true;
    echo "Error con tamaño de $fieldName. Debe ser como mínimo $field[1] caracteres y $field[2] como máximo<br />";
  }
}

// Validacion de clave y clave_repe
if ($clave != $clave_repe) {
  $error = true;
  echo "Clave y repetir clave deben ser las mismas";
}

// Validacion de correo valido
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
  $error = true;
  echo "Correo debe ser válido";
}

if ($error) {
  die("Debe corregir los errores. <a href='javascript:history.back()'>Volver</a>");
}
