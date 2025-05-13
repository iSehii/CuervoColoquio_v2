<?php
session_start();
ini_set('log_errors', 1); // Habilita el registro de errores
ini_set('error_log', 'archivo-de-registro.log');
if (isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true) {
    include_once '../../includes/user/usuario.php';
    $Usuario = new Usuario();
    $id_usuario = $_SESSION['id_usuario'];
    $Usuario->setUser($id_usuario);

    // El usuario ha iniciado sesión, realizar acciones específicas aquí
} else {
    header('Location: /');
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-S1KL8WE21Y"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-S1KL8WE21Y');
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      <?php echo include 'style/StyleA.css' ?>

  </style>
  <script src="/js/categorias.js"></script>
  <script src="/js/global.js"></script>
  <link rel="shortcut icon" href="../../files/behuse-logos/favicon.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XW9F8F1MVS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XW9F8F1MVS');
</script>
  <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@100&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Hebrew:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de control</title>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1161956724578947"
    crossorigin="anonymous"></script>
  <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

  <div class="encabezado">
    <div class="barra">
      <div id="menu" class="menu" style="cursor: pointer; z-index: 999; <?php if ($_GET['tabla_index'] == 8) {
          echo "visibility: visible";
      } ?>" onclick="Menu()">
        <span class="material-symbols-outlined">
          menu
        </span>
      </div>
      <div class="inicio" id="inicio" onclick="inicio()">
        <img class="logoDesktop" src="/files/behuse-logos/behuse-logotipo.png">
        <img class="logo" src="/files/behuse-logos/behuse-logo.png">
      </div>
      <div class="auth-links">
        <div class="login" style="visibility: hidden">
          <a href="/pgs/auth/login/">Iniciar sesión</a>
        </div>

        <div class="" id="menuUser" style="cursor: pointer; z-index: 999" onclick="UserMenu();">

          <div class="circle">
            <?php echo '<img src="/files/Users/images/' . $Usuario->getFoto() . '" width="48px" height="48px" style="border-radius: 48px">' ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</head>

<body>
  <div class="contenedor">
    <!-----AQUI COMIENZA LO DEL USUARIO---->
    <div class="derecha" id="derecha" style="color: white; padding-left: 7px; padding-right: 10px">
      <div class="izqCat">
        <span class="textoIzq" style="visibility: hidden;">Publicaciones</span>
      </div>
      <div class="izqCat catDerecha" style="color: white; background-color: rgb(0, 176, 203);">
        <span class="textoIzq"><b style="font-size: 15px">Datos:</b><br></span>
      </div>
      <div class="izqCat">
        <span class="textoIzq"><b style="font-size: 15px">Nombre:</b> <br>
          <?php echo $Usuario->getNombre(); ?>
        </span>
      </div>
      <div class="izqCat">
        <span class="textoIzq"><b style="font-size: 15px">Matrícula:</b> <br>
          <?php echo $Usuario->getMatricula(); ?>
        </span>
      </div>
      <div class="izqCat">
        <span class="textoIzq" style="font-size: 14px"><b style="font-size: 15px">Correo:</b> <br>
          <?php echo $Usuario->getCorreo(); ?>
        </span>
      </div>



      <div class="izqCat catDerecha" style="color: white; background-color: rgb(0, 176, 203); ">
        <span class="textoIzq"><b style="font-size: 15px">
            <?php if ($Usuario->getIdRol() == "1") {
                echo "Administrador";
            } else {
                echo "Alumno";
            } ?>
          </b><br></span>
      </div>
      <div class="izqCat botonCerrar" style="color: white; cursor: pointer;">
        <span class="textoIzq" <?php if ($Usuario->getIdRol() == "1") {
            echo 'onclick="materiasAdmin();"';
        } else {
            echo 'onclick="grupo();"';
        } ?>><?php if ($Usuario->getIdRol() == "1") {
             echo "Materias";
         } else {
             echo "Mi grupo ";
         } ?></span>
      </div>
      <a href="/usuarios/<?php echo $id_usuario ?>/">
        <div class="izqCat botonCerrar" style="color: black; cursor: pointer;">
          <span class="textoIzq" onclick="miProfile()">Mi perfil</span>
        </div>
        <?php
        echo '
      <script>
      function miProfile() {
        window.location.href = "/usuarios/' . $_SESSION['id_usuario'] . '";
      }
    </script>
      ';
        ?>
      </a>
      <div class="izqCat botonCerrar" onclick="cerrarSesion();"
        style="color: black; border-left: 4px solid aquamarine; position: absolute; bottom: 76px;">
        <script>
          function cerrarSesion() {
            // Envía una solicitud AJAX al archivo actual
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                // Recarga la página actual después de cerrar sesión
                window.location.reload();
              }
            };
            xhttp.open("GET", "cerrar_sesion.php", true);
            xhttp.send();
          }
        </script>
        <span class="textoIzq" style="font-size: 17px; font-weight: bold; color: black">Cerrar
          sesión</span>
      </div>
    </div>
    <!-----AQUI TERMINA LO DEL USUARIO---->
    <script>
      var derechaVisible = false;

      function ocultarDerecha() {
        var derecha = document.getElementById('derecha');
        derechaVisible = false;
        derecha.classList.add('derechaInvisible');
        derecha.classList.remove('derechaVisible');
      }

      var derecha = document.getElementById('derecha');

      function mostrarDerecha() {
        derecha.classList.add('derechaVisible');
        derecha.classList.remove('derechaInvisible');
        derechaVisible = true;
      }

      mostrarDerecha();

      function UserMenu() {
        if (!derechaVisible) {
          mostrarDerecha();
          setTimeout(function () {
            derechaVisible = true;
          }, 300);
        } else {
          ocultarDerecha();
        }
      }

      function handleClickOutside(event) {
        var menuUserElement = document.getElementById('menuUser');
        var derecha = document.getElementById('derecha');

        if (!menuUserElement.contains(event.target) && !derecha.contains(event.target)) {
          mostrarDerecha();
          derechaVisible = true;
        }
      }

      document.addEventListener('click', handleClickOutside);

    </script>
    <div class="izquierda" style="padding-top: 2%;<?php if ($_GET['tabla_index'] == 8) { echo "display: none";} ?>" id="izquierda">
      <div class="contenidoIzq">
        <div class="iconsIzq">
        </div>
        <div style="display: inline">
        <?php
        $dashboard = new Dashboard();
        $dashboard->getTables();

        $tabla_index = isset($_GET['tabla_index']) ? $_GET['tabla_index'] : null;

        for ($i = 0; $i < $dashboard->getTotal(); $i++) {
            if ($_GET['tabla_index'] == $i) {
                $hola = "selected";
            }
            echo "
            <a href='?tabla_index=$i' style='text-decoration: none; color: black'>
          <div class='izqCat $hola' style='text-decoration: none'>
            <span class='textoIzq' style='text-decoration: none'> ".$dashboard->getNombre($i)."</span>
          </div>
          </a>";
          $hola = "";
        }
        ?>
        </div>
        <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-1161956724578947"
          data-ad-slot="2547810437" data-auto-format="rspv" data-full-width="100%">
          <div overflow="auto"></div>
        </amp-ad>
      </div>
    </div>
    <div class="Contenido" style="<?php if ($_GET['tabla_index'] == 8) {
        echo "margin-left: 0px";
    } ?>">
      <div class="centro" style="">
<style>
    .editing input[type="text"] {
        width: 100%;
    }

    .editing a {
        display: none;
    }

    .btn-save,
    .btn-cancel {
        display: none;
    }

    .editing .btn-save,
    .editing .btn-cancel {
        display: inline-block;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.editing');

        rows.forEach(row => {
            const editLink = row.querySelector('a');
            const btnSave = row.querySelector('.btn-save');
            const btnCancel = row.querySelector('.btn-cancel');
            const inputs = row.querySelectorAll('input[type="text"]');

            editLink.addEventListener('click', function (event) {
                event.preventDefault();
                row.classList.add('editing');
                inputs.forEach(input => {
                    input.style.display = 'block';
                });
                editLink.style.display = 'none';
                btnSave.style.display = 'inline-block';
                btnCancel.style.display = 'inline-block';
            });

            btnCancel.addEventListener('click', function () {
                row.classList.remove('editing');
                inputs.forEach(input => {
                    input.style.display = 'none';
                });
                editLink.style.display = 'inline-block';
                btnSave.style.display = 'none';
                btnCancel.style.display = 'none';
            });

            btnSave.addEventListener('click', function () {
                const idValue = btnSave.getAttribute('data-id');
                const form = row.querySelector('form');
                form.action = `?tabla_index=$tabla_index&action=edit&id_value=${idValue}`;
                form.submit();
            });
        });
    });
</script>

<?php


// Database connection settings (adjust details according to your configuration)
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

function getColumnNames($table)
{
    global $pdo;
    $stmt = $pdo->query("DESCRIBE $table");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function getAllData($table)
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM $table");
    return $stmt->fetchAll();
}

function insertData($table, $data)
{
    global $pdo;
    $columns = implode(', ', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));
    $stmt = $pdo->prepare("INSERT INTO $table ($columns) VALUES ($values)");
    $stmt->execute($data);
}

function updateData($table, $data, $idValue, $nombreID)
{
    global $pdo;
    $set_values = [];
    foreach ($data as $column => $value) {
        $set_values[] = "$column = :$column";
    }
    $set_values = implode(', ', $set_values);
    $stmt = $pdo->prepare("UPDATE $table SET $set_values WHERE $idValue = :idValue");
    $stmt->bindParam(':idValue', $idValue, PDO::PARAM_INT);
    $stmt->execute($data);
}

function deleteData($table, $idColumn, $idValue)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM $table WHERE $idColumn = :idValue");
    $stmt->bindParam(':idValue', $idValue, PDO::PARAM_INT);
    $stmt->execute();
}

// Show the list of tables


if ($tabla_index !== null) {
    $nombre_tabla = $dashboard->getNombre($tabla_index);

    if ($nombre_tabla !== null) {
        // Get column names and data
        $column_names = getColumnNames($nombre_tabla);
        $all_data = getAllData($nombre_tabla);

        // Insert data
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'insert') {
            $insert_data = [];
            foreach ($column_names as $column) {
                if (isset($_POST[$column])) {
                    $insert_data[$column] = $_POST[$column];
                }
            }
            insertData($nombre_tabla, $insert_data);
        }

        // Update data
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
            $id = $_POST['id'];
            $idColumn = detectIdColumn($column_names);
            $update_data = [];
            foreach ($column_names as $column) {
                if (isset($_POST[$column])) {
                    $insert_data[$column] = $_POST[$column];
                }
            }
            if (!empty($update_data)) {
                updateData($nombre_tabla, $update_data, $id);
            }
        }

        // Delete data
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id_value'])) {
            $idColumn = detectIdColumn($column_names);
            $idValue = $_GET['id_value'];
            deleteData($nombre_tabla, $idColumn, $idValue);
        }

        echo '
        <div class="contenedorCat" style="text-align: left">

          <h1>Dashboard - '.$nombre_tabla.'</h1> <br> <br>
      </div>';
        $recordsPerPage = isset($_GET['per_page']) ? intval($_GET['per_page']) : 10;
        $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Calculate total number of pages
        $totalPages = ceil(count($all_data) / $recordsPerPage);

        // Calculate the starting record for the current page
        $startIndex = ($current_page - 1) * $recordsPerPage;

        // Get a subset of data for the current page
        $dataSubset = array_slice($all_data, $startIndex, $recordsPerPage);

        

        if ($tabla_index !== null) {
            $nombre_tabla = $dashboard->getNombre($tabla_index);

            if ($nombre_tabla !== null) {
                // Get column names and data
                $column_names = getColumnNames($nombre_tabla);
                $all_data = getAllData($nombre_tabla);

                if (isset($_GET['id'])) {
                    $selected_id = isset($_GET['id']) ? (int) $_GET['id'] : null;
                    $selected_row = null;

                    if ($selected_id !== null) {
                        foreach ($all_data as $row) {
                            $first_value = reset($row); // Obtener el primer valor de la fila
                            if ($first_value === $selected_id) {
                                $selected_row = $row;
                                break;
                            }
                        }
                    }

                    if ($selected_row) {
                        echo "<h2>Detalles</h2>";
                        echo "<table>";
                        foreach ($selected_row as $key => $value) {
                            echo "<tr><td>$key</td><td>$value</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Perfil no encontrado.";
                    }
                }
                 else {
                    // Display paginated data table
                    
                    ?>
                    <style>
                        .paginacion {
                            text-align: left;
                        }
                        .paginacion input:hover {
                    background-color: white;
                    color: blue;
                    box-shadow: 0px 0px 1px 1px blue;
                    transition: 0.3s;
                        }
                        .paginacion input {
                            transition: 0.3s;
                            margin: 10px;
                            background-color: white;
                            border: black 1px solid;
                            border-radius: 3px;
                            outline: none;
                            padding: 2px 5px;
                        }
                    </style>
                    <?php
                    echo "<form method='get' action=''>";
                    echo "<div class='paginacion'>";
                    echo "<label> Elementos por página: ";
                    echo "<select name='per_page'>";
                    echo "<option value='10' " . ($recordsPerPage == 10 ? 'selected' : '') . ">10</option>";
                    echo "<option value='20' " . ($recordsPerPage == 20 ? 'selected' : '') . ">20</option>";
                    echo "<option value='50' " . ($recordsPerPage == 50 ? 'selected' : '') . ">50</option>";
                    echo "</select>";
                    echo "<input type='hidden' name='tabla_index' value='$tabla_index'>";
                    echo "<input type='submit' value='Cambiar'>";
                    echo "</div>";
                    echo "</label>";
                    echo "</form>";

                    echo "<table>";
                    echo "<tr>";
                    foreach ($column_names as $column) {
                        echo "<th>$column</th>";
                    }
                    echo "<th>Acciones</th>"; // Additional column for actions
                    echo "</tr>";
                    foreach ($dataSubset as $row) {
                        echo "<tr>";
                        foreach ($row as $key => $value) {
                            
                            $idn = $row[0];
                            echo "<td>" . htmlspecialchars($value) . "</td>";
                        }
                                            $first_value = reset($row);
                        // Find the first column that starts with "id_"
                                            $first_id_column = null;
                                            foreach ($row as $key => $value) {
                                                if (strpos($key, 'id_') === 0) {
                                                    $first_id_column = $key;
                                                    break;
                                                }
                                            }
                        // Generate edit link using the first id column found
                                            if ($first_id_column) {
                                                $entity_name = substr($first_id_column, 3); // Remove "id_" prefix
                                                echo "<td>";
                                                echo "<a href='?tabla_index=$tabla_index&id=" . $first_value . "'>";
                                                echo "<span class='material-symbols-outlined'>expand_circle_right</span>";
                                                echo "</a>";
                                                echo "</td>";
                                            }
                        echo "</tr>";
                    }
                    echo "</table>";

                    // Display pagination links
                    echo "<br>";
                    echo "
                    <style>
                   .AP a:hover {
                    background-color: white;
                    color: blue;
                    box-shadow: 0px 0px 1px 1px blue;
                    transition: 0.3s;
                   }
                    .AP a {
                    transition: 0.3s;
                        color: white;
                        padding: 5px 9px;
                        background-color: gray;
                        border-radius: 3px;
                    }
                    </style>
                    ";
                    echo "<div class='AP' style='text-align: center; word-spacing: 10px;'>";
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo "<a href='?tabla_index=$tabla_index&page=$i'>$i</a> ";
                    }
                    echo "</div>";
                    echo "<br>";
                }
            } else {
                echo "Table not found.";
            }
        }
?>
        <!-- Agrega esto en la sección head de tu HTML -->







        <?php

        // Form to insert data
        ?>
<table class="Entradas">
    <tr>
        <td colspan="2">
            <h3>Ingresar registros:</h3>
        </td>
    </tr>
    <form method="post">
        <?php foreach ($column_names as $column) : ?>
            <tr>
                <td><?php echo $column ?>:</td>
                <td><input type="text" name="<?php echo $column ?>"></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="hidden" name="action" value="insert">
                <input type="submit" class="Boton" value="Agregar">
            </td>
        </tr>
    </form>
</table>
  <?php
    } else {
        echo "No se encontró la tabla.";
    }
}

$pdo = null;

function detectIdColumn($columns)
{
    foreach ($columns as $column) {
        if (strpos($column, 'id_') === 0) {
            return $column;
        }
    }
    return null;
}
?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <!-- Contenido del footer -->
    <div>
      <h1>behuse</h1>
      <img class="imagSmartphone" src="/files/behuse-logos/behuse-logotipo.png">
      <div class="contentFooter">
        <div class="terms">
          <h5><a href="/privacidad/">Contacto</a></h5>
          <h5><a href="/privacidad/">Sugerencias</a></h5>
          <h5><a href="/privacidad/">Reportar un problema</a></h5>
        </div>
        <div class="imagen">
          <img src="/files/behuse-logos/behuse-logotipo.png">
          <br><a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-instagram"></a>
          <a href="#" class="fa fa-twitter"></a>
        </div>
        <div class="terms">
          <h5><a href="/terminos-y-condiciones/">Privacidad</a></h5>
          <h5><a href="/terminos-y-condiciones/">Centro de ayuda</a></h5>
          <h5><a href="/terminos-y-condiciones/">Términos y condiciones</a></h5>
        </div>
      </div>
      <div class="iconsFooter">
        <div>
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-instagram"></a>
          <a href="#" class="fa fa-twitter"></a>
        </div>
      </div>
    </div>
  </footer>
  <div class="endFooter">
    <h4>5 de Mayo #321 Barrio de San Miguel, San Mateo Atenco, México.</h4>
    <h5>Medio de contacto: contacto@gahandi.dev</h5>
  </div>
  <script>
    function inicio() {
      window.location.href = '/';
    }
    var izquierda = document.querySelector('.izquierda');
    var footer = document.querySelector('.footer');
    var windowHeight = window.innerHeight;
    var marginTop = -140;

    function debounce(func, delay) {
      var timeoutId;
      return function () {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(func, delay);
      };
    }

    function updateIzquierdaHeight() {
      var myDiv = document.getElementById("izquierda");
      if (myDiv.addEventListener('scroll', function () {
        // Scroll event listener callback
      })) {
        // Scroll event listener has been added
      } else {
        myDiv.scrollTop = myDiv.scrollHeight;
      }

      var footerOffsetTop = footer.offsetTop;
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      var scrollBottom = scrollTop + windowHeight - marginTop;

      if (scrollBottom >= footerOffsetTop) {
        izquierda.style.height = (windowHeight - (scrollBottom - footerOffsetTop)) + 'px';
      } else {
        izquierda.style.height = '100%';
      }
    }
    var debouncedUpdate = debounce(updateIzquierdaHeight, 0);
    function handleScroll() {

      var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

      if (scrollLeft > lastScrollLeft) {
        Menu();
      }

      lastScrollLeft = scrollLeft;
    }
    var lastScrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
    window.addEventListener('scroll', function () {
      if (window.innerWidth > 798) {
        debouncedUpdate();
      } else {
        handleScroll();
      }
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth > 798) {
        debouncedUpdate();
      } else {
        handleScroll();
      }
    });
  </script>
  <script>
    function materiasAdmin() {
      window.location.href = "/pgs/admin/materias";
    }

  </script>

</body>

</html>