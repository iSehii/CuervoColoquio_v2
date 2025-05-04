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
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $titulo = $_POST['titulo'];
        if ($titulo != "" || $titulo != null) {

            $Contenido = $_POST['Contenido'];
            $id_user = $_SESSION['id_usuario'];
            $ContenidoText = $_POST['ContenidoText'];
            $Activo = 1;
            $Publica = $_POST['Publica'];
            $id_carrera = $_POST['Carrera'];
            $id_cuatrimestre = $_POST['Cuatrimestre'];
            $Publicaciones = new Publicaciones();
            $IdNuevo = $Publicaciones->crearPublicacion($titulo, $Contenido, $ContenidoText, $id_user, $Activo, $id_carrera, $id_cuatrimestre, $Publica);
            header('Location: /publicaciones/publicacion?id='.$IdNuevo);
        } else {

        }
    }
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
    <?php include '../../style/Estilo.css'; ?>
    <?php include 'style/EstiloP.css' ?>
    <script src="animacion.js"></script>
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
    <script src="https://cdn.tiny.cloud/1/hql0pemrra70fmww3c4af7ecmuv5dic1z13sakav37zt3yrs/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Hebrew:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear publicación</title>
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
            <div class="centro categoriasCARRERA">
                <div class="contenedorCat">
                    <h1>Crear publicación</h1>
                    <div class="Publicaciones" style="color: black; text-align: left">
                        <form action="" method="POST">
                            <div class="TituloPublicacion">
                                <label class="LabelTitulo" id="LabelTitulo">Título</label> <br>
                                <input onclick="FocoTitulo()" autocomplete="nope" type="text" name="titulo" id=""
                                    style="width: 100%; margin: 0 auto; box-sizing: border-box;"> <br>
                            </div>
                            <div class="CarreraYCuatrimestre">
                                <div class="Carrera">
                                    <label>Carrera</label> <br>
                                    <select name="Carrera" id="">
                                    <option value="1">Ingeniería de Desarrollo y Gestión de Software</option>
                                    <option value="2">Desarrollo de Software Multiplataforma</option>
                                    <option value="3">Ingeniería en Redes Inteligentes y Ciberseguridad</option>
                                    <option value="4">Infraestructura en Redes Digitales</option>
                                    </select>                         
                                </div>
                                <div class="Cuatrimestre">
                                    <label>Cuatrimestre</label> <br>
                                    <select name="Cuatrimestre">
                                        <option value="1">Primero</option>
                                        <option value="2">Segundo</option>
                                        <option value="3">Tercero</option>
                                        <option value="4">Cuarto</option>
                                        <option value="5">Quinto</option>
                                        <option value="6">Sexto</option>
                                        <option value="7">Séptimo</option>
                                        <option value="8">Octavo</option>
                                        <option value="9">Noveno</option>
                                        <option value="10">Décimo</option>
                                        <option value="11">Onceavo</option>
                                    </select>
                                </div>
                            </div>
                            <style>
.switch {
margin-top: -5px;
padding-bottom: 5px;
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
                                </style>
<div style="width: 100%; align-items: center; text-align: center; justify-content: center; vertical-align: middle; display: flex">
    <label for="">Publicación pública: </label>
    <label class="switch" for="Publica">
        <input type="checkbox" id="Publica" value="1" name="">
        <span class="slider round"></span>
        </label>
</div>
<input type="hidden" id="checkbox_hidden" name="Publica" value="0">
                            <div class="ContenidoPublicacion">
                                <input name="Contenido" type="hidden" value="">
                                <input name="ContenidoText" type="hidden" value="">
                                <textarea id="ContenidoP" spellcheck="false">
                                    <h1 style="line-height: 1.3; text-align: center;"><strong><span style="font-family: 'trebuchet ms', geneva, sans-serif;">&iexcl;Crea aqu&iacute; tu&nbsp;pregunta!</span></strong></h1>
                                    <p style="text-align: center;"><strong><span style="font-family: 'trebuchet ms', geneva, sans-serif;">Aqu&iacute; podr&aacute;s crear el contenido para tu publicacion, adem&aacute;s de darle el formato y presentaci&oacute;n que m&aacute;s te agrade.</span></strong></p>
                                    <p style="text-align: left;"><span style="font-family: 'trebuchet ms', geneva, sans-serif;">Puedes hacer cosas realmente increibles.</span></p>
                                </textarea>
                            </div>
    <script>
        const checkbox = document.getElementById('Publica');
        const hiddenInput = document.getElementById('checkbox_hidden');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                document.getElementById('checkbox_hidden').value = '1';
            } else {
                document.getElementById('checkbox_hidden').value = '0';
            }
        });
    </script>
                            <script>
                                tinymce.init({
                                    selector: 'textarea',
                                    language_url: 'es.js',
                                    spellchecker_enabled: false,
                                    language: 'es',
                                    branding: false,
                                    plugins: 'anchor  charmap codesample emoticons link lists  searchreplace visualblocks wordcount',
                                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link | align lineheight | tinycomments | checklist numlist bullist indent outdent | charmap | removeformat',
                                    tinycomments_mode: 'embedded',
                                    tinycomments_author: 'Author name',
                                    mergetags_list: [
                                        { value: 'First.Name', title: 'First Name' },
                                        { value: 'Email', title: 'Email' },
                                    ],
                                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
                                });
                            </script>
                            <div class="Alta">
                                <button onclick="Alta()">Subir publicación</button>
                            </div>
                        </form>
                        <script>
function Alta () {
  var editor = tinymce.EditorManager.get("ContenidoP");

  // Get the content of the editor
  const Contenido = editor.getContent();
  const ContenidoText = editor.getContent({ format: 'text' });
  // Display the content in a message
  document.getElementsByName('Contenido')[0].value = Contenido;
  document.getElementsByName('ContenidoText')[0].value = ContenidoText;
}
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contenidoDerecha">

        <h1>Bienvenido</h1>

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