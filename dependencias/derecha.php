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