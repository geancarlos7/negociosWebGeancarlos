<h2>Trabajar con Materiales</h2>

<!-- $htmlDatos["materialeMode"] = "";
    $htmlDatos["idmateriales"] = "";
    $htmlDatos["descripcion"]="";
    $htmlDatos["estado"]="";-->

<div class="col12 right clean">
  <a href="index.php?page=materiale&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col4 hd">Código</div>
    <div class="col4 hd">Empresa</div>
    <div class="col4 hd">Estado</div>
    
  </div>
  {{foreach materiales}}
  <div class="row">
    <div class="col4">{{idmateriales}}</div>
        <div class="col4">{{descripcion}}</div>
        <div class="col2">{{estado}}</div>
      <div class="col2">
      <a href="index.php?page=materiale&acc=upd&idmateriales={{idmateriales}}">Update</a> |
      <a href="index.php?page=materiale&acc=dlt&idmateriales={{idmateriales}}">Delete</a>
    </div>
  </div>
  {{endfor materiales}}
</div>
