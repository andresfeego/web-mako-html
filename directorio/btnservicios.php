		<div class="search1" >

				<form name="form2" onkeyup="return anular(event)">
					<input class="inputbus" type="text" name="serviciobuscado"  value="Busqueda por productos y servicios" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Busqueda por proudctos y servicios';}">
					
									<div class="btnbuscar" onclick="from(document.form2.serviciobuscado.value,'contenido','busquedaservicio.php');"></div>

				</form>
			</div>