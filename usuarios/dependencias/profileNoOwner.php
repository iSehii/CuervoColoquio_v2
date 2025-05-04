

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
                <div class="Edit" style="visibility: hidden">
                        <label for="input-imagen" id="nombre-imagen" class="material-symbols-outlined">
                            edit
                        </label>
                        <input name="imagen" type="file" id="input-imagen" accept="image/*"
                            onchange="">
                </div>
            </div> <br>
            </div>
            <center>
                <div class="altaFoto hide" id="altaFoto">
                    <input type="hidden" value="1" name="Foto">
                    <button type="button" id="cancelarBtn" onclick="">Cancelar</button>
                    <button type="submit" id="guardarBtn" onclick="">Guardar</button>
                </div>


            </center>

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
                <div class="Dia_registro">
                    <label>Nombre completo:</label>
                    <label id="DiaRegistro">
                        <?php echo $UsuarioP->getNombre(); ?>
                    </label>
                    <label id="DiaRegistro">
                        <?echo $UsuarioP->getApellidoPaterno();?>
                    </label>
                    <label id="DiaRegistro">
                        <?echo $UsuarioP->getApellidoMaterno();?>
                    </label>   
                </div>
                <div class="Dia_registro">
                    <label>Género:</label>
                    <label id="DiaRegistro">
                        <?php echo $UsuarioP->getGenero(); ?>
                    </label>
                </div>
                <div class="Dia_registro">
                    <label>Matricula:</label>
                    <label id="DiaRegistro">
                        <?php echo $UsuarioP->getMatricula(); ?>
                    </label>
                </div>
                    <div class="Dia_registro">
                    <label>Fecha de nacimiento:</label>
                    <label id="DiaRegistro">
                        <?php echo $UsuarioP->getFechaNacimiento(); ?>
                    </label>
                </div>

                <div class="Dia_registro">
                    <label>Teléfono:</label>
                    <label id="DiaRegistro">
                        <?php echo $UsuarioP->getTelefono(); ?>
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
                        <label type="hidden" value="1" name="Datos">
                        <button type="submit" id="GuardarBTN">Guardar cambios</button>
                    </div>
                </center>
        </td>
    </tr>
    </form>