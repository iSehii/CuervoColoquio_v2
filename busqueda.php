<?php
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$password = getenv('DB_PASS');
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

if (isset($_POST['searchText'])) {
    $searchText = $_POST['searchText'];

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE Nombre LIKE :searchText OR Apellido_paterno LIKE :apellidop OR Apellido_materno LIKE :apellidom");
    $stmt->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
    $stmt->bindValue(':apellidop', "%$searchText%", PDO::PARAM_STR);
    $stmt->bindValue(':apellidom', "%$searchText%", PDO::PARAM_STR);
    $stmt->execute();
    $users = $stmt->fetchAll(); // Fetch all rows into an array

    if (!empty($users)) {
        echo "<label><b>Usuarios</b></label><br>";
        foreach ($users as $row) {
            echo "<a href='/usuarios/" . $row['id_usuario'] . "/'>" . $row['Nombre'] . " " . $row['Apellido_paterno'] . " " . $row['Apellido_materno'] . "</a><br>";
        }
    }

    $stmt = $pdo->prepare("
        SELECT * FROM grupo
        WHERE Nombre LIKE :searchText OR Clave LIKE :Clave
    ");
    $stmt->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
    $stmt->bindValue(':Clave', "%$searchText%", PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetch() == "") {

    } else {
        echo "<label><b>Grupos</b></label><br>";
    while ($row = $stmt->fetch()) {
        echo "" . $row['Clave'] . "<br>";
    }
    }
    $stmt = $pdo->prepare("
        SELECT * FROM carrera
        WHERE Nombre LIKE :searchText
    ");
    $stmt->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
    $stmt->execute();

        if ($stmt->fetch() == "") {

    } else {
        echo "<label><b>Carrera:</b></label><br>";
    while ($row = $stmt->fetch()) {
        echo "" . $row['Nombre'] . " - " . $row['Clave'] . "<br>";
    }
    }
    $stmt = $pdo->prepare("
        SELECT * FROM publicaciones
        WHERE titulo LIKE :searchText
    ");
    $stmt->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetch() == "") {

    } else {
        echo "<label><b>Publicaciones</b></label><br>";
        
        while ($row = $stmt->fetch()) {
            echo "<a href='/publicaciones/publicacion?id=".$row['id_publicacion']."'>" . $row['titulo'] . "<br>";
        
        }
    }
}
?>