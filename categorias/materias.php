<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
#Sugerencia {
    background-color: rgb(201, 230, 255);
    width: 56.3%;
    padding: 5px 10px;
    position: absolute;
    margin-left: 10.2%;
    visibility: hidden;
    text-align: left;
    margin-top: -25px;
}
.contenedor li:hover {
    background-color: white;
    padding-left: 20px;
margin-left: -43px;
}
.contenedor label {
    border-radius: 3px 3px 0px 0px;
    width: 100%;
    margin-left: -10px;
    background-color: azure;
    padding-bottom: 3px;
    padding-left: 4px;
    position: absolute;
    margin-top: -5px;
}
.contenedor li {
    list-style: none;
    padding: 5px 2px;
    margin-left: -25px;
}
.contenedor ul {
    padding-top: 1.5px;
    text-decoration: none;
    padding-bottom: 0px;
    margin-bottom: -0px;
}
#ssearchInput {
    width: 70%;
    margin-bottom: 25px;
    padding: 10px 20px;
}
table {
    margin: 0 auto;
    padding: 10px 20px;
    width: 90%;
}
table th {
    background-color: gray;
    color: white;
    border: 1px solid black;
    padding: 5px 10px;
    font-weight: bold;
}
table td {
    padding: 10px 13px;
    background-color: aliceblue;
}
.ResultadoBB,
.Materias {
    justify-content: center;
    align-items: center;
    align-content: center;
    margin: 0 auto;
    width: 100%;
}
</style>
<div class="Contenido">
    <div class="centro">
        <div class="contenedorCat">
            <h1>Grupos</h1>
            <h3>Encuentra las materias que tiene un grupo o que cursa un usuario</h3>
            <h3 style="font-size: 20px">
            </h3>
<div class="Materias" style="color: black">
    <input type="hidden" id="ClickG" value="">
    <input type="text" id="ssearchInput" oninput="" placeholder="Busca publicaciones, usuarios o grupos">
    <div id="Sugerencia"class="Sugerencia"></div>
    <div class="ResultadoBB" id="searchResultss"></div>
    <script>
    function grupillo(liElement) {
        var selectId = liElement.getAttribute('value');
        if (selectId != "") {
            document.getElementById("ClickG").value = selectId;
            document.getElementById("ssearchInput").dispatchEvent(new Event('input'));
            document.getElementById("ssearchInput").value = "";
            document.getElementById("ClickG").value = "";
            
        }
    }
    
    </script>
    <script>
        $(document).ready(function () {
            $('#ssearchInput').on('input', function () {
                var searchText = $(this).val().trim();
                var otherValue = $('#ClickG').val(); // Obtiene el valor de ClickG
                if (searchText !== '') {
                    $.ajax({
                        url: '/categorias/materiasBuscar.php',
                        method: 'POST',
                        data: { searchText: searchText, ClickG: otherValue }, // Usa otherValue
                        success: function (response) {
                            $('#searchResultss').html(response);
                        }
                    });
                } else {
                    $('#searchResultss').html('');
                }
            });
        });
    </script>


            <div>



<?php


?>

</div>

                </div>
            </div>
        </div>
    </div>