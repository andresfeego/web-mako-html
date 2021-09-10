<?php 
function generarCodigo($longitud) {
 $key = '';
 $pattern = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}

include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
   // decoding the received JSON and store into $obj variable.
   $obj = json_decode($json,true);
   
   // name store into $name.

  $correo = $obj['correo'];
  $codigo = generarcodigo(8);

				$sqlc="select u.* from usuario as u where correo = '".$correo."'";
				$resc=mysql_query($sqlc);

  	if ($usuario=mysql_fetch_array($resc)) {
  		// email stuff (change data below)
$to = $correo; 
$from = "soporte@mako.guru"; 
$subject = "Contraseña temporal usuario - www.mako.guru"; 
$message = "<html lang='es'><head></head><body style='font-family: 'Ubuntu', sans-serif;'>
<style>
@import url('https://fonts.googleapis.com/css?family=Ubuntu');

.caja{
 width: 50%;
    float: left;
    height: 400px;
    vertical-align: middle;
    text-align: center;
}

.cajaPri{
    margin: 1em;
    border-radius:  20px;
    height:  auto;
    float:  left;
    overflow:  hidden;
}
.caja span{
    top: 45%;
    position:  relative;
    font-size: 1.5em;
    color: rgb(46,54,56);
}
</style>
  
<div style='
    max-width:  800px;
    margin:  auto;
'>
  <div style='text-align:  center;background: rgb(52,193,187); padding:  1em; color: white;'>
    <h1> Recuperación de contraseña </h1> 
    <h1>".$usuario['nombres']." ".$usuario['apellidos']."</h1>  
  </div>
  <div style='border: #f34437 solid 2px;margin: 1em; border-radius:  20px; height:  auto; float:  left; overflow:  hidden;'>
    <div style='width: 50%; float: left; height: 400px; vertical-align: middle; text-align: center;'>
      <img style='width: 100%' src='https://www.mako.guru/listadosApp/img/unnamed.png' alt='' https:=''>
    </div>
    <div style='width: 50%; float: left; height: 400px; vertical-align: middle; text-align: center; position: relative'>
        
      <div style='font-size:1.5em;color:rgb(46,54,56);top: 45%;position: relative;'>
        <div style='height:180px; width: 100%'; float: left;></div>
        Ingresa este codigo : - ".$codigo." - como contraseña temporal para el ingreso a MAKO.
      </div>
    </div>
  </div>





 
  <a style='text-align: center;cursor:pointer; background: rgb(52,193,187);  padding: 1em; color: white; width: 95%; margin: auto; height: 30px; float: left; border-radius: 20px;'>
    <span style=' text-decoration: none; color: white; font-size: 2em;';  href='hhtps://www.mako.guru'>www.mako.guru</span>
  </a>
</div>


</body></html>";

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "Codigo de restauracion de contraseña - www.mako.guru".$eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;


    $sql = "update usuario set passTemp='".$codigo."' , pass='".$codigo."'  where correo='".$correo."'";
// send message
  if ($results=@mysql_query($sql)) {
	
      
if (mail($to, $subject, $body, $headers)) {
      $Json1 = json_encode($usuario['correo']);
  } else {
      $Json1 = json_encode("2");
  }
  
} else {
  $Json1 = json_encode("1");
}

  	} else {
  		  $Json1 = json_encode("0");

  	}
  	




echo $Json1;

mysql_close($conexion);


 ?>

