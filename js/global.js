function ocultarIzquierdaDesktop() {
  var izquierda = document.getElementById('izquierda');
  izquierda.classList.remove('izquierda');
  izquierda.classList.remove('visible');
  izquierda.classList.add('invisibleDesktop');
  setTimeout(function() {
    izquierda.classList.add('izquierda');
    izquierda.style.transform = "-100%";
    izquierda.classList.remove('invisibleDesktop');
  }, 300);
}
/*
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
*/
function categorias() {


}
function carreras () {


}
function materias() {

  
}

function usuarios() {


}
function publicaciones() {


}
function ocultarIzquierda() {
  var izquierda = document.getElementById('izquierda');
  izquierda.classList.remove('visible');
  izquierda.classList.remove('izquierda');
  izquierda.classList.add('invisible');
  setTimeout(function() {
    izquierda.classList.add('izquierda');
    izquierda.style.transform = "-100%";
    izquierda.classList.remove('invisible');
  }, 300);
}

var isIzquierdaVisible = false;

function Menu() {
  var menuElement = document.getElementById('menu');
  var izquierda = document.getElementById('izquierda');

  document.getElementById('menu').style.backgroundColor = "white";

  if (!isIzquierdaVisible) {
    izquierda.classList.add('visible');
    setTimeout(function() {
      isIzquierdaVisible = true;
    }, 300);

  } else {
    if (window.innerWidth > 798) {
      ocultarIzquierdaDesktop();
      isIzquierdaVisible = false;
    } else {
      ocultarIzquierda();
      isIzquierdaVisible = false;
    }
  }

  function handleMouseLeave(event) {
    if (!isIzquierdaVisible) {
      return;
    }
    var isMouseOutsideMenu = !menuElement.contains(event.target) && !menuElement.contains(event.relatedTarget);
    var isMouseOutsideIzquierda = !izquierda.contains(event.target) && !izquierda.contains(event.relatedTarget);

    if (isMouseOutsideMenu && isMouseOutsideIzquierda) {
      if (window.innerWidth > 798) {
        ocultarIzquierdaDesktop();
        isIzquierdaVisible = false;
      } else {
        ocultarIzquierda();
        isIzquierdaVisible = false;
      }
    }
  }

  document.addEventListener('click', handleMouseLeave);
}