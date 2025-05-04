var nombreBox = false;
var apBox = false;
var amBox = false;
var matriculaBox = false;
var correoBox = false;
var passwordBox = false;
var telefonoBox = false;
var generoBox = false;
var fecha_nacBox = false;
var carreraBox = false;
var cuatrimestreBox = false;
var grupoBox = false;
function telefonos() {
  if (document.getElementsByName('telefono')[0].value != "" && document.getElementsByName('telefono')[0].value.length == 10) {
    telefonoBox = true;
    celText.style.transition = "0.2s";
    celText.style.fontWeight = "bold";
    celText.style.color = "green";
    setTimeout(function() {
      celText.style.opacity = "0";
      setTimeout(function() {
        celText.style.transition = "0.2s";
        celText.innerHTML = "Ingresa un número válido";
      }, 300);
    }, 1000);
  } else {
    telefonoBox = false;
    celText.style.transition = "0.2s";
    celText.style.opacity = "1";
    celText.style.color = "red";
    celText.innerHTML = "Ingresa un número válido";
  }
}
function fecha() {
  var inputFecha = document.getElementsByName("Fecha_nacimiento")[0].value;
  var fechaIngresada = new Date(inputFecha);

  var fechaActual = new Date();

  fechaActual.setFullYear(fechaActual.getFullYear() - 16);
  
  if (fechaIngresada > fechaActual) {
    fecha_nacBox = false;
    dateText.style.transition = "0.2s";
    dateText.style.opacity = "1";
    dateText.style.color = "red";
    dateText.innerHTML = "Debes tener al menos 16 años";
  } else {
    fecha_nacBox = true;
    dateText.style.transition = "0.2s";
    dateText.style.fontSize = "13px";
    dateText.style.fontWeight = "bold";
    dateText.style.color = "green";
    setTimeout(function() {
      dateText.style.opacity = "0";
      setTimeout(function() {
        dateText.style.transition = "0.2s";
        dateText.innerHTML = "";
      }, 300);
    }, 300);
  }
}
function gener() {
  if (document.getElementsByName('genero')[0].value != "") {
    generoBox = true;
  } else {
    generoBox = false;
  }
}
function Apellidos () {
  var nombre = document.getElementsByName('nombre')[0].value;
  var ap = document.getElementsByName('Apellido_paterno')[0].value;
  var am = document.getElementsByName('Apellido_materno')[0].value;
  if (ap != "" && am != "" && nombre != "") {
    apBox = true;
    amBox = true;
    nombreBox = true;
  } 
  
  if (ap != "") {
    apBox = true;
  } else {
    apBox = false;
  }

  if (am != "") {
    amBox = true;
  } else {
    amBox = false;
  }
  
  if (nombre != "") {
    nombreBox = true;
  } else {
    nombreBox = false;
  }

}
function matriculas() {
  var matri = document.getElementsByName('matricula')[0].value;
  var matriText = document.getElementById('matriText');
  
  if (matri.length>8 && matri.length<11) {
    matriculaBox = true;
    matriText.style.transition = "0.2s";
    matriText.style.fontWeight = "bold";
    matriText.style.color = "green";
    setTimeout(function() {
      matriText.style.opacity = "0";
      setTimeout(function() {
        matriText.style.transition = "0.2s";
        matriText.innerHTML = "Ingresa una matrícula válida";
      }, 300);
    }, 1000);
  } else {
    matriculaBox = false;
    matriText.style.transition = "0.2s";
    matriText.style.opacity = "1";
    matriText.style.color = "red";
    matriText.innerHTML = "Ingresa una matrícula válida";
  }
}

function validarCorreo() {
  var correo = document.getElementsByName('correo')[0].value;
  var regex = /^(al|alu)\d{9,11}@gmail\.com$|^([A-Za-z0-9._]+)@utvtol\.edu\.mx$/i;
  if (regex.test(correo)) {
    correoBox = true;
    var correoText = document.getElementById('correoText');
    correoText.style.transition = "0.2s";
    correoText.style.fontWeight = "bold";
    correoText.style.color = "green";

    setTimeout(function() {
      correoText.style.opacity = "0";
      setTimeout(function() {
        correoText.style.transition = "0.2s";
        correoText.innerHTML = "Hola como estas";
      }, 300);
    }, 1000);

  } else {
    correoText = false;
    var correoText = document.getElementById('correoText');
    correoText.style.opacity = "1";
    correoText.style.transition = "0.2s";
    correoText.style.color = "red";
    correoText.style.width = "100%";
    correoText.innerHTML = "Ingresa con tu correo institucional. Usa '@utvtol.edu.mx' o 'al(tu matricula)@gmail.com' ";
  }
}


function validarpass() {
  var Pass = document.getElementById('pass').value;
  var Pass2 = document.getElementById('pass2').value;

  if (Pass == Pass2) {
    var passText = document.getElementById('passText');
    passText.style.transition = "1s";
    passText.style.fontWeight = "bold";
    passText.style.color = "green";
    passwordBox = true;
    setTimeout(function() {
      passText.style.opacity = "0";
    }, 1000);
  } else {
    passwordBox = false;
    var passText = document.getElementById('passText');
    passText.style.opacity = "1";
    passText.style.color = "red";
    passText.innerHTML = 'Las contraseñas no coinciden.';
  }
}
function Carrera(){
  cuatrimestre();
  var cuatriElements = document.getElementsByName('Cuatri');
  for (var i = 0; i < cuatriElements.length; i++) {
    cuatriElements[i].selectedIndex = 0;
  }
  
  carrera = document.getElementsByName('carrera')[0].value;
  if (carrera == 1 || carrera == 3) {
    carreraBox = true;
    document.getElementsByClassName('Cuatrimestre')[0].style.display = "none";
    document.getElementsByClassName('TSU')[0].style.display = "none";
    document.getElementsByClassName('IG')[0].style.display = "inline";
  } else if (carrera == 2 || carrera == 4) {
    carreraBox = true;
    document.getElementsByClassName('Cuatrimestre')[0].style.display = "none";
    document.getElementsByClassName('IG')[0].style.display = "none";
    document.getElementsByClassName('TSU')[0].style.display = "inline";
  } else {
    carreraBox = false;
  }
}
function cuatrimestre() {
  if (document.getElementsByName('Cuatri')[2].value != "" || document.getElementsByName('Cuatri')[1].value != "") {
    if (document.getElementsByName('Cuatri')[2].value == "" && document.getElementsByName('Cuatri')[1].value == "") {
      cuatrimestreBox = false;
    }
    for (var o = 1; o <= 22; o++) {
      var grupo = document.getElementsByName('grupo' + o);
      if (grupo[0].value != "") {
        document.getElementsByName('grupo'+o)[0].selectedIndex = 0;
      }
    }
  }  
  
  var cuatri = document.getElementsByName('Cuatri')[1].value;
  var cuatriIG = document.getElementsByName('Cuatri')[2].value;
  var carrera = document.getElementsByName('carrera')[0].value;
  if (cuatri == "" && cuatriIG=="") {
    cuatrimestreBox = false;
  } else {
  document.getElementsByClassName('Grupo')[0].style.display = "none";
  for (let i = 1; i <= 22; i++) {
    document.getElementsByClassName('grupos' + i)[0].style.display = "none";
  }
  if (cuatri != "" || cuatri != "") {
    cuatrimestreBox = true;
  }
  if (cuatri=="Primero" && carrera==2) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos1')[0].style.display = "inline";
  } else if (cuatri == "Segundo" && carrera == 2) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos2')[0].style.display = "inline";
  } else if (cuatri == "Tercero" && carrera == 2) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos3')[0].style.display = "inline";
  } else if (cuatri == "Cuarto" && carrera == 2) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos4')[0].style.display = "inline";
  } else if (cuatri == "Quinto" && carrera == 2) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos5')[0].style.display = "inline";
  } else if (cuatri == "Sexto" && carrera == 2) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos6')[0].style.display = "inline";
  } else if (cuatriIG=="Séptimo" && carrera==1) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos7')[0].style.display = "inline";
  } else if (cuatriIG == "Octavo" && carrera == 1) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos8')[0].style.display = "inline";
  } else if (cuatriIG == "Noveno" && carrera == 1) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos9')[0].style.display = "inline";
  } else if (cuatriIG == "Décimo" && carrera == 1) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos10')[0].style.display = "inline";
  } else if (cuatriIG == "Onceavo" && carrera == 1) {
    document.getElementsByClassName('grupos11')[0].style.display = "inline";
  } else if (cuatriIG=="Séptimo" && carrera==3) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos18')[0].style.display = "inline";
  } else if (cuatriIG == "Octavo" && carrera == 3) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos19')[0].style.display = "inline";
  } else if (cuatriIG == "Noveno" && carrera == 3) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos20')[0].style.display = "inline";
  } else if (cuatriIG == "Décimo" && carrera == 3) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos21')[0].style.display = "inline";
  } else if (cuatriIG == "Onceavo" && carrera == 3) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos22')[0].style.display = "inline";
  } else if (cuatri == "Primero" && carrera == 4) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos12')[0].style.display = "inline";
  } else if (cuatri=="Segundo" && carrera==4) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos13')[0].style.display = "inline";
  } else if (cuatri == "Tercero" && carrera == 4) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos14')[0].style.display = "inline";
  } else if (cuatri == "Cuarto" && carrera == 4) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos15')[0].style.display = "inline";
  } else if (cuatri == "Quinto" && carrera == 4) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos16')[0].style.display = "inline";
  } else if (cuatri == "Sexto" && carrera == 4) {
    cuatrimestreBox = true;
    document.getElementsByClassName('grupos17')[0].style.display = "inline";
  } else {
    cuatrimestreBox = false;
    document.getElementsByClassName('Grupo')[0].style.display = "inline";
  for (let i = 1; i <= 22; i++) {
    document.getElementsByClassName('grupos' + i)[0].style.display = "none";
  }
    for (var o = 1; o <= 22; o++) {
      var grupo = document.getElementsByName('grupo' + o);
      if (grupo[0].value != "") {
        document.getElementsByName('grupo'+o)[0].selectedIndex = 0;
      }
    }
    var cuatriElements = document.getElementsByName('Cuatri');
    for (var i = 0; i < cuatriElements.length; i++) {
      cuatriElements[i].selectedIndex = 0;
    }
  }
  }
  }
var cliqueado = true;
  function grupillo(select) {
    var selectId = select.value;
    if (selectId != "") {
      grupoBox = true;
    document.getElementById("grupoF").value = selectId;
  } else {
    grupoBox = false;
  }
}
  function finalizarSubida(token) {
    var variablesFalsas = [];
    if (!nombreBox) {
      variablesFalsas.push("Nombre");
    }
    
    if (!apBox) {
      variablesFalsas.push("Apellido paterno");
    }
    
    if (!amBox) {
      variablesFalsas.push("Apellido materno");
    }
    
    if (!matriculaBox) {
      variablesFalsas.push("Matrícula");
    }
    
    if (!correoBox) {
      variablesFalsas.push("Correo");
    }
    
    if (!passwordBox) {
      variablesFalsas.push("Contraseña");
    }
    
    if (!telefonoBox) {
      variablesFalsas.push("Teléfono");
    }
    
    if (!generoBox) {
      variablesFalsas.push("Género");
    }
    
    if (!fecha_nacBox) {
      variablesFalsas.push("Fecha de nacimiento");
    }
    
    if (!carreraBox) {
      variablesFalsas.push("Carrera");
    }
    
    if (!cuatrimestreBox) {
      variablesFalsas.push("Cuatrimestre");
    }
    
    if (!grupoBox) {
      variablesFalsas.push("Grupo");
    }
    
    document.getElementById('Formulario').addEventListener('submit', function(event) {
      if (variablesFalsas.length > 0) {
        cliqueado = false;
        event.preventDefault();
        document.getElementById('subir').classList.remove("boton");
        document.getElementById('subir').classList.remove("botonSubir");
        document.getElementById('subir').classList.add("botonN");        
        document.getElementById('submitText').style.color = "red";
        document.getElementById('submitText').style.fontSize = "17px";
        document.getElementById('submitText').innerHTML = "<b>¡Error! favor de verificar:<b> ";
        for (var i = 0; i < variablesFalsas.length; i++) {
          if (variablesFalsas.length == 1) {
          document.getElementById('submitText').innerHTML += variablesFalsas[i] + ".";
          } else {
          document.getElementById('submitText').innerHTML += variablesFalsas[i] + ", ";
        }}
      } else {
        document.getElementById('subir').classList.add("boton");
        document.getElementById('subir').classList.add("botonSubir");
        document.getElementById('subir').classList.remove("botonN");   
        document.getElementById('submitText').style.color = "green";
        document.getElementById('submitText').innerHTML = "";
        document.getElementById('Formulario').submit();
      }
    });    
  }

  function verificar() {
    if (cliqueado == false) {
      var variablesFalsas = [];
      if (!nombreBox) {
        variablesFalsas.push("Nombre");
      }
      
      if (!apBox) {
        variablesFalsas.push("Apellido paterno");
      }
      
      if (!amBox) {
        variablesFalsas.push("Apellido materno");
      }
      
      if (!matriculaBox) {
        variablesFalsas.push("Matrícula");
      }
      
      if (!correoBox) {
        variablesFalsas.push("Correo");
      }
      
      if (!passwordBox) {
        variablesFalsas.push("Contraseña");
      }
      
      if (!telefonoBox) {
        variablesFalsas.push("Teléfono");
      }
      
      if (!generoBox) {
        variablesFalsas.push("Género");
      }
      
      if (!fecha_nacBox) {
        variablesFalsas.push("Fecha de nacimiento");
      }
      
      if (!carreraBox) {
        variablesFalsas.push("Carrera");
      }
      
      if (!cuatrimestreBox) {
        variablesFalsas.push("Cuatrimestre");
      }
      
      if (!grupoBox) {
        variablesFalsas.push("Grupo");
      }
      if (variablesFalsas.length > 0) {
        document.getElementById('subir').classList.remove("boton");
        document.getElementById('subir').classList.remove("botonSubir");
        document.getElementById('subir').classList.add("botonN");        
        document.getElementById('submitText').style.color = "red";
        document.getElementById('submitText').style.fontSize = "17px";
        document.getElementById('submitText').innerHTML = "<b>¡Error! favor de verificar:<b> ";
        for (var i = 0; i < variablesFalsas.length; i++) {
          if (variablesFalsas.length == 1) {
          document.getElementById('submitText').innerHTML += variablesFalsas[i] + ".";
          } else {
          document.getElementById('submitText').innerHTML += variablesFalsas[i] + ", ";
        }}
      } else {
        document.getElementById('subir').classList.add("boton");
        document.getElementById('subir').classList.add("botonSubir");
        document.getElementById('subir').classList.remove("botonN");   
        document.getElementById('submitText').style.color = "green";
        document.getElementById('submitText').innerHTML = "";
      }
    } else {

    }
  }
