<?php
session_start();
if (isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true) {
  header('Location: /');
  // El usuario ha iniciado sesión, realizar acciones específicas aquí
} else {
    
}
ini_set('log_errors', 1); // Habilita el registro de errores
ini_set('error_log', 'archivo-de-registro.log');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['contra'];
    $correo = $_POST['correo'];

    
      if ($pass != NULL && $pass != "") {
        if ($correo != NULL && $correo != "") {
            $con = mysqli_connect (getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME')) or die ("Ocurrio un error al conectarse a la base de datos o servidor");


    $consultaHash = "SELECT pass FROM usuario WHERE Correo = '$correo';";
    $HashREQUEST = mysqli_query($con, $consultaHash);
    $contra = mysqli_fetch_array($HashREQUEST)[0];
    
    $passCHECK = password_verify($pass, $contra);
            

    if (!$passCHECK) {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logText').style.color = 'red';
            document.getElementById('logText').innerHTML = 'Error: Contraseña no coincide';
          });
          </script>
        ";
    }
    

    $consultaCorreo = "SELECT Correo FROM usuario WHERE Correo = '$correo';";
    $correoREQUEST = mysqli_query($con, $consultaCorreo);
    $email = mysqli_fetch_array($correoREQUEST)[0];
    
    if (strtolower($email) == strtolower($correo)) {
        $correoCHECK = true;
    } else {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logText').style.color = 'red';
            document.getElementById('logText').innerHTML += 'Correo no encontrado';
          });
          </script>
        ";
        $correoCHECK = false;
    }
    
    if ($correoCHECK==true && $passCHECK == true) {
        $Datos = "SELECT Nombre, id_usuario, Matricula, Foto, Correo, id_rol  FROM usuario WHERE Correo = '$correo'";
        $resultado = mysqli_query($con, $Datos);
        while ($row = $resultado ->fetch_array()) {
          $id_usuarioBD = $row['id_usuario'];
          $id_rolBD = $row['id_rol'];
          $_SESSION['Logueado'] = true;
          $_SESSION['id_rol'] = $id_rolBD;
          $_SESSION['registrado'] = true;
          $_SESSION['id_usuario'] = $id_usuarioBD;
        }
        header("Location: /");
    }
        } else {
            echo "
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('logText').style.color = 'red';
                document.getElementById('logText').innerHTML += 'Error: El correo está vacío';
              });
              </script>
            ";
        }
    } else {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('logText').style.color = 'red';
            document.getElementById('logText').innerHTML += 'Error: La contraseña está vacía';
          });
          </script>
        ";
    }
 


    


    
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S1KL8WE21Y"></script>
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=6LfTvB0nAAAAAEEe4d5fiW-5ExIm8u0ebPBZCjh_"></script> 
    <script>
      

    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-S1KL8WE21Y');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../js/global.css">
    <?php include 'style/estilo.css' ?>
    <script src="/js/categorias.js"></script>
    <script src="/js/global.js"></script>
    <link rel="shortcut icon" href="../../../../files/behuse-logos/favicon.ico" type="image/x-icon">
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
    <title>Inicio de sesión - Behuse</title>
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
            <img class="logoDesktop" src="../../../../files/behuse-logos/behuse-logotipo.png">
            <img class="logo" src="../../../../files/behuse-logos/behuse-logo.png">
        </div>
            <div class="auth-links" style="visibility: hidden">
                <div class="login">
                    <a href="/pgs/auth/login/">Iniciar sesión</a>
                </div>
                <div class="register" style="visibility: visible">
                    <a href="/pgs/auth/register/">Registrarse</a>
                </div>
            </div>
        </div>
    </div>
</head>
<body>
    <div class="contenedor">
    <div class="izquierda" id="izquierda">
    <div class="contenidoIzq">
    <div class="iconsIzq">
    </div>
    <div style="display: inline">
    <div class="izqCat" >
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
    <div class="Contenido">
    <div class="centro">
                    <div class="contenedorCat">
                    <h1>¡Bienvenido!</h1>
                    <h3>Inicia sesión para comenzar a interactuar.</h3>
                    <form action="index.php" method="POST" id="form1" name="formulario">
                    <div class="inputLogin">
                    <label id=""><b>Correo:</b></label> <br>
                    <input type="text" value="" name="correo" placeholder="Correo institucional"> <br>
                    <label><b>Contraseña:</b></label> <br>
                    <input value="" type="password" name="contra" placeholder="Clave de registro"> 
                    <div style="text-align: center"> <br>
                    <label id="logText"></label>
                    <input type="hidden" id="token" name="token">
                    <input type="hidden" id="action" name="action" value="index">
                    <button>Iniciar sesión</button>
                    </div>
                    </div>
                    </form>
                  </div>
                </div>
                <br><br>
    </div> 
    </div> 
    <footer class="footer">
        <!-- Contenido del footer -->
        <div>
            <h1>behuse</h1>
            <img class="imagSmartphone" src="../../../../files/behuse-logos/behuse-logotipo.png">
            <div class="contentFooter">
                <div class="terms">
                    <h5><a href="/privacidad/">Contacto</a></h5>
                    <h5><a href="/privacidad/">Sugerencias</a></h5>
                    <h5><a href="/privacidad/">Reportar un problema</a></h5>
                </div>
                <div class="imagen" >
                <img src="../../../../files/behuse-logos/behuse-logotipo.png">
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

</body>
</html>