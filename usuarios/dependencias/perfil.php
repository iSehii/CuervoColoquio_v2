<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Datos'])) {
        if (isset($_POST['Nombre'])) {
            if ($_POST['Nombre'] != $UsuarioP->getNombre()) {
                $UsuarioP->updateNombre($_POST['Nombre'], $UsuarioP->getIdUsuario());
            }
        }

        if (isset($_POST['Apellido_Paterno'])) {
            if ($_POST['Apellido_Paterno'] != $UsuarioP->getApellidoPaterno()) {
                $UsuarioP->updateApellidoPaterno($_POST['Apellido_Paterno'], $UsuarioP->getIdUsuario());
            }
        }

        if (isset($_POST['Apellido_Materno'])) {
            if ($_POST['Apellido_Materno'] != $UsuarioP->getApellidoMaterno()) {
                $UsuarioP->updateApellidoMaterno($_POST['Apellido_Materno'], $UsuarioP->getIdUsuario());
            }
        }

        if (isset($_POST['Genero'])) {
            if ($_POST['Genero'] != $UsuarioP->getGenero()) {
                $UsuarioP->updateGenero($_POST['Genero'], $UsuarioP->getIdUsuario());
            }
        }

        if (isset($_POST['Matricula'])) {
            if ($_POST['Matricula'] != $UsuarioP->getMatricula()) {
                $UsuarioP->updateMatricula($_POST['Matricula'], $UsuarioP->getIdUsuario());
            }
        }

        if (isset($_POST['Fecha_Nacimiento'])) {
            if ($_POST['Fecha_Nacimiento'] != $UsuarioP->getFechaNacimiento()) {
                $fecha_nacimiento = $_POST['Fecha_Nacimiento']; // Obtener la fecha de nacimiento del formulario
                $fecha_nacimiento_formateada = date('Y-m-d', strtotime($fecha_nacimiento));
                $UsuarioP->updateFechaNacimiento($fecha_nacimiento_formateada, $UsuarioP->getIdUsuario());
            }
        }

        if (isset($_POST['Telefono'])) {
            if ($_POST['Telefono'] != $UsuarioP->getTelefono()) {
                $UsuarioP->updateTelefono($_POST['Telefono'], $UsuarioP->getIdUsuario());
            }
        }

        echo '<script>
            window.location.href = "/usuarios/' . $UsuarioP->getIdUsuario() . '/";
            </script>';
    }
    if (isset($_POST['Foto'])) {
        $matricula = $UsuarioP->getMatricula();

        $rutaCarpeta = '/kunden/homepages/36/d964441634/htdocs/public_html/files/Users/images/';

        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $nombreTemp = $_FILES['imagen']['tmp_name'];

            $nombreArchivo = $matricula . '.jpg';
            $rutaCompleta = $rutaCarpeta . $nombreArchivo;

            if (move_uploaded_file($nombreTemp, $rutaCompleta)) {
                echo 'Imagen subida y guardada exitosamente.';
                $UsuarioP->setFoto($UsuarioP->getIdUsuario(), $nombreArchivo);
                echo '<script>
            window.location.href = "/usuarios/' . $UsuarioP->getIdUsuario() . '/";
            </script>';

            } else {
                echo 'Error al mover el archivo subido.';
            }
        } else {
            switch ($_FILES['imagen']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo 'El archivo subido excede la directiva `upload_max_filesize` en php.ini.';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo 'El archivo subido excede la directiva `MAX_FILE_SIZE` que se especificó en el formulario HTML.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo 'El archivo subido fue solo parcialmente cargado.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo 'Ningún archivo fue subido.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo 'Falta una carpeta temporal.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo 'No se pudo escribir el archivo en el disco.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo 'Una extensión de PHP detuvo la subida del archivo.';
                    break;
                default:
                    echo 'Error desconocido al subir el archivo.';
            }
        }
    }
}
?>

<table style="">
    <tr class="FotoTable">
        <td colspan="3" style="border-radius: 0px 0px 0px 0px;" class="gradeant">
            <div class="Foto">
                <div class="Edit" style="visibility: hidden">
                    <label>I</label><span class="material-symbols-outlined">
                        edit
                    </span>
                </div>
                <div id="imagen-previsualizacion">
                    <img src="../../files/Users/images/<?php echo $UsuarioP->getFoto(); ?>" alt="Imagen no disponible">
                </div>
                <div class="Edit">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="input-imagen" id="nombre-imagen" class="material-symbols-outlined">
                            edit
                        </label>
                        <input name="imagen" type="file" id="input-imagen" accept="image/*"
                            onchange="mostrarNombreImagen(); mostrarAlta();">


                        <script>
                            var visibleAlta = false;
                            function mostrarAlta() {
                                var altaFoto = document.getElementById('altaFoto');
                                altaFoto.classList.add('mostrando');
                            }

                            function ocultarAlta() {
                                var altaFoto = document.getElementById('altaFoto');
                                altaFoto.classList.remove('mostrando');
                                altaFoto.style.animation = "Nomostrar 1.2s linear forwards";
                            }



                            let imagenSeleccionada = null;
                            const imagenPrevisualizacion = document.getElementById('imagen-previsualizacion');

                            function mostrarNombreImagen() {
                                const inputImagen = document.getElementById('input-imagen');

                                const archivo = inputImagen.files[0];
                                if (archivo) {
                                    const reader = new FileReader();
                                    reader.onload = function (event) {
                                        imagenSeleccionada = event.target.result;
                                        imagenPrevisualizacion.innerHTML = `<img src="${imagenSeleccionada}" alt="Imagen no disponible">`;
                                    };
                                    reader.readAsDataURL(archivo);
                                } else {
                                    imagenSeleccionada = null;
                                    imagenPrevisualizacion.innerHTML = `<img src="../../files/Users/images/<?php echo $UsuarioP->getFoto(); ?>" alt="Imagen no disponible">`;
                                }
                            }

                            function guardarImagen() {
                                if (imagenSeleccionada) {
                                    // Realiza la lógica de guardar la imagen en el servidor
                                    // Puedes usar el mismo enfoque anterior para enviar la imagen al servidor
                                }
                            }

                            function cancelars() {
                                imagenSeleccionada = null;
                                imagenPrevisualizacion.innerHTML = `<img src="../../files/Users/images/<?php echo $UsuarioP->getFoto(); ?>" alt="Imagen no disponible">`;
                                document.getElementById('input-imagen').value = '';
                            }
                        </script>
                </div>
            </div> <br>
            </div>
            <center>
                <div class="altaFoto hide" id="altaFoto">
                    <input type="hidden" value="1" name="Foto">
                    <button type="button" id="cancelarBtn" onclick="ocultarAlta();">Cancelar</button>
                    <button type="submit" id="guardarBtn" onclick="guardarImagen()">Guardar</button>
                </div>


            </center>
            </form>
            <center>
                <h1>
                    <?php echo $UsuarioP->getNombre(); ?>
                </h1>
            </center>
        </td>
    <tr>
        <td colspan="1"
            style="background-color: black; border-left: 2px solid aliceblu; border-right: 2px solid aliceblue">
            <div style="display: flex; justify-content: space-between; margin-left: 2px; margin-right: 2px">

                <div style="align-items: center; align-content: center; justify-content: center"><br>
                    <label id="ModificacionesPerfil">Última modificación hace
                        <?php
                        echo $UsuarioP->getTiempo($UsuarioP->getFechaModificacion());
                        ?>
                        </span>
                    </label>
                </div>
                <div>
                    <a href="curriculum/">
                        <button
                            style="padding: 7px 12px; margin: 2px; border-radius: 2px; background-color: aliceblue; cursor: pointer; border: 2px solid black;">Curriculum</button>
                    </a>
                </div>
            </div>
        </td>
    </tr>

    </tr>
    <br> <br>
    <tr>
        <td class="PublicacionesPerfil">
            <h2>
                <center>
                    Información
                </center>
            </h2>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="informacion selectedTab">
            <form action="" method="POST">
                <div id="NombreC">
                    <label id="LabelNombre">Nombre completo:</label>
                    <div class="inputs" onclick="NombreCompleto(); EditarCajas();">
                        <input autocomplete="nope" type="text" spellcheck="false" name="Nombre" id="Nombre"
                            value="<?php echo $UsuarioP->getNombre(); ?>">
                        <input autocomplete="nope" type="text" spellcheck="false" name="Apellido_Paterno"
                            id="Apellido_paterno" value="<?php echo $UsuarioP->getApellidoPaterno(); ?>">
                        <input autocomplete="nope" type="text" spellcheck="false" name="Apellido_Materno"
                            id="Apellido_materno" value="<?php echo $UsuarioP->getApellidoMaterno(); ?>">
                    </div>
                </div>
                <div class="Genero" id="GeneroDiv" onclick="genero(); EditarCajas();">
                    <label id="LabelGenero">Género:</label> <br>
                    <div id="GeneroD"><input autocomplete="off" type="text" spellcheck="false" name="Genero"
                            id="GeneroI" value="<?php echo $UsuarioP->getGenero(); ?>"></div> <br>
                </div>
                <div class="Matricula" id="MatriculaDiv" onclick="Matricul(); EditarCajas();">
                    <label id="MatriculaL">Matrícula:</label> <br>
                    <div id="MatriculaD"> <input autocomplete="off" type="text" spellcheck="false" name="Matricula"
                            id="MatriculaI" value="<?php echo $UsuarioP->getMatricula(); ?>"></div><br>
                </div>
                <div class="FechaNac" id="FechaNacDiv" onclick="FechaNacimiento(); EditarCajas();"
                    onBlur="FechaNacimientoB();">
                    <label id="FechaNacL">Fecha de nacimiento:</label>
                    <div id="Fecha_NacimientoD"> <input name="Fecha_Nacimiento" spellcheck="false" type="date"
                            id="Fecha_NacimientoI" value="<?php echo $UsuarioP->getFechaNacimiento(); ?>"></div><br>
                </div>
                <div id="TelefonoDiv" onclick="telefono(); EditarCajas();">
                    <label id="TelefonoL">Teléfono:</label>
                    <input spellcheck="false" name="Telefono" autocomplete="nope" type="text" id="Telefono"
                        value="<?php echo $UsuarioP->getTelefono(); ?>"><br>
                </div>
                <div class="Dia_registro">
                    <label>Día de registro:</label>
                    <label id="DiaRegistro">
                        <?php echo $UsuarioP->getFechaCreacion(); ?>
                    </label>
                </div>
                <div class="Rol">
                    <label>Tipo de usuario:</label>
                    <label id="RolLabel">
                        <?php if ($UsuarioP->getIdRol() == 1) {
                            echo "Administrador";
                        } else if ($UsuarioP->getIdRol() == 2) {
                            echo "Docente";
                        } else {
                            echo "Alumno";
                        } ?>
                    </label>
                </div>
                <div class="Dia_registro">
                    <label>Estado:</label>
                    <label id="DiaRegistro">
                        <?php echo $UsuarioP->getActivo(); ?>
                    </label>
                </div>
                <center>
                    <div id="alta" class="alta altaHide">
                        <button id="CancelarBTN" onclick="Cancelar(); event.preventDefault();">Cancelar</button>
                        <input type="hidden" value="1" name="Datos">
                        <button type="submit" id="GuardarBTN">Guardar cambios</button>
                    </div>
                </center>
        </td>
    </tr>
    </form>