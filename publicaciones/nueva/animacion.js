var TituloVisible = false;
function FocoTitulo () {
    if (TituloVisible == false) {
        TituloVisible = true;
        var Label = document.getElementById('LabelTitulo');
        Label.classList.remove('LabelTitulo');
        Label.classList.add('TituloPublicacionFoco');
    } else {
        TituloVisible = false;
        Label.classList.add('LabelTitulo');
        Label.classList.remove('TituloPublicacionFoco');
    }
}