<?php
session_start();
if (isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true) {
  include_once 'includes/user/usuario.php';
  $Usuario = new Usuario();
  $id_usuario = $_SESSION['id_usuario'];
  $Usuario->setUser($id_usuario);
  
    // El usuario ha iniciado sesión, realizar acciones específicas aquí
  } else {
    echo '
    <script>
    alert("Bienvenido a la version publica de las publicaciones del foro sobre la carrera Desarrollo de Software Multiplataforma")
    </script>
    ';
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S1KL8WE21Y"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-S1KL8WE21Y');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include 'style/Estilo.css'?>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
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
            <style>
                .Busqueda {
                    width: calc(100% - 55%);
                    position: absolute;
                    display: flex;
                    left: 50%;
                    margin: 0 auto;
                    transform: translate(-50%, 4%);

                }

                .BGBusqueda {
                    display: none;
                }

                .Busqueda span {
                    border-top: 1px solid blue;
                    border-right: 0px;
                    cursor: disabled;
                    border-bottom: 1px solid blue;
                    border-left: 1px solid blue;
                    outline: none;
                    height: 22px;
                    border-radius: 5px 0px 0px 5px;
                    padding: 6px 5px 10px 5px;
                    background-color: aliceblue;
                }

                .Busqueda input {
                    width: 100%;
                    margin-top: -2.5px;
                    height: 40px;
                    border-top: 1px solid blue;
                    border-left: 0px;
                    border-right: 1px solid blue;
                    border-bottom: 1px solid blue;
                    outline: none;
                    border-radius: 0px 5px 5px 0px;
                    background-color: aliceblue;
                    box-sizing: border-box;

                }

                @media (max-width: 705px) {
                    .Busqueda {
                        width: calc(90% - 55%);
                    }
                }

                @media (max-width: 630px) {
                    .Busqueda {
                        transform: translate(-65%, 4%);
                        width: calc(80% - 25%);
                    }

                    .logoDesktop {
                        display: none;
                    }

                    .logo {
                        visibility: visible;
                        display: inline;
                    }
                }

                @media (max-width: 508px) {
                    .Busqueda {
                        transform: translate(-70%, 4%);
                        width: calc(80% - 25%);
                    }
                }

                @media (max-width: 465px) {
                    .Busqueda {
                        transform: translate(-70%, 4%);
                        width: calc(75% - 25%);
                    }
                }

                @media (max-width: 447px) {
                    .Busqueda {
                        transform: translate(-55%, 4%);
                        width: calc(55% - 25%);
                    }
                }

                .ResultadoB {
                    display: none;
                    position: fixed;
                    border: 1px solid blue;
                    max-height: 300px;
                    width: 90vh;
                    transition: 0.3s;
                    padding: 15px;
                    transform: translate(-50%, 4%);
                    left: 50%;
                    background-color: aliceblue;
                    color: black;
                    top: 23.5px;
                    overflow-y: auto;
                }

                @media (max-width: 798px) {
                    .izquierdaVisible {
                        z-index: 1002;
                    }
                }

                @media (max-width: 400px) {
                    .ResultadoB {
                        display: inline;
                        text-align: left;
                        left: -1px;
                        top: 92.5px;
                        background-color: white;
                        border: 1px solid blue;
                        box-sizing: border-box;
                        width: 42vh;
                    }

                    .Busqueda {
                        transform: translate(-0%, 4%);
                        background-color: transparent;
                        padding: 0px;
                        text-align: center;
                    }

                    .Busqueda span {
                        border-radius: 5px;
                        padding: 10px 0px;
                        background-color: transparent;
                        border: none;
                        width: 60px;
                    }

                    .Busqueda input {
                        margin: 0 auto;
                        transform: translate(-67.5%, 4%);
                        left: 50%;
                        padding: 1px 10px;
                        border: 1px solid blue;
                        border-radius: 6px;
                        position: fixed;
                        box-sizing: content-box;
                        width: 40vh;
                        top: 60px;
                    }

                    .BGBusqueda {
                        z-index: -1;
                        top: 43.5px;
                        color: transparent;
                        width: 45vh;
                        display: inline;
                        border-radius: 0px 0px 5px 5px;
                        position: fixed;
                        height: 70PX;
                        background-color: white;
                        margin: 0 auto;
                        border: 1px solid blue;
                        transform: translate(-66.7%, 4%);
                        left: 50%;
                    }

                }

                .ResultadoB a {
                    transition: 0.3s;
                }

                .ResultadoB a:hover {
                    transition: 0.3s;
                    color: blue;
                    font-weight: bold;
                }
            </style>
            <div class="Busqueda">
                <span class="material-symbols-outlined" onclick="MostrarBusqueda()">
                    search
                </span>
                <div class="BGBusqueda">
                    Contenido
                </div>
                <script>


                </script>
                
                <div class="ResultadoB" id="searchResults" onblur="OcultarBusqueda()"></div>
                <input type="text" id="searchInput" placeholder="Busca publicaciones, usuarios o grupos"
                oninput="MostrarBusqueda()">
            </div>
                <script>
$(document).ready(function () {
    // Seleccionar el elemento de entrada de búsqueda
    var searchInput = $('#searchInput');
    
    // Seleccionar el contenedor de resultados de búsqueda
    var searchResults = $('#searchResults');
    
    // Agregar un evento de escucha en la entrada de búsqueda
    searchInput.on('input', function () {
        var searchText = searchInput.val().trim();
        
        if (searchText !== '') {
            // Enviar solicitud AJAX solo si hay texto de búsqueda
            $.ajax({
                url: '/busqueda.php',
                method: 'POST',
                data: { searchText: searchText },
                success: function (response) {
                    searchResults.html(response);
                }
            });
        } else {
            // Limpiar los resultados si no hay texto de búsqueda
            searchResults.html('');
        }
    });
});


                </script>
            <div class="auth-links">
                <div class="login" style="visibility: hidden">
                    <a href="/pgs/auth/login/">Iniciar sesión</a>
                </div>

                <div class="" id="menuUser" style="cursor: pointer; z-index: 999" onclick="UserMenu();">
                
                <div class="circle"  ><?php echo '<img src="/files/Users/images/'.$Usuario->getFoto().'" width="48px" height="48px" style="border-radius: 48px">'?></div>
                </div>
            </div>
        </div>
    </div>
</head>
<script>
    function MostrarBusqueda() {
        document.getElementById('searchResults').style.display = "inline";
    }

    function OcultarBusqueda() {
        setTimeout(function () {
            document.getElementById('searchResults').style.display = "none";
        }, 200); // Retraso de 200 ms antes de ocultar
    }

    function handleClick(event) {
        const elemento = event.target;
        if (elemento.id === 'searchResults') {
            return;
        } else {
            document.getElementById('searchResults').style.display = "none";
        }
    }

    document.getElementById('searchResults').addEventListener('click', handleClick);
</script> 
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
    <span class="textoIzq"><b style="font-size: 15px">Nombre:</b> <br> <?php echo $Usuario->getNombre(); ?></span>
    </div>
    <div class="izqCat">
    <span class="textoIzq"><b style="font-size: 15px">Matrícula:</b> <br> <?php echo $Usuario->getMatricula();?></span>
    </div>
    <div class="izqCat">
    <span class="textoIzq" style="font-size: 14px"><b style="font-size: 15px">Correo:</b> <br> <?php echo $Usuario->getCorreo(); ?></span>
    </div>

    
      
      <div class="izqCat catDerecha" style="color: white; background-color: rgb(0, 176, 203); ">
      <span class="textoIzq"><b style="font-size: 15px"><?php if ($Usuario->getIdRol() == "1") { echo "Administrador"; } else { echo "Alumno"; } ?></b><br></span>
      </div>
      <div class="izqCat botonCerrar" style="color: white; cursor: pointer;">
      <span class="textoIzq"<?php if ($Usuario->getIdRol() == "1") { echo 'onclick="materiasAdmin();"'; } else { echo 'onclick="grupo();"'; } ?>><?php if ($Usuario->getIdRol() == "1" ) { echo "Materias"; } else { echo "Mi grupo "; }?></span>
      </div>
      <a href="/usuarios/<?php echo $id_usuario ?>/">
      <div class="izqCat botonCerrar" style="color: white; cursor: pointer;">
      <span class="textoIzq" onclick="miProfile()">Mi perfil</span>
      </div>
      <?php 
      echo '
      <script>
      function miProfile() {
        window.location.href = "/usuarios/'.$_SESSION['id_usuario'].'";
      }
    </script>
      ';
      ?>
      </a>
    <div class="izqCat botonCerrar" style="border-left: 4px solid aquamarine; position: absolute; bottom: 76px;">
    <script>
  function cerrarSesion() {
    // Envía una solicitud AJAX al archivo actual
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Recarga la página actual después de cerrar sesión
        window.location.reload();
      }
    };
    xhttp.open("GET", "cerrar_sesion.php", true);
    xhttp.send();
  }
</script>
    <span class="textoIzq" onclick="cerrarSesion();" style="font-size: 17px; font-weight: bold; color: white">Cerrar sesión</span>
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
    setTimeout(function() {
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
    <div style="display: inline;text-decoration: none">
        <style>
            a {
                text-decoration: none;
            }
        </style>
                    <a href="/">
                        <div class="izqCat">
                            <span class="textoIzq">Inicio</span>
                        </div>
                    </a>
                    <a href="/panel.php?cat=carreras">
                        <div class="izqCat <?php  if ($_GET['cat'] == "carreras") { echo "selected";}?>">
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
                        <div class="izqCat">
                            <span class="textoIzq">Publicaciones</span>
                        </div>
                    </a>
    </div>
    <amp-ad width="100vw" height="320"
        type="adsense"
        data-ad-client="ca-pub-1161956724578947"
        data-ad-slot="2547810437"
        data-auto-format="rspv"
        data-full-width="100%">
        <div overflow="auto"></div>
    </amp-ad>
    </div>
    </div>
      <?php

      switch ($_GET['cat']) {
        case "carreras":
          if ($_GET['f'] != "" || $_GET['f'] != null) {
            switch ($_GET['f']) {
              case "DSM":
                include 'categorias/DSM.php';
              break;
              case "IGDSM":
                include 'categorias/IGDSM.php';
              break;
              case "IRD":
                include 'categorias/IRD.php';
              break;
              case "IGIRD":
                include 'categorias/IGIRD.php';
              break;
            }
          } else {
                include 'categorias/carreras.php';
          }
        break;
        case "materias":
          include 'categorias/materias.php';
        break;

        case "usuarios":
          include 'categorias/usuarios.php';
        break;

        case "publicaciones":
          include 'categorias/publicaciones.php';
        break;

        default:
        header('Location: /');
        break;
        
    }
    
    ?>
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
                <div class="imagen" >
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
  return function() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(func, delay);
  };
}

function updateIzquierdaHeight() {
    var myDiv = document.getElementById("izquierda");
if (myDiv.addEventListener('scroll', function() {
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
window.addEventListener('scroll', function() {
  if (window.innerWidth > 798) {
    debouncedUpdate();
  } else {
    handleScroll();
  }
});

window.addEventListener('resize', function() {
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