<?php
echo '<form action="agregar" method=POST>
  <div class="form-group">
    <label for="deudor">Nombre del deudor</label>
    <input type="text" class="form-control" id="deudor" name="deudor" required>
  </div>
  <div class="form-group">
    <label for="cuota">Numero de cuota</label>
    <input type="number" class="form-control" id="cuota" name="cuota" required>
  </div>
  <div class="form-group">
    <label for="cuota_capital">Cuota Capital</label>
    <input type="number" class="form-control" id="cuota_capital" name="cuota_capital" required>
  </div>
  <div class="form-group">
    <label for="fecha">Fecha de pago</label>
    <input type="date" class="form-control" id="fecha" name="fecha" required>
  </div>
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>';