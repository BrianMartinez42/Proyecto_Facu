$(document).ready(function(){
  let res = document.querySelector('#resultado');

  res.innerHTML='';
  fetch('php/datos.php')
  .then(res => res.json())
  .then(data => {
    datos = data.alumno;
    console.log(datos);

    for (let item of datos) {
      res.innerHTML+=`
      <tr>
        <th class="table-light" hidden>${item.id}</th>
        <th class="table-light">${item.nombre}</th>
        <th class="table-light">${item.apellido}</th>
        <th class="table-light">${item.dni}</th>
        <th class="table-light">${item.fecha_nac}</th>
        <th class="table-light">${item.sexo}</th>
        <th class="text-center table-light"><a class="btn btn-info">Editar</a><a class="btn btn-danger">Borrar</a></th>
      </tr>
      `
    }
  });
});

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
  const fila = e.target.parentNode.parentNode
  const id = fila.firstElementChild.innerHTML

  //LE PASO LA ID COMO PARAMETRO USANDO METODO GET/DELETE
  fetch('php/borrar.php?aid=' + id,{
    method:'DELETE'
  })
  .then((response) => response.json())
  //SI EL JSON ME TRAE EL VALOR SUCCES, MUESTRO UN MENSAJE DE CONFIRMACION, SINO, MUESTRO EL ERRO POR CONSOLA
  .then((result) => {
    if (result.delete == 'success') {
        alert('Alumno eliminado');
        location.reload();
    } else {
        console.log('error');
        console.log(res);
    }
  })
  .catch((error)=>{
    console.log(error);
  });
})
