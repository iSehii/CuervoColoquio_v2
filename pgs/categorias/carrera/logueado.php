<?php
session_start();
ini_set('log_errors', 1); // Habilita el registro de errores
ini_set('error_log', 'archivo-de-registro.log');
if (isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true) {
    include_once 'includes/user/usuario.php';
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
    <?php include 'style/Estilo.css' ?>
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
                <img class="logoDesktop" src="files/behuse-logos/behuse-logotipo.png">
                <img class="logo" src="files/behuse-logos/behuse-logo.png">
            </div>
            <div class="auth-links">
                <div class="login" style="visibility: hidden">
                    <a href="/pgs/auth/login/">Iniciar sesión</a>
                </div>

                <div class="" id="menuUser" style="cursor: pointer; z-index: 999" onclick="UserMenu();">

                    <div class="circle">
                        <?php echo '<img src="files/Users/images/' . $Usuario->getFoto() . '" width="48px" height="48px" style="border-radius: 48px">' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</head>

<body>
    <div class="contenedor">

        <!-----AQUI COMIENZA LO DEL USUARIO---->
        <div class="derecha" id="derecha" style="color: black; padding-left: 7px; padding-right: 10px">
            <div class="izqCat catDerecha" style="color: black; background-color: white;">
                <span class="textoIzq"><b style="font-size: 20px">Usuario</b><br></span>
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



            <div class="izqCat catDerecha" style="color: black; background-color: white; ">
                <span class="textoIzq"><b style="font-size: 20px">
                        <?php if ($Usuario->getIdRol() == "1") {
                            echo "Administrador";
                        } else {
                            echo "Alumno";
                        } ?>
                    </b><br></span>
            </div>
            <a href="<?php if ($Usuario->getIdRol() == 1) {
                echo '/pgs/admin/';
            } else {
                echo '/usuario/control/';
            } ?>"
                style="text-decoration: none">
                <div class="izqCat botonCerrar" style="color: BLACK; cursor: pointer;">
                    <span>
                        <?php
                        if ($Usuario->getIdRol() == 1) {
                            echo 'Panel de control';
                        } else {
                            echo 'Mi cuenta';
                        }
                        ?>
                    </span>
                </div>
            </a>
            <a href="/usuarios/<?php echo $id_usuario ?>/" style="text-decoration: none">
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
                    style="font-size: 17px; font-weight: bold; color: black">Cerrar
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
                    <div class="izqCat selected">
                        <span class="textoIzq">Inicio</span>
                    </div>
                    <div class="izqCat">
                        <span class="textoIzq">Categorías</span>
                    </div>
                    <div class="izqCat">
                        <span class="textoIzq">Carreras</span>
                    </div>
                    <div class="izqCat">
                        <span class="textoIzq">Materias</span>
                    </div>
                    <div class="izqCat">
                        <span class="textoIzq">Usuarios</span>
                    </div>
                    <div class="izqCat">
                        <span class="textoIzq">Publicaciones</span>
                    </div>
                </div>
                <amp-ad width="100vw" height="320" type="adsense" data-ad-client="ca-pub-1161956724578947"
                    data-ad-slot="2547810437" data-auto-format="rspv" data-full-width="100%">
                    <div overflow="auto"></div>
                </amp-ad>
            </div>
        </div>
        <div class="Contenido">
            <div class="centro">
                <div class="contenedorCat">
                    <h1>Publicaciones</h1>
                    <div class="Filtros">
                        <div class="FiltrarPor">
                            Filtrar publicaciones:
                        </div>
                        <div class="Filtrado">
                            <a href=""
                                style="border-radius: 5px 0px 0px 5px; border-left: 1px solid rgb(193, 187, 255);">
                                <div>
                                    Recientes
                                </div>
                            </a>
                            <a href="">
                                <div>
                                    Menos reciente
                                </div>
                            </a>
                            <div id="CuatrimestreA" onmouseover="MostrarCuatrimestre()"
                                onmouseout="OcultarCuatrimestre()">
                                <div>
                                    Cuatrimestre
                                </div>
                                <div id="CuatrimestreF" class="CuatrimestreF">
                                    
                                        <li>Primero</li>
                                        <li>Segundo</li>
                                        <li>Tercero</li>
                                        <li>Cuarto</li>
                                        <li>Quinto</li>
                                        <li>Sexto</li>
                                        <li>Séptimo</li>
                                        <li>Octavo</li>
                                        <li>Noveno</li>
                                        <li>Décimo</li>
                                        <li>Onceavo</li>
                                </div>
                            </div>
                            <script>
                                var CuatrimestresVisible = false;

                                function MostrarCuatrimestre() {
                                    var CuatrimestreF = document.getElementById('CuatrimestreF');
                                    CuatrimestreF.style.display = "block";
                                    CuatrimestresVisible = true;
                                }

                                function OcultarCuatrimestre() {
                                    if (!CuatrimestresVisible) {
                                        var CuatrimestreF = document.getElementById('CuatrimestreF');
                                        CuatrimestreF.style.display = "none";
                                    }
                                }

                                // Cuando el mouse está sobre CuatrimestreF, asegurémonos de mantenerlo
                                document.getElementById('CuatrimestreF').addEventListener('mouseover', function () {
                                    CuatrimestresVisible = true;
                                });

                                // Cuando el mouse sale de CuatrimestreF, ocultémoslo si el mouse tampoco está sobre CuatrimestreA
                                document.getElementById('CuatrimestreF').addEventListener('mouseout', function () {
                                    CuatrimestresVisible = false;
                                    OcultarCuatrimestre();
                                });

                                // Cuando el mouse sale de CuatrimestreA, ocultémoslo si el mouse tampoco está sobre CuatrimestreF
                                document.getElementById('CuatrimestreA').addEventListener('mouseout', function (event) {
                                    var relatedTarget = event.relatedTarget;
                                    if (relatedTarget !== null && !relatedTarget.closest("#CuatrimestreF")) {
                                        CuatrimestresVisible = false;
                                        OcultarCuatrimestre();
                                    }
                                });
                            </script>

                            <div href="" id="CarreraA" onmouseover="MostrarCarrera()" onmouseout="OcultarCarrera()">
                                <div onmouseover="MostrarCarrera()" onmouseout="OcultarCarrera()">
                                    Carrera
                                </div>
                                <div id="CarreraF" class="CarreraF">
                                    <li>IGDyGS</li>
                                    <li>DSM</li>
                                    <li>IGCyRI</li>
                                    <li>IRD</li>
                                </div>
                                </a>
                            </div>

                            <script>
                                var carrerasVisible = false;

                                function MostrarCarrera() {
                                    var CarreraF = document.getElementById('CarreraF');
                                    CarreraF.style.display = "block";
                                    carrerasVisible = true;
                                }

                                function OcultarCarrera() {
                                    if (!carrerasVisible) {
                                        var CarreraF = document.getElementById('CarreraF');
                                        CarreraF.style.display = "none";
                                    }
                                }

                                // Cuando el mouse está sobre CarreraF, asegurémonos de mantenerlo visible
                                document.getElementById('CarreraF').addEventListener('mouseover', function () {
                                    carrerasVisible = true;
                                });

                                // Cuando el mouse sale de CarreraF, ocultémoslo si el mouse tampoco está sobre CarreraA
                                document.getElementById('CarreraF').addEventListener('mouseout', function () {
                                    carrerasVisible = false;
                                    OcultarCarrera();
                                });

                                // Cuando el mouse sale de CarreraA, ocultémoslo si el mouse tampoco está sobre CarreraF
                                document.getElementById('CarreraA').addEventListener('mouseout', function (event) {
                                    var relatedTarget = event.relatedTarget;
                                    if (relatedTarget !== null && !relatedTarget.closest("#CarreraF")) {
                                        carrerasVisible = false;
                                        OcultarCarrera();
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="Publicaciones">
                        <?php
                        $Publicaciones = new Publicaciones();
                        $UsuarioPublicacion = new Usuario();
                        if (isset($_GET['filtro'])) {
                            $consulta = 2;
                        } else {
                            $consulta = 1;
                        }
                        $Publicaciones->Publicaciones($consulta, 0);
                        for ($i = 0; $i < $Publicaciones->getTotal(); $i++) {
                            $UsuarioPublicacion->setUser($Publicaciones->getIdUsuario($i));
                            ?>
                            <div class="FinalPublicacion">
                            </div>
                            <div class="PublicacionesTODAS">
                                <label class="VistasP"><label>0 respuestas</label></label>
                                <article class="NumeroPTitulo">
                                    <a
                                        href="publicaciones/publicacion?id=<?php echo $Publicaciones->getIdPublicacion($i); ?>">
                                        <span class="TituloP">
                                            <?php echo $Publicaciones->getTitulo($i) ?>
                                        </span>
                                    </a>
                                    <span class="NumeroP">
                                        <?php echo $Publicaciones->getIdPublicacion($i); ?>
                                    </span>
                                </article>
                                <article class="ContenidoPublicacion">
                                    <span class="ContenidoP" align="justify">
                                        <?php echo $Publicaciones->getContenidoText($i) ?>
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
                                    <div class="CreacionModificaciones"
                                        onmouseout="<?php echo 'UsuarioPHoverOut' . $i; ?>()">
                                        <div class="NombreUP">
                                            <a href=" <?php echo "/usuarios/" . $UsuarioPublicacion->getIdUsuario(); ?>"
                                                onmouseover="<?php echo 'UsuarioPHover' . $i; ?>()">
                                                <span>
                                                    <?php echo '<img src="files/Users/images/' . $UsuarioPublicacion->getFoto() . '" width="20px" height="20px" style="margin-bottom: -4px ;border-radius: 3px">'; ?>
                                                    <?php echo $UsuarioPublicacion->getNombre() . " " . $UsuarioPublicacion->getApellidoPaterno(); ?>
                                                </span>
                                                <div class="UsuarioPHover" id="<?php echo 'UsuarioPHover' . $i; ?>">
                                                    <div class="UsuarioPHoverC">
                                                        <?php echo '<img src="files/Users/images/' . $UsuarioPublicacion->getFoto() . '" width="70px" height="70px" style="margin-bottom: -4px ;border-radius: 3px">'; ?>
                                                        <?php echo $UsuarioPublicacion->getNombre() . " " . $UsuarioPublicacion->getApellidoPaterno(); ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="ModificacionesAP">
                                            <span class="ModificacionesP">
                                                <?php if ($Publicaciones->getFechaCreacion($i) == $Publicaciones->getFechaModificacion($i)) {
                                                    echo "No se han hecho modificaciones.";
                                                } else {
                                                    echo "Última modificación: " . $Publicaciones->getFechaModificacion($i);
                                                }
                                                ?>
                                            </span>
                                            <article class="CreacionAP">
                                                <span>
                                                    Publicado el:
                                                    <?php echo $Publicaciones->getFechaCreacion($i); ?>
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
                        <?php
                        for ($j = 0; $j < $Publicaciones->getTotal(); $j++) {
                            echo '
                                <script>
                                function UsuarioPHover' . $j . '() {
                                    var UsuarioPHover = document.getElementById("UsuarioPHover' . $j . '");
                                    UsuarioPHover.style.display = "inline";
                                }
                                function UsuarioPHoverOut' . $j . '() {
                                    var UsuarioPHover = document.getElementById("UsuarioPHover' . $j . '");
                                    UsuarioPHover.style.display = "none";
                                }
                                </script>
                                ';
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
            <img class="imagSmartphone" src="files/behuse-logos/behuse-logotipo.png">
            <div class="contentFooter">
                <div class="terms">
                    <h5><a href="/privacidad/">Contacto</a></h5>
                    <h5><a href="/privacidad/">Sugerencias</a></h5>
                    <h5><a href="/privacidad/">Reportar un problema</a></h5>
                    <h5><a href="about/">Acerca de nosotros</a></h5>
                </div>
                <div class="imagen">
                    <img src="files/behuse-logos/behuse-logotipo.png">
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
            window.location.href = "/pgs/admin/";
        }
    </script>

</body>

</html>