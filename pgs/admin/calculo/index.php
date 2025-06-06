<?php
session_start();
ini_set('log_errors', 1); // Habilita el registro de errores
ini_set('error_log', 'archivo-de-registro.log');

    include_once '../../../includes/user/usuario.php';
    $Usuario = new Usuario();
    $id_usuario = $_SESSION['id_usuario'];
    $Usuario->setUser($id_usuario);

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
    <link rel="stylesheet" href='../style/StyleA.css'>
    <style>
        <?php include 'estilo.css'; ?>
    </style>
    <script src="/js/categorias.js"></script>
    <script src="/js/global.js"></script>
    <link rel="shortcut icon" href="../../../files/behuse-logos/favicon.ico" type="image/x-icon">
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
    <title>Cálculo</title>
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
                    <h1>Cálculo diferencial</h1>
                    <div style="text-align: justify">
                        <h3>Problema de optimización</h3>
                        <h4><b>Ejercicio particular</b></h4>
                        <p>Una página rectangular contendrá 180 cm2 de área impresa. Los márgenes de cada lado son de 2cm.</p>
                        <p>Encontrar las dimensiones de la página de manera tal que se use la menor cantidad de papel.
                        </p>
                        <div>
                            <h4>RESULTADO:</h4>
                            <b><p id="LabelMensaje2"></p></b>
                        </div>
                        <h4>Ejercicio general</h4>
                        <p style="text-align: left">Ingresa el área de impresión:</p>
                        <p style="text-align: left" id="LabelMensaje"></p>                        
                        <div class="Ecuacion" style="text-align: left">
                            <input type="number" id="AreaTexto" /> <br>
                            <button onclick="calcularDimensiones()">Calcular</button>
                        </div>
                    </div>
                    <div class="categorias"></div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
<script>

function encontrarDimensionesOptimas() {
    const areaDeTexto = 180;
    const margen = 2;
    const margenDePagina = 2 * margen;

    // Derivadas parciales de la función Lagrangiana
    function dLdx(x, y, lambda) {
        return y + 4 - lambda * y;
    }

    function dLdy(x, y, lambda) {
        return x + 4 - lambda * x;
    }

    // Valores iniciales
    let x = 13.42;
    let y = 13.42;
    let lambda = 1 / 3;

    const epsilon = 0.001; // Tolerancia para la convergencia
    const maxIteraciones = 100; // Evita el ciclo infinito

    let iteraciones = 0;

    // Iteración utilizando el método de Newton-Raphson
    while (Math.abs(x * y - areaDeTexto) > epsilon && iteraciones < maxIteraciones) {
        const dx = dLdx(x, y, lambda);
        const dy = dLdy(x, y, lambda);

        const dxdlambda = -y;
        const dydlambda = -x;

        const denominator = dx * dy - dxdlambda * dydlambda;

        x = x - (dx * dydlambda - dxdlambda * dy) / denominator;
        y = y - (-dy * dxdlambda + dydlambda * dx) / denominator;

        lambda = lambda - (x * y - areaDeTexto) / (x * dydlambda + y * dxdlambda);

        iteraciones++;
    }

    return [x+4, y+4];
}

const [anchoOptimo, altoOptimo] = encontrarDimensionesOptimas();
var LabelMensaje2 = document.getElementById('LabelMensaje2');
LabelMensaje2.innerHTML = `Las dimensiones óptimas de la página son aproximadamente ${anchoOptimo.toFixed(2)} cm de ancho
y ${altoOptimo.toFixed(2)} cm de alto, considerando los márgenes de 2 cm en cada lado.`;

        // Función para calcular las dimensiones óptimas
        function calcularDimensiones() {
            // Obtener el valor del área de texto ingresado por el usuario
            const areaDeTexto = parseFloat(document.getElementById('AreaTexto').value);

            // Verificar si el valor ingresado es un número válido
            if (!isNaN(areaDeTexto)) {
                const margen = 2;
                const margenDePagina = 2 * margen;

                // Funciones para calcular las derivadas parciales
                function dLdx(x, y, lambda) {
                    return 4 + y - lambda * y;
                }

                function dLdy(x, y, lambda) {
                    return 4 + x - lambda * x;
                }

                // Valores iniciales y parámetros de convergencia
                let x = Math.sqrt(areaDeTexto);
                let y = Math.sqrt(areaDeTexto);
                let lambda = 1 / 3;

                const epsilon = 0.001;
                const maxIteraciones = 100;

                let iteraciones = 0;

                // Iteración utilizando el método de Newton-Raphson
                while (Math.abs(x * y - areaDeTexto) > epsilon && iteraciones < maxIteraciones) {
                    const dx = dLdx(x, y, lambda);
                    const dy = dLdy(x, y, lambda);

                    const dxdlambda = -y;
                    const dydlambda = -x;

                    const denominator = dx * dy - dxdlambda * dydlambda;

                    x = x - (dx * dydlambda - dxdlambda * dy) / denominator;
                    y = y - (-dy * dxdlambda + dydlambda * dx) / denominator;

                    lambda = lambda - (x * y - areaDeTexto) / (x * dydlambda + y * dxdlambda);

                    iteraciones++;
                }
                var sumax = x.toFixed(2);
                var sumaxF = parseFloat(sumax) + 4;
                var sumay = y.toFixed(2);
                var sumayF = parseFloat(sumay) + 4;
                // Mostrar los resultados en el párrafo de etiqueta con ID "LabelMensaje"
                const labelMensaje = document.getElementById('LabelMensaje');
                labelMensaje.innerHTML = `Las dimensiones óptimas de la página son aproximadamente ${sumaxF} cm de ancho 
                y ${sumayF} cm de alto, considerando los márgenes de 2 cm en cada lado.`;
            }
        }
</script>
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