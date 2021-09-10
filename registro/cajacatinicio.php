

<?php include ("conexion.php");
 mysql_query("SET NAMES 'UTF8'");?>

  <?php mysql_select_db($baseDatos);?>
  <?php 
    $sql="select * from  `categorias` order by  `nombre` asc ";
    $res=mysql_query($sql);
 	$rows = mysql_num_rows($res) ;
 	

  ?>



<div class="serch1" >

        <div id="form2" onkeyup="return anular(event)">
          
          <div class="element-input in4" ><label class="title" for="barriobuscado">Categoría:</label><input class="large" type="text" name="serviciobuscado"  value="Buscar una categoría" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar una categoría';}"></div>
          
        </div>
        <div class="btnbuscar" onclick="from(document.form1.serviciobuscado.value,'cajaresult','busquedacat.php'); "></div>
      </div>


      <div class="reiniciar" onclick="from(false,'cajaresult','cajacatinicio.php');"></div>
      <div class="catagery-slider in2" id="cajaresult">
          

            <?php while ($fila=mysql_fetch_array($res)){ 

                 $sql="select * from  `subcategoria1` where `id_categoria`=".$fila['idcategorias']." order by  `idsubcategoria1` asc ";
                  $res1=mysql_query($sql);

                    while ($fila1=mysql_fetch_array($res1)){ 
                        $sql="select * from  `subcategoria2` where `idsubcategoria1`=".$fila1['idsubcategoria1']." order by  `idsubcategoria2` asc ";
                        $res2=mysql_query($sql);

                        while ($fila2=mysql_fetch_array($res2)){ 
              ?>
              <div class="categorias" onclick="ok(<?php echo $fila2['idsubcategoria2']?>,'<?php echo $fila['nombre']."/".$fila1['nombre']."/".$fila2['nombre']?>'); " value="<?php echo $fila2['idsubcategoria2']?>"><span  style="color:#d6d0d0"><?php echo $fila['nombre']."/"?></span><span  style="color:#908e8e"><?php echo $fila1['nombre']."/"?></span><span  style="color: rgb(63, 196, 191)"><?php echo $fila2['nombre']?></span></div>
              <br>
            <?php }}}?>


          
      </div>



 


