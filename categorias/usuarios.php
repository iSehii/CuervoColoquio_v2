<div class="Contenido">
    <div class="centro">
        <div class="contenedorCat">
            <h1>Usuarios</h1>
            <h3>Listado de usuarios</h3>
                <div>

<style>
    .User {
        margin: 0 auto;
        display: flex;
        align-items: center;
        align-content: center;
        align-self: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        flex-wrap: wrap;
    }
    .Usuarios {
        text-align: left;
        padding-top: 10px;
        padding-left: 15px;
        width: 25%;

        height: 100px;
        border: 1px solid gray;
        margin: 0 auto;
  background-size: cover;
  background-repeat: no-repeat;
}
</style>
    <div class="User">
        <?php $Usuarioos = new Usuarios();
        function getTiempo($fecha)
        {
            $timestamp = strtotime($fecha);
            $now = time();
            $difference = $now - $timestamp;

            if ($difference >= 86400) { // Más de un día
                $days = floor($difference / 86400);
                return "$days día(s)";
            } elseif ($difference >= 3600) { // Más de una hora
                $hours = floor($difference / 3600);
                return "$hours hora(s)";
            } elseif ($difference >= 60) { // Más de un minuto
                $minutes = floor($difference / 60);
                return "$minutes minuto(s)";
            } else { // Menos de un minuto
                return "unos segundos";
            }
        }
        
        $Usuarioos->getUsuarios(1, 0);
        for ($i=0; $i<$Usuarioos->totalUsers(); $i++) {
            ?>
            <div class="Usuarios" style="        background-image: url(/files/Users/images/<?php echo $Usuarioos->getPortada($i) ?>);">
            <?php echo $Usuarioos->getNombre($i); ?> <br>
            Registrado hace <?php echo getTiempo($Usuarioos->getFechaCreacion($i)); ?>
            <?php echo $Usuarioos->getIdRol($i) ?>
            </div>
            
            <?php
        }
        ?>
    </div>
                    <?php

                    
                    ?>

                </div>

            </div>
        </div>
    </div>
</div>