<h2>{{unidadTitle}}</h2>
<a href="index.php?page=unidades">Listado de Unidades</a>
<form action="index.php?page=unidad&acc={{unidadMode}}" method="post">
  <div>
    <label class="col4" for="undid">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{undid}}"/>
    <input type="hidden" id="undid" name="undid" value="{{undid}}"/>
  </div>
  <div>
    <label class="col4" for="unddes">Unidad</label>
    <input class="col8" type="text" id="unddes" name="unddes" value="{{unddes}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="undprnt">Unidad Padre</label>
    <select class="col8" id="undprnt" name="undprnt" {{disabled}}>
    {{foreach unidadesPadre}}
      <option value="{{undid}}" {{selected}}>
        {{unddes}}
      </option>
    {{endfor unidadesPadre}}
    </select>
  </div>
  <div>
    <label class="col4" for="undfprnt">Factor Padre</label>
    <input class="col8" type="text" id="undfprnt" name="undfprnt" value="{{undfprnt}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="undest">Estado</label>
    <select class="col8" id="undest" name="undest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
      <option value="DES" {{desSelected}}>Descontinuado</option>
    </select>
  </div>
  <div>
    <label class="col4" for="undtip">Tipo</label>
    <select class="col8" id="undtip" name="undtip" {{disabled}}>
      {{foreach unidadesTipo}}
        <option value="{{undTipId}}" {{selected}}>
          {{undTipDes}}
        </option>
      {{endfor unidadesTipo}}
    </select>
  </div>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{unidadMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
