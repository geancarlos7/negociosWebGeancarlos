<h2>Trabajar con Unidades</h2>
<div class="col12 right clean">
  <a href="index.php?page=unidad&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col1 hd">Código</div>
    <div class="col2 hd">Unidad</div>
    <div class="col2 hd">Padre</div>
    <div class="col1 hd">Factor</div>
    <div class="col2 hd">Estado</div>
    <div class="col2 hd">Tipo</div>
    <div class="col2 hd">Acciones</div>
  </div>
  {{foreach unidades}}
  <div class="row">
    <div class="col1">{{undid}}</div>
    <div class="col2">{{unddes}}</div>
    <div class="col2">{{undprntdes}}</div>
    <div class="col1 right">{{undfprnt}}</div>
    <div class="col2">{{undest}}</div>
    <div class="col2">{{undtip}}</div>
    <div class="col2">
      <a href="index.php?page=unidad&acc=upd&undid={{undid}}">Update</a> |
      <a href="index.php?page=unidad&acc=dlt&undid={{undid}}">Delete</a>
    </div>
  </div>
  {{endfor unidades}}
</div>
