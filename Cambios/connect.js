let res = document.querySelector('#resultado');
function traer() {
  res.innerHTML='';
  fetch('datos.php')
  .then(res => res.json())
  .then(data => {
    datos = data.alumno;
    console.log(datos);

    for (let item of datos) {
      res.innerHTML+=`
      <tr>
        <th>${item.nombre}</th>
        <th>${item.apellido}</th>
        <th>${item.dni}</th>
        <th>${item.fecha_nac}</th>
        <th>${item.sexo}</th>
      </tr>
      `
    }
  });
}
