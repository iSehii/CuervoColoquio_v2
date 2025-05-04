<style>
    .Publi {}
</style>

<div class="Contenido">
    <div class="centro categoriasCARRERA">
        <div class="contenedorCat">
            <h1>Desarrollo de Software Multiplataforma</h1>
            <h3>Aquí encontrarás las publicaciones y usuarios de la carrera</h3>
            <div class="contenedorCat">
                <div class="Filtros">
                    <div class="FiltrarPor">
                        Filtrar publicaciones:
                    </div>
                    <div class="Filtrado">
                        <a href="/" style="border-radius: 5px 0px 0px 5px; border-left: 1px solid rgb(193, 187, 255);">
                            <div>
                                Recientes
                            </div>
                        </a>
                        <a href="/?filtro=desc">
                            <div>
                                Menos reciente
                            </div>
                        </a>
                        <div id="CuatrimestreA" onmouseover="MostrarCuatrimestre()" onmouseout="OcultarCuatrimestre()">
                            <div>
                                Cuatrimestre
                            </div>
                            <div id="CuatrimestreF" class="CuatrimestreF">
                                <?php
                                for ($i = 1; $i <= 11; $i++) {
                                    echo '
                                    <script>
                                    function cu' . $i . '() {
                                    window.location.href = "/?filtro=cu&cuatrimestre=' . $i . '";
                                    }
                                    </script>
                                    ';
                                }

                                ?>
                                <li onclick="cu1()">Primero</li>
                                <li onclick="cu2()">Segundo</li>
                                <li onclick="cu3()">Tercero</li>
                                <li onclick="cu4()">Cuarto</li>
                                <li onclick="cu5()">Quinto</li>
                                <li onclick="cu6()">Sexto</li>
                                <li onclick="cu7()">Séptimo</li>
                                <li onclick="cu8()">Octavo</li>
                                <li onclick="cu9()">Noveno</li>
                                <li onclick="cu10()">Décimo</li>
                                <li onclick="cu11()">Onceavo</li>
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
                                <?php
                                $Carreras = new Carreras();
                                $Carreras->Carreras();

                                for ($i = 0; $i < $Carreras->getTotal(); $i++) {
                                    echo '
                                    <script>
                                    function c' . $Carreras->getIdCarrera($i) . '() {
                                    window.location.href = "/?filtro=c&carrera=' . $Carreras->getIdCarrera($i) . '";
                                    }
                                    </script>
                                    ';
                                    echo '
                                    <li onclick="c' . $Carreras->getIdCarrera($i) . '()">
                                    ' . $Carreras->getClave($i) . '
                                    </li>';
                                }
                                ?>
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
                    $valor = 2;
                    $Publicaciones = new Publicaciones();
                    $UsuarioPublicacion = new Usuario();
                    $consulta = "dsm";
                    $Publicaciones->Publicaciones($consulta, $valor);
                    for ($i = 0; $i < $Publicaciones->getTotal(); $i++) {
                        $UsuarioPublicacion->setUser($Publicaciones->getIdUsuario($i));
                        ?>
                        <div class="FinalPublicacion">
                        </div>
                        <div class="PublicacionesTODAS">
                            <?php $Respuestas = new Respuestas();
                            $Respuestas->cantidadRespuestas($Publicaciones->getIdPublicacion($i));
                            ?>
                            <label class="VistasP"><label>
                                    <?php echo $Respuestas->getCantidadRespuestas(0); ?> respuestas
                                </label></label>
                            <article class="NumeroPTitulo">
                                <a href="publicaciones/publicacion?id=<?php echo $Publicaciones->getIdPublicacion($i); ?>">
                                    <span class="TituloP">
                                        <?php echo htmlspecialchars($Publicaciones->getTitulo($i)); ?>
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
                                <div class="CreacionModificaciones" onmouseout="<?php echo 'UsuarioPHoverOut' . $i; ?>()">
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
                                            <?php
                                            $fechaCreacion = strtotime($Publicaciones->getFechaCreacion($i));
                                            $fechaModificacion = strtotime($Publicaciones->getFechaModificacion($i));
                                            $now = time();

                                            if ($fechaCreacion == $fechaModificacion) {
                                                echo "No se han hecho modificaciones.";
                                            } else {
                                                $differenceModificacion = $now - $fechaModificacion;

                                                if ($differenceModificacion >= 86400) { // Más de un día
                                                    $daysModificacion = floor($differenceModificacion / 86400);
                                                    echo "Última modificación: $daysModificacion día(s) atrás.";
                                                } elseif ($differenceModificacion >= 3600) { // Más de una hora
                                                    $hoursModificacion = floor($differenceModificacion / 3600);
                                                    echo "Última modificación: $hoursModificacion hora(s) atrás.";
                                                } elseif ($differenceModificacion >= 60) { // Más de un minuto
                                                    $minutesModificacion = floor($differenceModificacion / 60);
                                                    echo "Última modificación: $minutesModificacion minuto(s) atrás.";
                                                } else { // Menos de un minuto
                                                    echo "Última modificación: Hace unos segundos.";
                                                }
                                            }
                                            ?>
                                        </span>
                                        <article class="CreacionAP">

                                            <span>
                                                Publicado
                                                <?php
                                                $differenceCreacion = $now - $fechaCreacion;

                                                if ($differenceCreacion >= 86400) { // Más de un día
                                                    $daysCreacion = floor($differenceCreacion / 86400);
                                                    echo "hace $daysCreacion día(s).";
                                                } elseif ($differenceCreacion >= 3600) { // Más de una hora
                                                    $hoursCreacion = floor($differenceCreacion / 3600);
                                                    echo "hace $hoursCreacion hora(s).";
                                                } elseif ($differenceCreacion >= 60) { // Más de un minuto
                                                    $minutesCreacion = floor($differenceCreacion / 60);
                                                    echo "hace $minutesCreacion minuto(s).";
                                                } else { // Menos de un minuto
                                                    echo "hace unos segundos.";
                                                }
                                                ?>
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