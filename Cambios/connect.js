document.addEventListener('DOMContentLoaded', funcionando, false);

function funcionando() {
  cargarTabla();
  ocultarModal();
}

function cargarTabla() {
  let res = document.querySelector('#resultado');

  //VACIO LO QUE CONTENGA EL DIV RESULTADO
  res.innerHTML='';
  fetch('php/datos.php')
  .then((res) => res.json())
  .then((data) => {
    //SI NO HAY DATOS EN LA BASE, QUE MUESTRE UN MENSAJE
    if (data['']) {
      res.innerHTML+=`
      <tr>
        <td class="table-light">No se encontraron datos en la base.</td>
      </tr>
      `
    } else {
      datos = data.alumno;
      console.log(datos);
      for (let item of datos) {

        //REEMPLAZO LA LETRA QUE TRAE SEXO POR SU PALABRA CORRESPONDIENTE
        switch (item.sexo) {
          case 'f':
            var sexo = 'Femenino';
            break;
          case 'm':
            var sexo = 'Masculino';
            break;
          default:
            var sexo = 'Indefinido';
        }
        res.innerHTML+=`
        <tr>
          <td class="table-light">${item.nombre}</td>
          <td class="table-light">${item.apellido}</td>
          <td class="table-light">${item.dni}</td>
          <td class="table-light">${item.fecha_nac}</td>
          <td class="table-light">${sexo}</td>
          <td class="text-center table-light"><a class="btn btn-info" onClick="modalModif(${item.id})">Editar</a><a class="btn btn-danger" onClick="baja(${item.id})">Borrar</a></td>
        </tr>
        `
      }
    }
  })
  .catch((error) =>{
    console.log(error,'No se pudo conectar.');
  })
};

function ocultarModal() {
  var modif = document.getElementById('modal-modif');
  modif.style.display = 'none';

  var alta = document.getElementById('modal-alta');
  alta.style.display = 'none';
}

//MOSTRAR MODAL ALTA
function modalAlta(){
  var ventana = document.getElementById('modal-alta');
  ventana.style.display= 'block';
}

//AGREGAR ALUMNO
function alta(){
  var nombre = document.getElementById('nombre-alta').value;
  var apellido = document.getElementById('apellido-alta').value;
  var dni = document.getElementById('dni-alta').value;
  var fecha_nac = document.getElementById('fecha-nac-alta').value;

  var radio = document.getElementsByName('sexo-alta');

  for(i=0; i<radio.length; i++){
    if(radio[i].checked){
      var sexo = radio[i].value;
    }
  }

  if (nombre === '' || apellido === '' || dni === '' || fecha_nac === '' || sexo === undefined) {
    alert('Por favor, llene todos los campos');
    return false;
  } else {
    var datos = {
      'nombre' : nombre,
      'apellido' : apellido,
      'dni' : dni,
      'fecha_nac' : fecha_nac,
      'sexo' : sexo
    }

    fetch('php/alta.php',{
      method : 'PUT',
      body : JSON.stringify(datos),
      headers : {
        'Content_type' : 'application/json',
      }
    })
    .then((response) => response.json())
    //SI EL JSON ME TRAE EL VALOR SUCCESS, MUESTRO UN MENSAJE DE CONFIRMACION, SINO, MUESTRO EL ERROR POR CONSOLA
    .then((result) => {
      if (result.insert == 'success') {
          alert('Datos cargados.');
          ocultarModal();
          cargarTabla();
      } else {
          console.log('error');
          console.log(response);
      }
    })
    .catch((error)=>{
      console.log(error);
    });
  }
}

//OBTENER DATOS PARA MODIFICAR
function modalModif(id){
  var ventana = document.getElementById('modal-modif');
  ventana.style.display= 'block';

  fetch('php/traer.php?id=' + id)
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    for (var i in data['alumno']) {
      document.getElementById('id-modif').value = data['alumno'][i].id;
      document.getElementById('nombre-modif').value = data['alumno'][i].nombre;
      document.getElementById('apellido-modif').value = data['alumno'][i].apellido;
      document.getElementById('dni-modif').value = data['alumno'][i].dni;
      document.getElementById('fecha-nac-modif').value = data['alumno'][i].fecha_nac;

      switch (sexo = data['alumno'][i].sexo) {
        case 'm':
          document.querySelector('#radio-modif-container > [value="m"]').checked = true;
          break;
        case 'f':
          document.querySelector('#radio-modif-container > [value="f"]').checked = true;
          break;
        default:
          document.querySelector('#radio-modif-container > [value="i"]').checked = true;
      }
    }
  })
  .catch((error) => {
    console.log(error);
  })
}

//MODIFICAR DATOS
function modificar(){
  var id = document.getElementById('id-modif').value;
  var nombre = document.getElementById('nombre-modif').value;
  var apellido = document.getElementById('apellido-modif').value;
  var dni = document.getElementById('dni-modif').value;
  var fecha_nac = document.getElementById('fecha-nac-modif').value;

  var radio = document.getElementsByName('sexo-modif');

  for(i=0; i<radio.length; i++){
    if(radio[i].checked){
      var sexo = radio[i].value;
    }
  }

  if (nombre === '' || apellido === '' || dni === '' || fecha_nac === '') {
    alert('Por favor, llene todos los campos');
    return false;
  } else {
    var datos = {
      'id' : id,
      'nombre' : nombre,
      'apellido' : apellido,
      'dni' : dni,
      'fecha_nac' : fecha_nac,
      'sexo' : sexo
    }

    fetch('php/modificar.php',{
      method : 'PUT',
      body : JSON.stringify(datos),
      headers : {
        'Content_type' : 'application/json',
      }
    })
    .then((response) => response.json())
    //SI EL JSON ME TRAE EL VALOR SUCCESS, MUESTRO UN MENSAJE DE CONFIRMACION, SINO, MUESTRO EL ERROR POR CONSOLA
    .then((result) => {
      if (result.update == 'success') {
          alert('Datos actualizados.');
          ocultarModal();
          cargarTabla();
      } else {
          console.log('error');
          console.log(response);
      }
    })
    .catch((error)=>{
      console.log(error);
    });
  }
}

//ELIMINAR DATOS
function baja(id){
  if (confirm('Seguro que quiere eliminar?')) {

    //LE PASO LA ID COMO PARAMETRO USANDO METODO GET/DELETE
    fetch('php/borrar.php?aid=' + id)
    .then((response) => response.json())
    //SI EL JSON ME TRAE EL VALOR SUCCESS, MUESTRO UN MENSAJE DE CONFIRMACION, SINO, MUESTRO EL ERROR POR CONSOLA
    .then((result) => {
      if (result.delete == 'success') {
          alert('Alumno eliminado.');
          cargarTabla();
      } else {
          console.log('error');
          console.log(response);
      }
    })
    .catch((error)=>{
      console.log(error);
    });
  } else {

  }
}
