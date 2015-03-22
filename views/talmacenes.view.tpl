<h2>Trabajar con Empresas</h2>
<div class="col12 right clean">
  <a href="index.php?page=talmacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col2 hd">Código</div>
    <div class="col5 hd">Tipo</div>
    <div class="col5 hd">Acciones</div>
  </div>
  {{foreach talmacenes}}
  <div class="row">
    <div class="col2">{{idtiposAlmacen}}</div>
        <div class="col5">{{descripcion}}</div>
    <div class="col5">
      <a href="index.php?page=talmacen&acc=upd&idtiposAlmacen={{idtiposAlmacen}}">Update</a> |
      <a href="index.php?page=talmacen&acc=dlt&idtiposAlmacen={{idtiposAlmacen}}">Delete</a>
    </div>
  </div>
  {{endfor talmacenes}}
</div>
