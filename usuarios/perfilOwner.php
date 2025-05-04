<table style="">
    <tr class="FotoTable">
        <td colspan="3" style="border-radius: 10px 10px 0px 0px;">
            <div class="Foto">
                <div class="Edit" style="visibility: hidden">
                    <label>I</label><span class="material-symbols-outlined">
                        edit
                    </span>
                </div>
                <img src="../../files/Users/images/<?php echo $UsuarioP->getFoto(); ?>" alt="Imagen no disponible">
                <div class="Edit">
                    <span class="material-symbols-outlined">
                        edit
                    </span>
                </div>
                <h1>
                    <?php echo $UsuarioP->getNombre(); ?>
                </h1>
            </div> <br>
            </div>
        </td>
    </tr>
    <tr class="Tabs">
        <td colspan="1" align="center" class="selectedTab">
            Información
        </td>
        <td colspan="1" align="center">
            Publicaciones
        </td>
        <td colspan="1" align="center">
            Grupo
        </td>
    </tr>
    <tr>
        <td colspan="3" class="informacion selectedTab">
            <div id="NombreC">
                <label id="LabelNombre">Nombre completo:</label>
                <div class="inputs" onclick="NombreCompleto(); EditarCajas();">
                    <input autocomplete="nope" type="text" spellcheck="false" name="Nombre" id="Nombre"
                        value="<?php echo $UsuarioP->getNombre(); ?>">
                    <input autocomplete="nope" type="text" spellcheck="false" name="Apellido_paterno"
                        id="Apellido_paterno" value="<?php echo $UsuarioP->getApellidoPaterno(); ?>">
                    <input autocomplete="nope" type="text" spellcheck="false" name="Apellido_materno"
                        id="Apellido_materno" value="<?php echo $UsuarioP->getApellidoMaterno(); ?>">
                </div>
            </div><br>
            <div class="Genero" id="GeneroDiv" onclick="genero(); EditarCajas();">
                <label id="LabelGenero">Género:</label> <br>
                <div id="GeneroD"><input autocomplete="off" type="text" spellcheck="false" name="Genero" id="GeneroI"
                        value="<?php echo $UsuarioP->getGenero(); ?>"></div>
            </div><br>
            <div class="Matricula" id="MatriculaDiv" onclick="Matricul(); EditarCajas();">
                <label id="MatriculaL">Matrícula:</label>
                <div id="MatriculaD"> <input autocomplete="off" type="text" spellcheck="false" name="Matricula"
                        id="MatriculaI" value="<?php echo $UsuarioP->getMatricula(); ?>"></div>
            </div>
            <div class="Rol">
                <label>Tipo de usuario:</label>
                <label id="RolLabel">
                    <?php echo $UsuarioP->getIdRol(); ?>
                </label>
            </div>
            <div class="FechaNac" id="FechaNacDiv" onclick="FechaNacimiento(); EditarCajas();"
                onBlur="FechaNacimientoB();">
                <label id="FechaNacL">Fecha de nacimiento:</label>
                <div id="Fecha_NacimientoD"> <input spellcheck="false" type="date" id="Fecha_NacimientoI"
                        value="<?php echo $UsuarioP->getFechaNacimiento(); ?>"></div>
            </div>
            <div class="Dia_registro" onclick="genero(); EditarCajas();">
                <label>Día de registro:</label>
                <label id="DiaRegistro">
                    <?php echo $UsuarioP->getFechaCreacion(); ?>
                </label>
            </div> <br>
            <div class="Dia_registro" onclick="genero(); EditarCajas();">
                <label>Día de registro:</label>
                <label id="DiaRegistro">
                    <?php echo $UsuarioP->getFechaCreacion(); ?>
                </label>
            </div> <br>
        </td>
    </tr>
    <div class="alta">
        <tr>
            <td align="center" colspan="3" height="80px">
                <div>
                    <button id="CancelarBTN" onclick="Cancelar()">Cancelar</button>
                    <button id="GuardarBTN">Guardar cambios</button>

                </div>
            </td>
        </tr>
    </div>

</table>