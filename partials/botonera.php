<div class="form-group container arriba">
	<div class="row">
		<div class="col-md-6">
			<input class="btn btn-sm btn-primary inactiva" type="submit" name="guardar" id="guardar" value="Guardar">
			<?php if ($datosbot[id]) {
				echo'<script>inactiva();</script>';
				?>
				<input class="btn btn-sm btn-warning activa " type="button" name="modificar" id="modificar" value="Modificar" onclick="inactiva(1)">
				<input class="btn btn-sm btn-danger float-right inactiva" type="submit" name="eliminar" id="eliminar" value=" Eliminar">
			<?php }else{?>
				<input class="btn btn-sm btn-secondary inactiva" type="button" name="limpiar" id="limpiar" value="limpiar" onclick="limpiarcampos()">
			<?php } ?>
		</div>
	</div>
</div>