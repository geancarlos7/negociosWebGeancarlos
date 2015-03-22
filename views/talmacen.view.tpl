<h2>{{talmacenesTitle}}</h2>
<!-- idtiposAlmacen
    descripcion-->

<a href="index.php?page=talmacenes">Listado de Tipos</a>
<form action="index.php?page=talmacen&acc={{talmacenesMode}}" method="post">
  <div>
    <label class="col4" for="idtiposAlmacen">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{idtiposAlmacen}}"/>
    <input type="hidden" id="idtiposAlmacen" name="idtiposAlmacen" value="{{idtiposAlmacen}}"/>
  </div>
  <div>
    <label class="col4" for="descripcion">Tipo</label>
    <input class="col8" type="text" id="descripcion" name="descripcion" value="{{descripcion}}" {{disabled}}/>
  </div>
  
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{talmacenesMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
