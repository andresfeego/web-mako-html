

<?php include ("conexion.php");
 mysql_query("SET NAMES 'UTF8'");?>

  <?php mysql_select_db($baseDatos);?>
  <?php 
    $sql="select `ciudades`.`nombre`, `barrios`.`nombreBarrio`, `barrios`.`idBarrio` from  `ciudades`, `barrios` where `ciudades`.`id_ciudad`= `barrios`.`id_ciudad` order by  `nombreBarrio` asc ";
    $res=mysql_query($sql);
 	
 	

  ?>



<div class="serch1" >

        <div id="form2" onkeyup="return anular1(event)">
          
          <div class="element-input in4" ><label class="title" for="barriobuscado">Barrio:</label><input class="large" type="text" name="barriobuscado"  value="Buscar un barrio" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar un barrio';}"></div>
          
        </div>
        <div class="btnbuscar" onclick="from(document.form1.barriobuscado.value,'cajabarresult','busquedabar.php'); "></div>
      </div>


      <div class="reiniciar" onclick="from(false,'cajabarresult','cajabarinicio.php');"></div>
      <div class="catagery-slider in2" id="cajabarresult">
          

            <?php while ($fila=mysql_fetch_array($res)){ 

                 
              ?>
              <div class="categorias" onclick="ok1(<?php echo $fila['idBarrio']?>,'<?php echo $fila['nombre']."/".$fila['nombreBarrio']?>'); " value="<?php echo $fila['idBarrio']?>"><span  style="color:#908e8e"><?php echo $fila['nombre']."/"?></span><span  style="color: rgb(63, 196, 191)"><?php echo $fila['nombreBarrio']?></span></div>
              <br>
            <?php }?>


          
      </div>



 


