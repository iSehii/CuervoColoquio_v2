<?php
// Obtener el nombre de usuario enviado por la solicitud AJAX
$username = $_POST['user'];

// Realizar la verificación en tu base de datos
// ... (aquí debes implementar tu código para verificar si el nombre de usuario existe)

// Obtener el nombre de usuario enviado por la solicitud AJAX
$username = $_POST['username'];

// Realizar la conexión a la base de datos (reemplaza los valores con los de tu configuración)
$conn = mysqli_connect (getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME')) or die ("Ocurrio un error al conectarse a la base de datos o servidor");

// Verificar si hay algún error en la conexión

// Preparar la sentencia SQL para buscar el nombre de usuario en la tabla correspondiente
$sql = "SELECT COUNT(*) AS count FROM Alumno WHERE usuario = '$username'";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados y obtener el número de filas encontradas
if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $count = $row['count'];

  // Verificar si el nombre de usuario ya existe en la base de datos
  if ($count > 0) {
    echo 'El nombre de usuario ya está en uso.';
  } else {
    echo "El nombre de usuario está disponible.";
  }
} else {
  echo 'Error al realizar la consulta en la base de datos.';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>