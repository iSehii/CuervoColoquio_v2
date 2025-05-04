<script>
var CancelarBTN, Telefono, TelefonoDiv, TelefonoL, GuardarBTN, NombreC, Label, Nombre, ApellidoP, ApellidoM, CancelarBTN, GuardarBTN, Genero, GeneroL, Matricula, MatriculaL, GeneroDiv, MatriculaDiv, FechaNacDiv, FechaNacL, FechaNacI;
window.addEventListener('load', function() {
        NombreC = document.getElementById('NombreC');
        Label = document.getElementById('LabelNombre');
        CancelarBTN = document.getElementById('CancelarBTN');
        GuardarBTN = document.getElementById('GuardarBTN');
        Nombre = document.getElementById('Nombre');
        ApellidoP = document.getElementById('Apellido_paterno');
        ApellidoM = document.getElementById('Apellido_materno');
        CancelarBTN = document.getElementById('CancelarBTN');
        GuardarBTN = document.getElementById('GuardarBTN');
        Genero = document.getElementById('GeneroI');
        GeneroL = document.getElementById('LabelGenero');
        Matricula = document.getElementById('MatriculaI');
        MatriculaL = document.getElementById('MatriculaL');
        GeneroDiv = document.getElementById('GeneroDiv');
        MatriculaDiv = document.getElementById('MatriculaDiv');
        FechaNacDiv = document.getElementById('FechaNacDiv');
        FechaNacL = document.getElementById('FechaNacL');
        FechaNacI = document.getElementById('Fecha_NacimientoI');
        Telefono = document.getElementById('Telefono');
        TelefonoL = document.getElementById('TelefonoL');
        TelefonoDiv = document.getElementById('TelefonoDiv');
});
var nombreCVisible = false;
var generoVisible = false;
var MatriculVisible = false;
var guardarVisible = false;
var cancelarVisible = false;
var telefonoVisible = false;
var FechaNacVisible = false;
function EditarCajas() {
  cancelarVisible=true;
  CancelarBTN.style.display = "inline";
  GuardarBTN.style.display = "inline";
    var alta = document.getElementById('alta');
alta.classList.remove('altaHide');
alta.style.animation = "Mostrar 0.3s linear forwards";
  GuardarBTN.classList.add('BotonGuardar');
  CancelarBTN.classList.add('BotonCancelar');
}

function Cancelar() {
    var alta = document.getElementById('alta');
    alta.style.animation = "MostrarNo 1s linear forwards";
          if (telefonoVisible===true) {
            telefonoVisible = false;
            TelefonoDiv.classList.remove('paddingDiv');
            TelefonoDiv.classList.add('ReversepaddingDiv');
            Telefono.classList.remove('focus-animationF');
            TelefonoL.classList.remove('focusLabel');
            Telefono.classList.add('focus-animationReverseF');
            TelefonoL.classList.add('focusLabelReverseN');
          }
          if (cancelarVisible===true) {
            cancelarVisible = false;
            CancelarBTN.classList.remove('BotonCancelar');
            GuardarBTN.classList.remove('BotonGuardar');
            GuardarBTN.classList.add('CancelGuardar');
            CancelarBTN.classList.add('CancelCancelar');
          }

            if (nombreCVisible == true) {
            nombewVisible=false;
            NombreC.classList.remove('paddingDiv');
            NombreC.classList.add('ReversepaddingDiv');
            Nombre.classList.add('focus-animationReverseF');
            Nombre.classList.remove('focus-animationF');
            ApellidoP.classList.remove('focus-animationF');
            ApellidoM.classList.remove('focus-animationF');
            ApellidoM.classList.add('focus-animationReverseF');
            ApellidoP.classList.add('focus-animationReverseF');
            Label.classList.add('focusLabelReverseN');
            Label.classList.remove('focusLabel');
            }

            if (generoVisible==true) {
            generoVisible=false;
            GeneroDiv.classList.remove('paddingDiv');
            GeneroDiv.classList.add('ReversepaddingDiv');
            Genero.classList.remove('focus-animationF');
            GeneroL.classList.remove('focusLabel');
            Genero.classList.add('focus-animationReverseF');
            GeneroL.classList.add('focusLabelReverseN');
            }

          if (MatriculVisible==true) {
            MatriculVisible=false;
            MatriculaDiv.classList.remove('paddingDiv');
            MatriculaDiv.classList.add('ReversepaddingDiv');
            Matricula.classList.remove('focus-animationF');
            MatriculaL.classList.remove('focusLabel');
            Matricula.classList.add('focus-animationReverseF');
            MatriculaL.classList.add('focusLabelReverseN');
          }

          if (FechaNacVisible==true) {
            FechaNacVisible=false;
            FechaNacDiv.classList.remove('paddingDiv');
            FechaNacDiv.classList.add('ReversepaddingDiv');
            FechaNacI.classList.remove('focus-animationF');
            FechaNacL.classList.remove('focusLabel');
            FechaNacI.classList.add('focus-animationReverseF');
            FechaNacL.classList.add('focusLabelReverseN');
          }


}
    function NombreCompleto() {
        EditarCajas();
        nombreCVisible = true;

        NombreC.classList.remove('ReversepaddingDiv');
        Nombre.classList.add('focus-animationF');
        NombreC.classList.add('paddingDiv');
        ApellidoP.classList.add('focus-animationF');
        ApellidoM.classList.add('focus-animationF');
        Label.classList.add('focusLabel');
        }

        function genero() {
          EditarCajas();
            generoVisible = true;
            GeneroDiv.classList.add('paddingDiv');
            Genero.classList.add('focus-animationF');
            GeneroL.classList.add('focusLabel');
        }
        function Matricul() {
            EditarCajas();
            MatriculVisible = true;
            Matricula.classList.add('focus-animationF');
            MatriculaDiv.classList.add('paddingDiv');
            MatriculaL.classList.add('focusLabel');
        }
        function FechaNacimiento() {
          EditarCajas();
            FechaNacVisible = true;
            FechaNacDiv.classList.add('paddingDiv');
            FechaNacL.classList.add('focusLabel');
            FechaNacI.classList.add('focus-animationF');
}

        function telefono() {
          EditarCajas();
          telefonoVisible = true;
          TelefonoDiv.classList.add('paddingDiv');
          TelefonoL.classList.add('focusLabel');
          Telefono.classList.add('focus-animationF');
        }
    telefonoBox = false;
    function Actualizar() {
        if (telefonoVisible == true) {
            telefonoBox=true;
        }
}
</script>