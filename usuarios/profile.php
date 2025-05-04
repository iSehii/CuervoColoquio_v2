<?php
session_start();
ini_set('log_errors', 1); // Habilita el registro de errores
ini_set('error_log', 'archivo-de-registro.log');

// Utiliza el ID como lo necesites

if (isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true) {
    include_once '../includes/user/usuario.php';
    $UsuarioP = new Usuario();
    $Usuario = new Usuario();
    $Publicaciones = new Publicaciones();
    $UsuarioPublicacion = new Usuario();
    $id = $_GET['id'];
    $id_usuario = $_SESSION['id_usuario'];
    $Usuario->setUser($id_usuario);
    $UsuarioP->setUser($id);
    $Publicaciones->Publicaciones(2, $UsuarioP->getIdUsuario());
    if ($UsuarioP->getIdUsuario() == "" || $UsuarioP->getIdUsuario() == null) {
        header('Location: /../autorized/false.php');
    }
} else {
    header('Location: /');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'profile.css';
    include 'dependencias/update.js'; ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S1KL8WE21Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-S1KL8WE21Y');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="/../js/categorias.js"></script>
    <script src="/../js/global.js"></script>

    <link rel="shortcut icon" href="/../files/behuse-logos/favicon.ico" type="image/x-icon">
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
    <title>
        <? echo $UsuarioP->getNombre(); ?>
    </title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1161956724578947"
        crossorigin="anonymous"></script>
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

</head>

<body>
    <?php include '../dependencias/BarraNav.php' ?>
    <div class="contenedor">
        <?php include '../dependencias/derecha.php' ?>
        <?php include '../dependencias/izquierda.php' ?>
        <div class="Contenido" >
            <div class="centro" style="text-align: left;">
                <div class="contenedorCat">
                    <?php
                    echo '
                    <style>
                    .gradeant {
                    border-left: 2px solid rgb(214, 214, 255);
                    color: white;
                    border-top: 2px solid rgb(214, 214, 255);
                    border-right: 2px solid rgb(214, 214, 255);
                    padding-top: 70px;
                    background: linear-gradient(to bottom, rgb(47, 60, 136) 50%, rgb(47, 60, 136) 50%), url("/files/Users/images/'.$UsuarioP->getPortada().'");
                    background-size: 100% 40%, auto 70%;
                    background-position: bottom, top;
                    background-repeat: no-repeat;
                    }
                    </style>
                    ';
                    if ($_SESSION['id_usuario'] == $UsuarioP->getIdUsuario()) {
                        if ($Usuario->getIdRol() == 1) {
                            include 'dependencias/perfil.php';
                        } else {
                            include 'dependencias/perfilOwner.php';
                        }
                    } else if ($Usuario->getIdRol() == 1) {
                        include 'dependencias/perfil.php';
                    } else if ($Usuario->getIdRol() == 0) {
                        
                    } else {
                        include 'dependencias/profileNoOwner.php';
                    }
                    ?>


                    <tr>
                        <td class="PublicacionesPerfil">
                            <h2>
                                <center>
                                    Publicaciones
                                </center>
                            </h2>
                        </td>
                    </tr>
                    </table>
                    <table>
                                            <div class="Publicaciones">
                        <?php
$total = $Publicaciones->getTotal();
                                                for ($i = ($total- 1); $i >= 0; $i--) {
                                                    $UsuarioPublicacion->setUser($Publicaciones->getIdUsuario($i));
                                                    ?>
                                                    <div class="FinalPublicacion">
                                                    </div>
                                                    <div class="PublicacionesTODAS">
                                                        <label class="VistasP"><label>0 respuestas</label></label>
                                                        <article class="NumeroPTitulo">
                                                            <a href="/publicaciones/publicacion?id=<?php echo $Publicaciones->getIdPublicacion($i); ?>">
                                                                <span class="TituloP">
                                                                    <?php echo htmlspecialchars($Publicaciones->getTitulo($i)) ?>
                                                                </span>
                                                            </a>
                                                            <span class="NumeroP">
                                                                <?php echo $Publicaciones->getIdPublicacion($i); ?>
                                                            </span>
                                                        </article>
                                                        <article class="ContenidoPublicacion">
                                                            <span class="ContenidoP" align="justify">
                                                                <?php echo htmlspecialchars($Publicaciones->getContenidoText($i)) ?>
                                                            </span>
                                                        </article>
                                            
                                            
                                                        <article class="UltimoP">
                                                            <article class="CaracteristicasP">
                                                                <article>
                                                                    <span class="AbiertaP">
                                                                        <?php if ($Publicaciones->getActivo($i) == 1) {
                                                                            echo "Abierta";
                                                                        } else {
                                                                            echo "Cerrado";
                                                                        }
                                                                        ?>
                                                                    </span>
                                                                </article>
                                                                <article>
                                                                    <span>
                                            
                                                                        <?php
                                                                        $CarreraMensaje = "";
                                                                        switch ($Publicaciones->getIdCarrera($i)) {
                                                                            case 1:
                                                                                $CarreraMensaje = "Ingenieria en Desarrollo y Gestión de Software";
                                                                                break;
                                                                            case 2:
                                                                                $CarreraMensaje = "Desarrollo de Software Multiplataforma";
                                                                                break;
                                                                            case 3:
                                                                                $CarreraMensaje = "Ingenieria en Ciberseguridad y Redes Inteligentes";
                                                                                break;
                                                                            case 4:
                                                                                $CarreraMensaje = "Infraestructura en Redes Digitales";
                                                                                break;
                                                                        }
                                                                        echo $CarreraMensaje;
                                                                        ?>
                                                                    </span>
                                                                </article>
                                                                <article>
                                                                    <span>
                                                                        <?php echo $Publicaciones->getIdCuatrimestre($i); ?>
                                                                    </span>
                                                                </article>
                                                            </article>
                                                            <div class="CreacionModificaciones" onmouseout="<?php echo 'UsuarioPHoverOut' . $i; ?>()">
                                                                <div class="NombreUP">
                                                                    <a href=" <?php echo "/usuarios/" . $UsuarioPublicacion->getIdUsuario(); ?>"
                                                                        onmouseover="<?php echo 'UsuarioPHover' . $i; ?>()">
                                                                        <span>
                                                                            <?php echo '<img src="/files/Users/images/' . $UsuarioPublicacion->getFoto() . '" width="20px" height="20px" style="margin-bottom: -4px ;border-radius: 3px">'; ?>
                                                                            <?php echo $UsuarioPublicacion->getNombre() . " " . $UsuarioPublicacion->getApellidoPaterno(); ?>
                                                                        </span>
                                                                        <div class="UsuarioPHover" id="<?php echo 'UsuarioPHover' . $i; ?>">
                                                                            <div class="UsuarioPHoverC">
                                                                                <?php echo '<img src="/files/Users/images/' . $UsuarioPublicacion->getFoto() . '" width="70px" height="70px" style="margin-bottom: -4px ;border-radius: 3px">'; ?>
                                                                                <?php echo $UsuarioPublicacion->getNombre() . " " . $UsuarioPublicacion->getApellidoPaterno(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="ModificacionesAP">
                                                                    <span class="ModificacionesP">
                                                                        <?php
                                                                            $fechaCreacion = strtotime($Publicaciones->getFechaCreacion($i));
                                                                            $fechaModificacion = strtotime($Publicaciones->getFechaModificacion($i));
                                                                            $now = time();

                                                                            if ($fechaCreacion == $fechaModificacion) {
                                                                                echo "No se han hecho modificaciones.";
                                                                            } else {
                                                                                $differenceModificacion = $now - $fechaModificacion;

                                                                                if ($differenceModificacion >= 86400) { // Más de un día
                                                                                    $daysModificacion = floor($differenceModificacion / 86400);
                                                                                    echo "Última modificación: $daysModificacion día(s) atrás.";
                                                                                } elseif ($differenceModificacion >= 3600) { // Más de una hora
                                                                                    $hoursModificacion = floor($differenceModificacion / 3600);
                                                                                    echo "Última modificación: $hoursModificacion hora(s) atrás.";
                                                                                } elseif ($differenceModificacion >= 60) { // Más de un minuto
                                                                                    $minutesModificacion = floor($differenceModificacion / 60);
                                                                                    echo "Última modificación: $minutesModificacion minuto(s) atrás.";
                                                                                } else { // Menos de un minuto
                                                                                    echo "Última modificación: Hace unos segundos.";
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </span>
                                                                    <article class="CreacionAP">
                                                                        <span>
                                                                            Publicado
        <?php
            $differenceCreacion = $now - $fechaCreacion;

            if ($differenceCreacion >= 86400) { // Más de un día
                $daysCreacion = floor($differenceCreacion / 86400);
                echo "hace $daysCreacion día(s).";
            } elseif ($differenceCreacion >= 3600) { // Más de una hora
                $hoursCreacion = floor($differenceCreacion / 3600);
                echo "hace $hoursCreacion hora(s).";
            } elseif ($differenceCreacion >= 60) { // Más de un minuto
                $minutesCreacion = floor($differenceCreacion / 60);
                echo "hace $minutesCreacion minuto(s).";
            } else { // Menos de un minuto
                echo "hace unos segundos.";
            }
            ?>
                                                                        </span>
                                                                    </article>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                    <div class="FinalPublicacion">
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include '../dependencias/footer.php' ?>
    <?php include '../dependencias/HeightNavbar.php'; ?>
</body>

</html>