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

    $stmt = $pdo->prepare("SELECT DISTINCT g.Clave AS nombre_grupo
                          FROM grupo g
                          WHERE g.Clave LIKE :searchText
                          LIMIT 10");
    $stmt->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devuelve las sugerencias en formato JSON
    echo json_encode($result);
}
?>