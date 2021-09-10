
<?php include ("conexion.php");
	mysql_query("SET NAMES 'UTF8'");
	mysql_select_db($baseDatos); 
     $sql="select  `categorias`.`nombre` as n1, `subcategoria1`.`nombre` as n2, `subcategoria2`.`nombre` as n3, `subcategoria2`.`idsubcategoria2` FROM categorias,subcategoria1,subcategoria2 where `categorias`.`nombre`like '%".$_GET['id']."%' and `categorias`.`idcategorias`=`subcategoria1`.`id_categoria` and `subcategoria1`.`idsubcategoria1`=`subcategoria2`.`idsubcategoria1` order by  `categorias`.`nombre` asc ";
    $res=mysql_query($sql);


    $sql="select  `categorias`.`nombre` as n1, `subcategoria1`.`nombre` as n2, `subcategoria2`.`nombre` as n3, `subcategoria2`.`idsubcategoria2` FROM categorias,subcategoria1,subcategoria2 where `subcategoria1`.`nombre`like '%".$_GET['id']."%' and `categorias`.`idcategorias`=`subcategoria1`.`id_categoria` and `subcategoria1`.`idsubcategoria1`=`subcategoria2`.`idsubcategoria1` order by  `categorias`.`nombre` asc ";
    $res1=mysql_query($sql);


    $sql="select  `categorias`.`nombre` as n1, `subcategoria1`.`nombre` as n2, `subcategoria2`.`nombre` as n3, `subcategoria2`.`idsubcategoria2` FROM categorias,subcategoria1,subcategoria2 where `subcategoria2`.`nombre`like '%".$_GET['id']."%' and `categorias`.`idcategorias`=`subcategoria1`.`id_categoria` and `subcategoria1`.`idsubcategoria1`=`subcategoria2`.`idsubcategoria1` order by  `categorias`.`nombre` asc ";
    $res2=mysql_query($sql);
 	


  ?>

				<?php while ($fila2=mysql_fetch_array($res2)){ ?>

              <div class="categorias" onclick="ok(<?php echo $fila2['idsubcategoria2']?>,'<?php echo $fila2['n1']."/".$fila2['n2']."/".$fila2['n3']?>'); " ><span  style="color:#d6d0d0"><?php echo $fila2['n1']."/"?></span><span  style="color:#908e8e"><?php echo $fila2['n2']."/"?></span><span  style="color: rgb(63, 196, 191)"><?php echo $fila2['n3']?></span></div>
              <br>
            <?php }?>

            <?php while ($fila1=mysql_fetch_array($res1)){ ?>

              <div class="categorias" onclick="ok(<?php echo $fila1['idsubcategoria2']?>,'<?php echo $fila1['n1']."/".$fila1['n2']."/".$fila1['n3']?>'); " ><span  style="color:#d6d0d0"><?php echo $fila1['n1']."/"?></span><span  style="  color: rgb(63, 196, 191)"><?php echo $fila1['n2']."/"?></span><span  style="color:#908e8e"><?php echo $fila1['n3']?></span></div>
              <br>
            <?php }?>

            <?php while ($fila=mysql_fetch_array($res)){ ?>

              <div class="categorias" onclick="ok(<?php echo $fila['idsubcategoria2']?>,'<?php echo $fila['n1']."/".$fila['n2']."/".$fila['n3']?>'); " ><span  style="color: rgb(63, 196, 191)"><?php echo $fila['n1']."/"?></span><span  style="color:#908e8e"><?php echo $fila['n2']."/"?></span><span  style="color:#d6d0d0"><?php echo $fila['n3']?></span></div>
              <br>
            <?php }?>



					