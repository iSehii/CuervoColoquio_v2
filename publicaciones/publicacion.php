<?php
session_start();
ini_set('log_errors', 1); // Habilita el registro de errores
ini_set('error_log', 'archivo-de-registro.log');
if (isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true) {
    include_once '../includes/user/usuario.php';
    $Usuario = new Usuario();
    $Respuestas = new Respuestas();
    $id_usuario = $_SESSION['id_usuario'];
    $Usuario->setUser($id_usuario);
    $RespuestaF = true;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $RespuestaContenido = $_POST['$RespuestaContenido'];
        $Respuesta = $_POST['Respuesta'];
        $id_pub = $_GET['id'];
        if ($Respuesta != "" || $Respuesta != null) {
            $Respuestas->crearRespuesta($id_usuario, $id_pub, $Respuesta);
            echo '<script>
                window.location.href = "/publicaciones/publicacion/?id=' . $id_pub . '";
                </script>';
        } else {
            $RespuestaF = false;
        }
        }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tiny.cloud/1/hql0pemrra70fmww3c4af7ecmuv5dic1z13sakav37zt3yrs/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S1KL8WE21Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-S1KL8WE21Y');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include 'style/style.css' ?>
    </style>
    <script src="/js/categorias.js"></script>
    <script src="/js/global.js"></script>
    <link rel="shortcut icon" href="/files/behuse-logos/favicon.ico" type="image/x-icon">
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
    <title>Inicio - Behuse</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1161956724578947"
        crossorigin="anonymous"></script>
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

    <div class="encabezado">
        <div class="barra">
            <div id="menu" class="menu" style="cursor: pointer; z-index: 999" onclick="Menu()">
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
                <div class="izqCat botonCerrar" style="color: white; cursor: pointer;">
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
            <div class="izqCat botonCerrar"
                style="border-left: 4px solid aquamarine; position: absolute; bottom: 76px;">
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
                <span class="textoIzq" onclick="cerrarSesion();"
                    style="font-size: 17px; font-weight: bold; color: white">Cerrar
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

        <div class="izquierda" id="izquierda">
            <div class="contenidoIzq">
                <div class="iconsIzq">
                </div>
                <div style="display: inline">
        <style>
            a {
                text-decoration: none;
            }
        </style>
                    <a href="/">
                        <div class="izqCat ">
                            <span class="textoIzq">Inicio</span>
                        </div>
                    </a>
                    <a href="/panel.php?cat=carreras">
                        <div class="izqCat">
                            <span class="textoIzq">Carreras</span>
                        </div>
                    </a>
                    <a href="/panel.php?cat=materias">

                        <div class="izqCat">
                            <span class="textoIzq">Materias</span>
                        </div>
                    </a>
                    <a href="/panel.php?cat=usuarios">

                        <div class="izqCat">
                            <span class="textoIzq">Usuarios</span>
                        </div>

                    </a>
                    <a href="/panel.php?cat=publicaciones">
                        <div class="izqCat selected">
                            <span class="textoIzq">Publicaciones</span>
                        </div>
                    </a>
                </div>
                <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-1161956724578947"
                    data-ad-slot="2547810437" data-auto-format="rspv" data-full-width="100%">
                    <div overflow="auto"></div>
                </amp-ad>
            </div>
        </div>
        <?php
        $Publicaciones = new Publicaciones();
        $UsuarioPublicacion = new Usuario();
        $id_publicacion = $_GET['id'];
        $consulta = 10;
        $i = 0;
        $Publicaciones->Publicaciones($consulta, $id_publicacion);
        $UsuarioPublicacion->setUser($Publicaciones->getIdUsuario($i));
        ?>
        <div class="Contenido">
            <div class="centro">
                <div class="contenedorCat">
                    <div style="text-align: left" class="TituloPub">
                        <h1 id="TituloPub">
                            <?php echo htmlspecialchars($Publicaciones->getTitulo($i)); ?>
                        </h1>
                        <br><br><br>
                        <div class="NombreUP ASD">
                            <div id="Separar">
                            </div>
                            <span>
                                <?php echo '<img src="/files/Users/images/' . $UsuarioPublicacion->getFoto() . '" width="60px" height="60px" style="border-radius: 3px; margin-top: 20px">'; ?>
                                <a href="/usuarios/<?php echo $UsuarioPublicacion->getIdUsuario() ?>/">
                                    <label id="UserPub">
                                        <?php echo $UsuarioPublicacion->getNombre() . " " . $UsuarioPublicacion->getApellidoPaterno(); ?>
                                    </label>
                                </a>
                                <div class="CreacionModificaciones" align="right">
                                    <div class="ModificacionesAP" style="    width: 300px; font-size: 12px;">
                                        <span class="ModificacionesP" style="    width: 300px; font-size: 12px;">
                                            <?php if ($Publicaciones->getFechaCreacion($i) == $Publicaciones->getFechaModificacion($i)) {
                                                echo "No se han hecho modificaciones.";
                                            } else {
                                                $Publicaciones->getTiempo($Publicaciones->getFechaModificacion($i));
                                            }
                                            ?>
                                        </span>
                                        <article class="CreacionAP" style="font-size: 12px;">
                                            <span style="font-size: 12px;">
                                                Publicado hace
                                                <?php echo $Publicaciones->getTiempo($Publicaciones->getFechaCreacion($i)); ?>
                                            </span>
                                        </article>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>

                    <div class="Publicaciones">
                        <div class="PublicacionesTODAS">
                            <article class="PubliCont">
                                <div id="ContenidoPub" spellcheck="false">
                                    <?php echo $Publicaciones->getContenido($i); ?>
                                </div>
                                <script>
                                    tinyMCE.init({
                                        selector: '#ContenidoPub',
                                        border: false,
                                        toolbar: '',
                                        statusbar: false,
                                        menubar: '',
                                        readonly: true,
                                        word_wrap: true,
                                        plugins: 'autoresize',
                                        contenteditable: false,
                                        autoresize: true,
                                        editor.on('init', function () {
                                            // Obtener el iframe del editor
                                            const iframe = editor.getContainer().querySelector('iframe');
                                            if (iframe) {
                                                // Acceder al contenido del iframe y aplicar estilos
                                                const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                                                const editorBody = iframeDocument.querySelector('body');

                                                if (editorBody) {
                                                    // Quitar el borde y box shadow
                                                    editorBody.style.border = 'none';
                                                    editorBody.style.boxShadow = 'none';
                                                }
                                            }
                                        });
                                    });
                                </script>
                        </div>
                        </article>
                        <div class="FinalPublicacion">
                        </div>


                        <article class="UltimoP">
                            <br>
                            <article class="CaracteristicasP" style="padding-top: 20px">
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

                        </article>
                    </div>
                    <br>

                    <?php

                    ?>
                </div>
                <div style="text-align: left; margin-left: 20px; margin-right: 20px">
                    <div style="margin-top: 0px" class="FinalPublicacion">
                    </div>
                    <div class="Respuestas">
                        <?php
                        $Respuestas->Respuestas($_GET['id']);
                        $UsuarioRespuesta = new Usuario();
                        for ($i = 0; $i < $Respuestas->getTotal(); $i++) {
                            $UsuarioRespuesta->setUser($Respuestas->getIdUsuario($i));
                            ?>
                            <table border="0">
                            <div class="Favorite">
                                <span class="material-symbols-outlined">
                                favorite
                                </span>
                            </div>
                                <td>
                                    <?php echo '<img src="/files/Users/images/' . $UsuarioRespuesta->getFoto() . '" width="60px" height="60px" style="border-radius: 3px; margin-top: 0px; margin-left: -10px">'; ?>

                                    <a href="/usuarios/<?php echo $UsuarioRespuesta->getIdUsuario() ?>/"
                                        style="position: absolute; margin-top: 10px; margin-left: 10px;cursor: pointer;">
                                        <label id="UserPub">
                                            <?php echo $UsuarioRespuesta->getNombre() . " " . $UsuarioRespuesta->getApellidoPaterno(); ?>
                                        </label> <br>
                                    </a>
                                    <label for="" style="position: absolute; margin-top: 30px; margin-left: 10px">
                                        <?php if ($UsuarioRespuesta->getIdRol() == 1) {
                                            echo "Administrador";
                                        } else if ($UsuarioRespuesta->getIdRol() == 2) {
                                            echo "Docente";
                                        } else {
                                            echo "Alumno";
                                        } ?>
                                    </label>
                                </td>
                            </table>
                            
                            <div class="RespuestaContenido">
                                <div id="RespuestaContenido">
                                    
                                    <?php echo $Respuestas->getRespuesta($i);?> 
                                    </div>

                            </div><br>

                            <br>
                            <div class="RespuestaTiempo"><?php echo 'Respondió hace'.$Respuestas->getTiempo($Respuestas->getFechaRespuesta($i)); ?></div>
                            <br>
                        <div style="margin-top: 0px" class="FinalPublicacion">
                        </div>
<?php
                        }
                        ?>
                                <script>
                                    tinyMCE.init({
                                        selector: '.RespuestaContenido',
                                        border: false,
                                        toolbar: '',
                                        statusbar: false,
                                        menubar: '',
                                        readonly: true,
                                        word_wrap: true,
                                        plugins: 'autoresize',
                                        contenteditable: false,
                                        autoresize: true,
                                        editor.on('init', function () {
                                            // Obtener el iframe del editor
                                            const iframe = editor.getContainer().querySelector('iframe');
                                            if (iframe) {
                                                // Acceder al contenido del iframe y aplicar estilos
                                                const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                                                const editorBody = iframeDocument.querySelector('body');

                                                if (editorBody) {
                                                    // Quitar el borde y box shadow
                                                    editorBody.style.border = 'none';
                                                    editorBody.style.boxShadow = 'none';
                                                }
                                            }
                                        });
                                    });
                                </script>
                    </div>
                    <div class="FinalPublicacion">
                    </div>
                    <br><br><br>
                    <form action="" method="POST">
                        <h1><b>Responde a ésta pregunta</b></h1>
                        <div class="RespuestContenido">
                            <input name="Respuesta" type="hidden" value="">
                            <textarea id="Respuestas"></textarea>
                            </textarea>
                            </div>
                            <script>
                                tinymce.init({
                                    selector: '#Respuestas',
                                    language_url: 'es.js',
                                    spellchecker_enabled: false,
                                    language: 'es',
                                    menubar: '',
                                    border: '',
                                    branding: false,
                                    plugins: '',
                                    toolbar: '  bold ',
                                    tinycomments_mode: 'embedded',
                                    tinycomments_author: 'Author name',
                                    mergetags_list: [
                                        { value: 'First.Name', title: 'First Name' },
                                        { value: 'Email', title: 'Email' },
                                    ],
                                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
                                });
                            </script>
                            <center><br>
                            <style>
                                .Botonc:hover {
                                    color: white;
                                    transition: 400ms;
                                    background-color: cornflowerblue;
                                }
                                .Botonc {
                                    cursor: pointer;
                                    padding: 15px 25px;
                                    transition: 400ms;
                                    color: <?php if ($RespuestaF == false) {
                                        echo "red;";
                                    } else {
                                        echo "blue;";
                                    } ?>;
                                    background-color: white;
                                    font-weight: bold;
                                    font-size: 16px;
                                    box-shadow: <?php if ($RespuestaF == false) {
                                        echo "0px 0px 1px 2px red;";
                                    } else {
                                        echo "0px 0px 1px 2px blue;";
                                    }?>;

                                }
                            </style>
                                <button onclick="Alta()" class="Botonc">Subir</button>
                            </center>
<script>
function Alta () {
  var editor = tinymce.EditorManager.get("Respuestas");

  // Get the content of the editor
  const Contenido = editor.getContent();
  // Display the content in a message
  document.getElementsByName('Respuesta')[0].value = Contenido;
}
</script>
                    </form>
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
        <h5>Medio de contacto: contacto@behuse.com</h5>
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

        var lastScrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
        window.addEventListener('scroll', function () {
            if (window.innerWidth > 798) {
                debouncedUpdate();
            } else {
            }
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth > 798) {
                debouncedUpdate();
            } else {
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