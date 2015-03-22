<h2>Trabajar con Categorías</h2>
<a href="index.php?page=category&acc=ins">Nuevo</a>
<table>
  <tr>
    <th>Código</th>
    <th>Categoría</th>
    <th>Estado</th>
    <th>Acciones</th>
  </tr>
  {{foreach categorias}}
  <tr>
    <td>{{ctgid}}</td>
    <td>{{ctgdsc}}</td>
    <td>{{ctgest}}</td>
    <td>
      <a href="index.php?page=category&acc=upd&ctgid={{ctgid}}">Update</a> | 
      <a href="index.php?page=category&acc=dlt&ctgid={{ctgid}}">Delete</a>
    </td>
  </tr>
  {{endfor categorias}}
</table>
