<h2>{{categoryTitle}}</h2>
<a href="index.php?page=categorias">Listado de Categorías</a>
<form action="index.php?page=category&acc={{categoryMode}}" method="post">
  <div>
    <label class="col4" for="ctgid">Código</label>
    <input class="col8" type="text" disabled="disabled" id="ctgid" name="ctgid" value="{{ctgid}}"/>
    <input type="hidden" id="ctgid" name="ctgid" value="{{ctgid}}"/>
  </div>
  <div>
    <label class="col4" for="ctgdsc">Categoría</label>
    <input class="col8" type="text" id="ctgdsc" name="ctgdsc" value="{{ctgdsc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="ctgest">Estado</label>
    <select class="col8" id="ctgest" name="ctgest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
    </select>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{categoryMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
