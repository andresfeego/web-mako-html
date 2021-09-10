<?php 
include ("../registro/conexion.php");
mysql_select_db($baseDatos);
mysql_query("SET NAMES 'UTF8'");
?>
<?php 
$mail = $_POST['mail'];
$codigo = $_POST['codi'];

    

    

    if ($codigo=='vacio') {
        
    $sql="select * from  codigos where email = '".$mail."'";
    $res=mysql_query($sql);

        if($fila=mysql_fetch_array($res)){

            if ($fila['enUso']==1) {
                echo "1";
            } 
            else {
                echo $fila['codigo'];
            }
            
         }
         else{
            echo "0";
         };


    } 

    else {

        $sql="select * from  codigos where email = '".$mail."'";
        $res=mysql_query($sql);

         if($fila=mysql_fetch_array($res)){
            
            if ($fila['enUso']==1) {
                echo "1";
                
                }else{

                $sql1="select * from  codigos where codigo = '".$codigo."' and enUso='0'";
                $res1=mysql_query($sql1);

                if($fila1=mysql_fetch_array($res1)){
                    
                    if ($fila['codigo']==$codigo) {
                        echo $fila['codigo'];
                    } 

                    else {
                        
                     $sql = "update codigos set registrando='0' where codigo='".$fila['codigo']."'";
                        if ($results=@mysql_query($sql)) {
                        $codi=$fila['codigo'].mysql_error();
                        } 
                        
                        echo $codigo;


                    }
                
                }
                else{
                    echo "0";

                };
                                                                    
            }
        }
        else{
            $sql1="select * from  codigos where codigo = '".$codigo."' and enUso='0' ";
            $res1=mysql_query($sql1);

            if($fila1=mysql_fetch_array($res1)){
                echo $codigo;
            }
            else{
                echo "0";

            };
            
         };

        }
   
    





    

















mysql_close($conexion);



 ?>

 