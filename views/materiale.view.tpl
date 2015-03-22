<h2>{{empresaTitle}}</h2>

<!-- $htmlDatos["materialeMode"] = "";
    $htmlDatos["idmateriales"] = "";
    $htmlDatos["descripcion"]="";
    $htmlDatos["estado"]="";-->

<a href="index.php?page=materiales">Listado de Materiales</a>
<form action="index.php?page=materiale&acc={{materialeMode}}" method="post">
  <div>
    <label class="col4" for="idmateriales">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{idmateriales}}"/>
    <input type="hidden" id="idmateriales" name="idmateriales" value="{{idmateriales}}"/>
  </div>
  <div>
    <label class="col4" for="descripcion">Material</label>
    <input class="col8" type="text" id="descripcion" name="descripcion" value="{{descripcion}}" {{disabled}}/>
  </div>

  <div>
    <label class="col4" for="estado">Estado</label>
    <select class="col8" id="estado" name="estado" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
    </select>
  </div>
  
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{empresaMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
