<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true) {
    header('Location: /');
    // El usuario ha iniciado sesión, realizar acciones específicas aquí
} else {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script
        src="https://www.google.com/recaptcha/enterprise.js?render=6LeX3xgnAAAAAFebwXHX9VvzviDi-B_T40u4qG_N"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S1KL8WE21Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-S1KL8WE21Y');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/js/global.css">
    <script src="/pgs/auth/register/alumno/js/validar.js"></script>
    <link rel="stylesheet" href="/pgs/auth/register/alumno/style/styleR.css">
    <script src="/js/categorias.js"></script>
    <script src="/js/global.js"></script>
    <link rel="shortcut icon" href="../../../../../files/behuse-logos/favicon.ico" type="image/x-icon">
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
                <img class="logoDesktop" src="../../../../files/behuse-logos/behuse-logotipo.png">
                <img class="logo" src="../../../../files/behuse-logos/behuse-logo.png">
            </div>
            <div class="auth-links">
                <div class="login" style="visibility: hidden">
                    <a href="/pgs/auth/login/">Iniciar sesión</a>
                </div>
                <div class="register">
                    <a href="/pgs/auth/login/">Iniciar sesión</a>
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
                    <div class="izqCat">
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
                    <br>
                    <h1>Registro</h1>
                    <h3>Crea tu cuenta Cuervo, es gratis y solo te tomará un minuto.</h3>
                    <form action="/pgs/auth/register/alumno/index.php" id="Formulario" method="post">
                        <div class="inputs" style="margin: 0 auto">
                            <div class="cajas" style="margin: 0 auto">
                                <div class="renglon">
                                    <h10 id="IzqTextH">
                                        <h10>Nombre:</h10><br>
                                        <input type="text" oninput="Apellidos()" name="nombre" placeholder="Ej: Juan"
                                            id="nombre"> <br>
                                        <h10 style="visibility: hidden">Hola como estás</h10>
                                </div>
                                <div class="renglon">
                                    <h10 id="IzqTextH">
                                        <h10>Apellido paterno:</h10><br>
                                        <input type="text" oninput="Apellidos()" name="Apellido_paterno"
                                            placeholder="Apellido paterno" id="apellidop"><br>
                                        <h10 style="visibility: hidden">Hola como estás</h10>
                                </div>
                                <div class="renglon">
                                    <h10 id="IzqTextH">
                                        <h10>Apellido materno:</h10><br>
                                        <input type="text" oninput="Apellidos()" name="Apellido_materno"
                                            placeholder="Apellido materno" id="apellidom"> <br>
                                        <h10 style="visibility: hidden">Hola como estás</h10>
                                </div>
                                <div class="renglon">
                                    <h10 id="IzqTextH">
                                        <h10>Matrícula:</h10><br>
                                        <input type="text" name="matricula"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, ''); matriculas();"
                                            placeholder="Matricula" id="Matricula"> <br>
                                        <h10 id="matriText"></h10><br>
                                </div>
                                <div class="renglon" style="">
                                    <h10 id="IzqTextH">
                                        <h10>Correo:</h10><br>
                                        <input type="text" name="correo" style="" onkeyup="validarCorreo();"
                                            placeholder="Correo" id="correo"> <br>
                                        <h10 style="" id="correoText">Hola como estás</h10>
                                </div>
                                <div class="renglon">
                                    <h10 id="IzqTextH">
                                        <h10>Teléfono:</h10><br>
                                        <input type="text" name="telefono"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, ''); telefonos();"
                                            placeholder="Teléfono" id="telefono"> <br>
                                        <h10 id="celText"></h10><br>
                                </div>
                                <div class="renglon">
                                    <h10 id="IzqTextH">
                                        <h10>Contraseña:</h10><br>
                                        <input style="" type="password" name="pass" onkeyup="validarpass();"
                                            placeholder="Contraseña" id="pass"> <br>
                                        <h10 style="visibility: hidden">Hola como estás</h10>
                                </div>
                                <div class="renglon">
                                    <h10 id="IzqTextH">
                                        <h10>Confirmar:</h10><br>
                                        <input style="" type="password" name="pass2" onkeyup="validarpass();"
                                            placeholder="Repetir contraseña" id="pass2">
                                        <h10 id="passText">Hola como estás</h10>
                                </div>
                                <div class="renglon">
                                    <h10 id="IzqTextH">
                                        <h10>Género:</h10><br>
                                        <select onchange="gener();" name="genero" style="padding: 10px 5px;"> <br>
                                            <option value="" disabled selected>Selecciona tu género</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                </div>
                                <div class="renglon" id="asd" style="">
                                    <h10 id="IzqTextH">
                                        <h10>Fecha de nacimiento:</h10><br>
                                        <input type="date" onchange="fecha();" name="Fecha_nacimiento"
                                            placeholder="Fecha nacimiento" id="fecha_nacimiento">
                                        <h10 id="dateText"></h10>
                                </div>
                                <div class="renglon" style="margin-top: 10px">
                                    <h10 id="fnText" style="font-weight: bold">Carrera:</h10>
                                    <select name="carrera" onchange="Carrera();" style="padding: 10px 5px;">
                                        <option value="" disabled selected>Selecciona tu carrera</option>
                                        <?php
                                        $con = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME')) or die("Ocurrio un error al conectarse a la base de datos o servidor");
                                        $query2 = "SELECT * FROM carrera";
                                        $resultado = mysqli_query($con, $query2);
                                        while ($row = $resultado->fetch_array()) {
                                            $Carrera = $row['Nombre'];
                                            $id_Carrera = $row['id_carrera'];


                                            ?>
                                            <option value="<?php echo $id_Carrera ?>"><?php echo $Carrera ?>
                                            <?php } ?>
                                    </select>

                                </div>
                                <div class="renglon Cuatrimestre" style="margin-top: 10px">
                                    <h10 id="IzqTextH">
                                        <h10>Cuatrimestre:</h10><br>
                                        <select name="Cuatri" onchange="cuatrimestre();" style="padding: 10px 5px;">
                                            <br>
                                            <option value="" disabled selected>Selecciona tu cuatrimestre</option>
                                        </select>
                                </div>
                                <div class="renglon TSU" style="margin-top: 10px">
                                    <h10>Cuatrimestre:</h10>
                                    <select name="Cuatri" onchange="cuatrimestre();" style="padding: 10px 5px;">
                                        <option value="" disabled selected>Selecciona tu cuatrimestre</option>
                                        <?php
                                        $query2 = "SELECT DISTINCT Cuatrimestre FROM grupo";
                                        $resultado = mysqli_query($con, $query2);
                                        $i = 1;
                                        while ($row = $resultado->fetch_array()) {
                                            $Cuatrimestre = $row['Cuatrimestre'];
                                            if ($i > 0 && $i < 7) {
                                                echo '<option value="' . $Cuatrimestre . '">' . $Cuatrimestre . '</option>';
                                            }
                                            $i++;
                                            ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="renglon IG" style="margin-top: 10px; font-weight: bold">
                                    <h10>Cuatrimestre:</h10>
                                    <select name="Cuatri" onchange="cuatrimestre()" style="padding: 10px 5px;">
                                        <option value="" disabled selected>Selecciona tu cuatrimestre</option>
                                        <?php
                                        $query2 = "SELECT DISTINCT Cuatrimestre FROM grupo";
                                        $resultado = mysqli_query($con, $query2);
                                        $i = 1;
                                        while ($row = $resultado->fetch_array()) {
                                            $Cuatrimestre = $row['Cuatrimestre'];
                                            if ($i > 6 && $i < 12) {
                                                echo '<option class="" value="' . $Cuatrimestre . '">' . $Cuatrimestre . '</option>';
                                            }
                                            $i++;
                                            ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="renglons Grupo" style="margin-top: 15px; font-weight: bold">
                                    <h10>Selecciona tu grupo:</h10>
                                    <select name="Grupo" style="padding: 10px 5px;"> <br>
                                        <option value="" disabled selected>Selecciona tu grupo</option>
                                    </select>
                                </div>
                                <?php
                                for ($i = 1; $i <= 22; $i++) {
                                    echo '<div class="renglons grupos' . $i . '" style="margin-top: 15px; font-weight: bold"><h10>Selecciona tu grupo:</h10> ';
                                    echo '<div style="">';

                                    echo '<select id="' . $i . '" name="grupo' . $i . '" onchange="grupillo(this)" style="padding: 10px 5px;">';
                                    echo '<option value="" disabled selected>Selecciona tu grupo</option>';
                                    $query2 = "SELECT id_grupo, Clave FROM grupo LIMIT " . (($i - 1) * 5) . ", 5";
                                    $resultado = mysqli_query($con, $query2);

                                    while ($row = $resultado->fetch_array()) {
                                        $id_grupo = $row['id_grupo'];
                                        $clave_grupo = $row['Clave'];
                                        echo '<option value="' . $id_grupo . '">' . $clave_grupo . '</option>';
                                    }

                                    echo '</select>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div style="margin: 0 auto;text-align: center; align-items: center">
                            <center>
                                <br> <br>

                                <input name="grupoF" id="grupoF" type="hidden">
                                <button class="botonSubir boton" onclick="finalizarSubida();" id="subir"
                                    data-sitekey="6LeX3xgnAAAAAFebwXHX9VvzviDi-B_T40u4qG_N"
                                    data-callback='finalizarSubida' data-action='submit'>Subir</button>
                            </center>
                            <br> <br>
                            <div align="left">
                                <label id="submitText"></label>
                            </div>
                        </div>
                </div>
                </form>
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
        <h5>Medio de contacto: contacto@behuse.com</h5>
    </div>
    <?php
    ini_set('log_errors', 1); // Habilita el registro de errores
    ini_set('error_log', 'archivo-de-registro.log'); // Especifica el nombre y la ubicación del archivo de registro
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $con = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME')) or die("Ocurrio un error al conectarse a la base de datos o servidor");

        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['Apellido_paterno'];
        $apellidoMaterno = $_POST['Apellido_materno'];
        $matricula = $_POST['matricula'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $pass = $_POST['pass2'];
        $genero = $_POST['genero'];
        $fecha_nacimiento = $_POST['Fecha_nacimiento'];
        $grupo = $_POST['grupoF'];
        $clave = password_hash($pass, PASSWORD_DEFAULT);
        $rol = 3;
        $imagen = 'user.png';
        $portada = 'Fondo.jpg';
        $activo = 1;
        $fecha_creacion = date('Y-m-d');
        $fecha_modificacion = null;

        //Variables de validaci+on
        $correoSAME = false;
        $matriculaSAME = false;
        $prepareMatricula = false;
        $prepareNombre = false;
        $prepareApellidoPaterno = false;
        $prepareApellidoMaterno = false;
        $prepareCorreo = false;
        $prepareTelefono = false;
        $prepareGenero = false;
        $prepareGrupo = false;
        $prepareClave = false;
        $prepareFecha_nacimiento = false;

        //EMPIEZA NOMBRE
    

        if ($nombre != "" && $nombre != null) {
            $prepareNombre = true;
        } else {
            $prepareNombre = false;
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! El nombre está vacío.<b> <br> ";
    </script>';
        }


        //TERMINA NOMBRE
    
        //EMPIEZA APELLIDO PATERNO
    

        if ($apellidoPaterno != "" && $apellidoMaterno != null) {
            $prepareApellidoPaterno = true;
        } else {
            $prepareApellidoPaterno = false;
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! El apellido paterno está vacío.<b> <br> ";
    </script>';
        }

        //TERMINA APELLIDO PATERNO
    
        //EMPIEZA APELLIDO Materno
    

        if ($apellidoMaterno != "" && $apellidoMaterno != null) {
            $prepareApellidoMaterno = true;
        } else {
            $prepareApellidoMaterno = false;
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! El apellido Materno está vacío.<b> <br> ";
    </script>';
        }

        //TERMINA APELLIDO Materno
    
        //Empieza MATRICULA
        if ($matricula != "" && $matricula != null) {
            if (preg_match('/[^0-9]/', $matricula)) {
                $prepareMatricula = false;
                echo '<script>
      document.getElementById("submitText").style.color = "red";
      document.getElementById("submitText").style.fontSize = "17px";
      document.getElementById("submitText").innerHTML += "<b>¡Error! La matrícula tiene carácteres no válidos.<b> <br>";
      </script>';
            } else {
                $consultaMATRICULA = "SELECT Matricula FROM usuario WHERE Matricula = '$matricula';";
                $matriculaREQUEST = mysqli_query($con, $consultaMATRICULA);
                while ($row = $matriculaREQUEST->fetch_array()) {
                    $matriculaBD = $row['Matricula'];

                    if (strtolower($matricula) == strtolower($matriculaBD)) {
                        $matriculaSAME = true;
                        echo '<script>
      document.getElementById("submitText").style.color = "red";
      document.getElementById("submitText").style.fontSize = "17px";
      document.getElementById("submitText").innerHTML += "<b>¡Error! La matrícula ya está registrada.<b><br>";
      </script>';
                    }
                }
            }
        } else {
            $prepareMatricula = false;
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! La matrícula está vacía.<b> <br>";
    </script>';
        }
        if ($matriculaSAME == false) {
            $prepareMatricula = true;
        } else {
            $prepareMatricula = false;
        }

        //TERMINA MATRICULA
    
        //EMPIEZA CORREO
        $regex = '/^(al|alu)\d{9,11}@gmail\.com$|^([A-Za-z0-9._]+)@utvtol\.edu\.mx$/i';
        if ($correo != "" && $correo != null) {
            if (!(preg_match($regex, $correo))) {
                echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! Ingresa con tu correo institucional. Usa \"@utvtol.edu.mx\" o \"al(tu matricula)@gmail.com\"</b><br>";
    </script>';
            } else {
                $consultaCORREO = "SELECT Correo FROM usuario WHERE correo = '$correo';";
                $correoREQUEST = mysqli_query($con, $consultaCORREO);
                while ($row = $correoREQUEST->fetch_array()) {
                    $correoBD = $row['Correo'];
                    if (strtolower($correo) == strtolower($correoBD)) {
                        $correoSAME = true;
                        echo '<script>
      document.getElementById("submitText").style.color = "red";
      document.getElementById("submitText").style.fontSize = "17px";
      document.getElementById("submitText").innerHTML += "<b>¡Error! El correo electrónico ' . $correo . ' ya está registrado.<b> <br>";
      </script>';
                    }
                }
            }
        } else {
            $prepareCorreo = false;
            echo '<script>
  document.getElementById("submitText").style.color = "red";
  document.getElementById("submitText").style.fontSize = "17px";
  document.getElementById("submitText").innerHTML += "<b>¡Error! El correo electrónico ' . $correo . ' está vacío.<b> <br>";
  </script>';
        }
        if ($correoSAME == false) {
            $prepareCorreo = true;
        } else {
            $prepareCorreo = false;
        }
        //TERMINA CORREO
    
        //EMPIEZA TELEFONO
        if ($telefono != "" && $telefono != null) {
            if (preg_match('/[^0-9]/', $telefono)) {
                $prepareTelefono = false;
                echo '<script>
      document.getElementById("submitText").style.color = "red";
      document.getElementById("submitText").style.fontSize = "17px";
      document.getElementById("submitText").innerHTML += "<b>¡Error! El teléfono tiene carácteres no válidos.<b> <br>";
      </script>';
            } else {
                $prepareTelefono = true;
            }
        } else {
            $prepareTelefono = false;
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! El teléfono está vacío.<b> <br>";
    </script>';
        }
        //TERMINA TELEFONO
    

        //EMPIEZA Clave
        if ($pass != "" && $pass != null) {
            $prepareClave = true;
        } else {
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! La contraseña está vacía.<b> <br>";
    </script>';
            $prepareClave = false;
        }
        //TERMINA Clave  
    

        //EMPIEZA Genero
        if ($genero != "" && $genero != null) {
            $prepareGenero = true;
        } else {
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! El género está vacía.<b> <br>";
    </script>';
            $prepareGenero = false;
        }
        //TERMINA Genero
    
        //EMPIEZA Fecha_nacimiento
    
        if ($fecha_nacimiento != "" && $fecha_nacimiento != null) {
            $prepareFecha_nacimiento = true;
        } else {
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! La fecha de nacimiento está vacía.<b> <br>";
    </script>';
            $prepareFecha_nacimiento = false;
        }
        //TERMINA Fecha_nacimiento
    
        //Empieza GRUPO
        if ($grupo != "" && $grupo != null) {
            if ($grupo > 0 && $grupo < 2116) {
                $prepareGrupo = true;
            } else {
                $prepareGrupo = false;
                echo '<script>
      document.getElementById("submitText").style.color = "red";
      document.getElementById("submitText").style.fontSize = "17px";
      document.getElementById("submitText").innerHTML += "<b>¡Error! GRUPO NO VÁLIDO.<b> <br>";
      </script>';
            }
        } else {
            $prepareGrupo = false;
            echo '<script>
    document.getElementById("submitText").style.color = "red";
    document.getElementById("submitText").style.fontSize = "17px";
    document.getElementById("submitText").innerHTML += "<b>¡Error! El grupo está vacío.<b> <br>";
    </script>';
        }

        $usuarioREGISTRADO = false;
        $registrocorrecto = false;
        //Termina GRUPO
        if ($prepareMatricula && $prepareNombre && $prepareApellidoPaterno && $prepareApellidoMaterno && $prepareCorreo && $prepareTelefono && $prepareGenero && $prepareGrupo && $prepareClave && $prepareFecha_nacimiento) {

            $query1 = "INSERT INTO `usuario` (`id_usuario`, `Correo`, `pass`, `Matricula`, `Foto`, `Portada`, `Nombre`, `Apellido_paterno`, `Apellido_materno`, `Genero`, `Fecha_nacimiento`, `Fecha_modificacion`, `Fecha_creacion`, `Telefono`, `Activo`, `id_rol`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query2 = "INSERT INTO `usurario_grupo` (`id_usuario_grupo`, `id_usuario`, `id_grupo`, `Activo`, `Fecha_inicio`, `Fecha_modificacion`) VALUES (NULL, ?, ?, ?, NULL, NULL)";
            $stmt1 = mysqli_prepare($con, $query1);
            if (!$stmt1) {
                $errorMessage = "Error, no se pudo preparar la primera consulta: " . mysqli_error($con);
                error_log($errorMessage, 3);
                die($errorMessage);
            }
            mysqli_stmt_bind_param($stmt1, "sssssssssssssii", $correo, $clave, $matricula, $imagen, $portada, $nombre, $apellidoPaterno, $apellidoMaterno, $genero, $fecha_nacimiento, $fecha_modificacion, $fecha_creacion, $telefono, $activo, $rol);
            $result1 = mysqli_stmt_execute($stmt1);
            if ($result1) {
                $usuarioREGISTRADO = true;
                $stmt2 = mysqli_prepare($con, $query2);
                if (!$stmt2) {
                    $errorMessage = "Error, no se pudo preparar la segunda consulta: " . mysqli_error($con);
                    echo '<script>
              document.getElementById("submitText").style.color = "white";
              document.getElementById("submitText").style.fontSize = "20px";
              document.getElementById("submitText").innerHTML = "<b>¡Error! El usuario no pudo ser registrado.<b> <br>";
              </script>';
                    error_log($errorMessage, 3);
                    die($errorMessage);
                }
                $userVerify = "SELECT id_usuario, Foto FROM usuario WHERE correo = '$correo';";
                $userCheck = mysqli_query($con, $userVerify);
                while ($row = $userCheck->fetch_array()) {
                    $usuarioGRUPO_Insert = $row['id_usuario'];
                    $foto = $row['Foto'];
                    if ($usuarioGRUPO_Insert == "") {
                        $usuarioREGISTRADO = false;
                    }
                }
                if ($usuarioREGISTRADO == false) {
                    echo '<script>
            document.getElementById("submitText").style.color = "white";
            document.getElementById("submitText").style.fontSize = "20px";
            document.getElementById("submitText").innerHTML = "<b>¡Error! El usuario no pudo ser registrado.<b> <br>";
            </script>';
                } else {
                    mysqli_stmt_bind_param($stmt2, "iii", $usuarioGRUPO_Insert, $grupo, $activo);
                    $result2 = mysqli_stmt_execute($stmt2);
                    if ($result2) {
                        $_SESSION['Logueado'] = true;
                        $_SESSION['id_rol'] = 3;
                        $_SESSION['registrado'] = true;
                        $_SESSION['id_usuario'] = $usuarioGRUPO_Insert;
                        echo "<script language='javascript'>window.location='/success/index.php'</script>;";
                    } else {
                        echo '<script>
                document.getElementById("submitText").style.color = "white";
                document.getElementById("submitText").style.fontSize = "20px";
                document.getElementById("submitText").innerHTML = "<b>¡Error! El usuario no pudo ser asignado a un grupo.<b> <br>";
                </script>';
                        $errorMessage = "Error, la segunda consulta falló: " . mysqli_stmt_error($stmt2);
                        $userDelete = "DELETE FROM usuario WHERE correo = ?";
                        $userNoFirst = mysqli_prepare($con, $userDelete);
                        mysqli_stmt_bind_param($userNoFirst, "s", $correo);
                        $result3 = mysqli_stmt_execute($userNoFirst);
                        if ($result3) {
                            echo '<script>
                  document.getElementById("submitText").style.color = "white";
                  document.getElementById("submitText").style.fontSize = "20px";
                  document.getElementById("submitText").innerHTML = "<b>¡Error! Registrese nuevamente.<b> <br>";
                  </script>';
                        }
                        error_log($errorMessage, 3);
                        die($errorMessage);
                    }
                    mysqli_stmt_close($stmt2);
                }

            } else {
                $errorMessage = "Error, la primera consulta falló: " . mysqli_stmt_error($stmt1);
                error_log($errorMessage, 3);
                die($errorMessage);
            }
            mysqli_stmt_close($stmt1);
            mysqli_close($con);
        } else {

        }
        exit;
    }

    ?>
    <script>

        var elementosSelect = document.querySelectorAll("select");
        var elementosInput = document.querySelectorAll("input");

        // Función a ejecutar cada vez que se produce un evento

        // Agregar los eventos input y onkeyup a los elementos <input>
        elementosInput.forEach(function (elemento) {
            elemento.addEventListener("input", ejecutarFuncion);
            elemento.addEventListener("keyup", ejecutarFuncion);
        });

        // Agregar los eventos change y click a los elementos <select>
        elementosSelect.forEach(function (elemento) {
            elemento.addEventListener("change", ejecutarFuncion);
            elemento.addEventListener("click", ejecutarFuncion);
        });


        // Función a ejecutar cada vez que se produce un evento
        function ejecutarFuncion() {
            verificar();
        }



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
            })) {
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
</body>

</html>