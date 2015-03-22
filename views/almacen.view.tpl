<h2>{{almacenTitle}}</h2>
 <!--   */
    `almacenes` (
  `idalmacenes` INT NOT NULL AUTO_INCREMENT,
  `rtn` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `tipomaterial` VARCHAR(45) NULL,
  `subalmacen` VARCHAR(45) NULL,
  `direccion` VARCHAR(100) NULL,
  `telefono` BIGINT(10) NULL,
  `idsuperalmacen` BIGINT(8) NULL,
  `idempresa` VARCHAR(45) NULL,
  PRIMARY KEY (`idalmacenes`));
    */
    -->
<a href="index.php?page=almacenes">Listado de almacenes</a>
<form action="index.php?page=almacen&acc={{almacenMode}}" method="post">
  <div>
    <label class="col4" for="idalmacenes">Código</label>
    <input class="col8" type="text" disabled="disabled" value="{{idalmacenes}}"/>
    <input type="hidden" id="idalmacenes" name="idalmacenes" value="{{idalmacenes}}"/>
  </div>
   <div>
    <label class="col4" for="rtn">RTN</label>
    <input class="col8" type="text" id="rtn" name="rtn" value="{{rtn}}" {{disabled}}/>
  </div>
  <div>
  <div>
    <label class="col4" for="descripcion">Empresa</label>
    <input class="col8" type="text" id="descripcion" name="descripcion" value="{{descripcion}}" {{disabled}}/>
  </div>
     <label class="col4" for="tipomaterial">Material</label>
    <input class="col8" type="text" id="tipomaterial" name="tipomaterial" value="{{tipomaterial}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="subalmacen">subalmacen</label>
    <input class="col8" type="text" id="subalmacen" name="subalmacen" value="{{subalmacen}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="direccion">direccion</label>
    <input class="col8" type="text" id="direccion" name="direccion" value="{{direccion}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="telefono">telefono</label>
    <input class="col8" type="text" id="telefono" name="telefono" value="{{telefono}}" {{disabled}}/>
  </div>
      <label class="col4" for="idsuperalmacen">super almacen</label>
    <input class="col8" type="text" id="idsuperalmacen" name="idsuperalmacen" value="{{idsuperalmacen}}" {{disabled}}/>
  </div>
   </div>
      <label class="col4" for="idempresa">empresa</label>
    <input class="col8" type="text" id="idempresa" name="idempresa" value="{{idempresa}}" {{disabled}}/>
  </div>
  

  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{almacenMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
