$(document).ready(function(){
  cargarTabla();
});

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
        res.innerHTML+=`
        <tr>
          <td class="table-light" hidden>${item.id}</td>
          <td class="table-light">${item.nombre}</td>
          <td class="table-light">${item.apellido}</td>
          <td class="table-light">${item.dni}</td>
          <td class="table-light">${item.fecha_nac}</td>
          <td class="table-light">${item.sexo}</td>
          <td class="text-center table-light"><a class="btn btn-info">Editar</a><a class="btn btn-danger">Borrar</a></td>
        </tr>
        `
      }
    }
  })
  .catch((error) =>{
    show_message('error','No se pudo conectar.');
  })
}

//INSTANCIO LA CONSTANTE ON PARA PASAR 4 PARAMETROS Y USARLOS EN LOS BOTONES DE ACCION
const on = (element, event, selector, handler) => {
  element.addEventListener(event, e => {
    if (e.target.closest(selector)) {
      handler(e)
    }
  })
}

//UTILIZO LA CONSTANTE ON PARA BORRAR, USANDO AL BOTON POR SU CLASE CSS
on(document, 'click', '.btn-danger', e =>{
  if (confirm('Seguro que quiere eliminar?')) {
    const fila = e.target.parentNode.parentNode
    const id = fila.firstElementChild.innerHTML

    //LE PASO LA ID COMO PARAMETRO USANDO METODO GET/DELETE
    fetch('php/borrar.php?aid=' + id,{
      metdod:'DELETE'
    })
    .then((response) => response.json())
    //SI EL JSON ME TRAE EL VALOR SUCCESS, MUESTRO UN MENSAJE DE CONFIRMACION, SINO, MUESTRO EL ERROR POR CONSOLA
    .then((result) => {
      if (result.delete == 'success') {
          alert('Alumno eliminado.');
          cargarTabla();
      } else {
          console.log('error');
          console.log(res);
      }
    })
    .catch((error)=>{
      console.log(error);
    });
  } else {

  }
});
