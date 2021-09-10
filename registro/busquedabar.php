
<?php include ("conexion.php");
	mysql_query("SET NAMES 'UTF8'");
	mysql_select_db($baseDatos); 
   
    $sql="select  `ciudades`.`nombre` as nombreCiudad, `barrios`.`idBarrio` as idBarrio, `barrios`.`nombreBarrio` as nombreBarrio  FROM ciudades,barrios where `barrios`.`nombreBarrio` like '%".$_GET['id']."%' and `ciudades`.`id_ciudad`=`barrios`.`id_ciudad` order by  `barrios`.`idBarrio` asc ";
    $res=mysql_query($sql);


    $sql="select  `ciudades`.`nombre` as nombreCiudad, `barrios`.`idBarrio` as idBarrio, `barrios`.`nombreBarrio` as nombreBarrio  FROM ciudades,barrios where `ciudades`.`nombre` like '%".$_GET['id']."%' and `ciudades`.`id_ciudad`=`barrios`.`id_ciudad` order by  `barrios`.`idBarrio` asc ";
    $res1=mysql_query($sql);




  ?>

           

            <?php while ($fila=mysql_fetch_array($res)){ ?>

              <div class="categorias" onclick="ok1(<?php echo $fila['idBarrio']?>,'<?php echo $fila['nombreCiudad']."/".$fila['nombreBarrio']?>'); " ><span  style="color:#908e8e"><?php echo $fila['nombreCiudad']."/"?></span><span  style="  color: rgb(63, 196, 191)"><?php echo $fila['nombreBarrio']?></span></div>
              <br>
            <?php }?>


             <?php while ($fila1=mysql_fetch_array($res1)){ ?>

              <div class="categorias" onclick="ok1(<?php echo $fila1['idBarrio']?>,'<?php echo $fila1['nombreCiudad']."/".$fila1['nombreBarrio']?>'); " ><span  style=" color: rgb(63, 196, 191)"><?php echo $fila1['nombreCiudad']."/"?></span><span  style="  color:#908e8e"><?php echo $fila1['nombreBarrio']?></span></div>
              <br>
            <?php }?>