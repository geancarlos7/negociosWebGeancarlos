<h2>Trabajar con Almacenes</h2>
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
<div class="col12 right clean">
  <a href="index.php?page=almacen&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col1 hd">Código</div>
    <div class="col1 hd">RTN</div>
    <div class="col2 hd">Almacen</div>
    <div class="col1 hd">Material</div>
    <div class="col1 hd">Sub Almacen</div>
    <div class="col2 hd">Direccion</div>
    <div class="col1 hd">Telefono</div>
    <div class="col1 hd">super Almacen</div>
    <div class="col1 hd">Empresa</div>
    <div class="col1 hd">Acciones</div>
  </div>
  {{foreach almacenes}}
  <div class="row">
    <div class="col1">{{idalmacenes}}</div>
    <div class="col1">{{rtn}}</div>
    <div class="col2">{{descripcion}}</div>
    <div class="col1">{{tipomaterial}}</div>
    <div class="col1">{{subalmacen}}</div>
    <div class="col1">{{direccion}}</div>
    <div class="col1">{{telefono}}</div>
    <div class="col1">{{idsuperalmacen}}</div>
    <div class="col1">{{idempresa}}</div>
    <div class="col2">
      <a href="index.php?page=almacen&acc=upd&idalmacenes={{idalmacenes}}">Update</a> |
      <a href="index.php?page=almacen&acc=dlt&idalmacenes={{idalmacenes}}">Delete</a>
    </div>
  </div>
  {{endfor almacenes}}
</div>
