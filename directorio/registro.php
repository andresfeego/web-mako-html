
		<div style="width: 900px;margin: auto;">
			<div id="registro" class="registro">

				


				<form id="registrolocales" enctype="multipart/form-data" name="form1" class="formoid-flat-green" style="border-radius:0px 0px 50px 50px;  background-color:#b1b1b1;font-size:14px; sans-serif;color:#666666;" method="POST" action="../registro/registro2.php" >
					<div class="contform">
						<div class="element-input in2"><label class="title">Correo electrónico:<span class="required" aria-required="true">*</span></label><input  maxlength="50" placeholder="" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="large" title="Por favor introduce un correo con formato tucorreo@ejemplo.com" type="text" name="email1"  aria-required="true">        <div id="errormail" ></div></div>
						<div class="element-input in2"><label class="title">Contraseña:<span class="required" aria-required="true">*</span></label><input maxlength="70" placeholder="" title="." class="large" type="password" name="pass"  aria-required="true" required="required">        <div id="errorPass" ></div></div>
						<div class="element-input in2"><label class="title">Repite la contraseña:<span class="required" aria-required="true">*</span></label><input maxlength="70" placeholder="" title="." class="large" type="password" name="pass2"  aria-required="true" required="required">        <div id="errorPass2" ></div></div><div id="errorPass3" ></div>
						 
						<label class="title">Plan:<span class="required" aria-required="true">*</span></label> 
     					<select class="element-input in2" name="plan" onchange="validaplan();">	
     					<option value="0">selecciona un plan (ver planes en el menu)</option>
						<option value="1">Plan basico</option>
						<option value="2">Plan Bronce</option>
						<option value="3">Plan Plata</option>
						<option value="4">Plan oro</option>
						<option value="5">Tengo un codigo de obsequio</option>
     					</select><div id="errorPlan"></div>
     					<div id="codigoObs"></div><div id="errorCodigoObs"></div>
						<div class="btncontinuar button" onclick="validar(document.form1);">
								<span>Continuar con el registro ></span>
						</div>
					</div>
 					
 					<input type="hidden" name="codigo"/>
					
				</form>

				

			</div>
			<div class="imginfo">
				<img  style="margin-top:50px;"src="imagenes/comienza1.png" alt="">
				</div>
		</div>
