
<?php 

require "facturacion/mem_image.php";
include ("../registro/conexion.php");

setlocale(LC_TIME,"es_CO.UTF-8");
date_default_timezone_set ('America/Bogota');



  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
   // decoding the received JSON and store into $obj variable.
   $obj = json_decode($json,true);
   
   // name store into $name.
  $idVendedor = $obj['idVendedor'];
  $nombresVen = $obj['nombresVen'];
  $brochure = $obj['brochure'];
  $senores = $obj['senores'];
  $correo = $obj['correo'];
  $fecha = date('Y-m-d H:i');
  
  
class PDF extends  PDF_MemImage{

}








$pdf=new PDF('P','mm','letter');
$pdf->SetMargins(12,10);
$pdf->AliasNbPages();
$pdf->AddPage();




$image = "cartas/logoFeego2018.jpg";
$imgstr = fread(fopen($image, "r"), filesize($image));

$image2 = "cartas/logomako.jpg";
$imgstr2 = fread(fopen($image2, "r"), filesize($image2));

$image3 = "cartas/firma.jpg";
$imgstr3 = fread(fopen($image3, "r"), filesize($image3));

$pdf->SetTextColor(0,0,0);
$pdf->SetFont("helvetica","b", 13);
$pdf->SetDrawColor(143,144,146);
$pdf->SetFillColor(255,255,255);

$pdf->SetTitle('Carta de presentación MAKO');

$pdf->setX($pdf->GetPageWidth()/3+15);
$pdf->MultiCell($pdf->GetPageWidth()/3-10,5,'Calle 22 # 9 - 51 Int 202 Tunja - Boyacá   cel.: 3193289504 - 3197913842   www.mako.guru','L',1,1);
$pdf->setX($pdf->GetPageWidth()/3+15);
$pdf->Cell(($pdf->GetPageWidth()-24)/2,30,'','L',1,'L');

$pdf->setY(10);
$pdf->SetFont("helvetica","b", 9);

$pdf->setX($pdf->GetPageWidth()/3*2+5);
$pdf->MultiCell($pdf->GetPageWidth()/3-19,5,'Oscar Andres Manrique Perico      Nit: 1057577213-7              Régimen simplificado','L',1,1);
$pdf->setX($pdf->GetPageWidth()/3+15);
$pdf->Cell(($pdf->GetPageWidth()-24)/2,30,'','L',1,'L');



$pdf->Cell(0,3,$pdf->MemImage($imgstr,0,10,$pdf->GetPageWidth()/2-24,''),0,1,'C');
$pdf->Cell(0,3,$pdf->MemImage($imgstr2,($pdf->GetPageWidth()-60),35,$pdf->GetPageWidth()/3-24,''),0,1,'C');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(0,5,'Tunja, '.strftime("%A %d de %B de %Y"),0,1,'R');


$pdf->SetFont("helvetica","", 13);
$pdf->SetDrawColor(143,144,146);
$pdf->Cell(0,5,'Señores:',0,1,'L');
$pdf->SetFont("helvetica","b", 20);
$pdf->Cell(0,5,''.$senores,0,1,'L');

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont("helvetica","", 12);

$pdf->WriteHTML('<p align="j">El motivo de esta carta es para saludarles cordialmente y, a su vez, presentarles <b>Feego System , empresa 100% boyacense </b>cuya principal actividad es desarrollar software y plataformas web al a medida de sus necesidades y fáciles de usar. </p>');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->WriteHTML('<p align="j">Creyendo firmemente en el compromiso de hacer crecer el comercio del departamento, fomentar la compra local y generar una comunicación inmediata entre los comerciantes y sus potenciales clientes, ponemos hoy a su disposición <b> .: MAKO :.  Un directorio para todos.</b><p> ');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->WriteHTML('<p><b>MAKO:</b> directorio comercial, empresarial y profesional totalmente virtual e interactivo para la región de Boyacá, presentado a través de 3 plataforma (WEB, IOS y Android) toda la informacion 100% actualizada del comercio Boyacense,  con el fin de facilitar las búsquedas de empresas, locales comerciales, entidades públicas y en general cualquier producto o servicio, que pueda necesitar un usuario en su día a día.</p>');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->WriteHTML('<b>Nuestra visión:</b> trabajaremos hasta la última gota de nuestra energía para que, a la terminación del año 2019, tengamos al menos el 50% de la población Boyacense como usuarios activos de nuestra app.');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->WriteHTML('<b>Un directorio para todos:</b> Nuestra intención es apoyar a las pequeñas y medianas empresas brindándoles espacios eficientes, en los cuales diferentes personas de la región puedan encontrar los productos y servicios que estas ofrecen, es por este motivo que no pagaras ni anualidades, ni mensualidades por la presentación de la información de contacto básica de un comerciante en nuestro directorio, lo unico que debes hacer es comprar cualquiera de nuestros productos publicitarios de nuestro portafolio, pues creemos que de esta forma brindamos la posibilidad a los pequeños comerciantes de dar a conocer sus productos y además generamos, una herramienta más completa y un portafolio más amplio para los consumidores.');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();




$pdf->WriteHTML('<b>Funciones especiales:</b> podrás descargar desde tu tienda de aplicaciones la app <b>MAKO EMPRESARIO</b>, la cual te permitirá desde tu celular cambiar en cualquier momento lo datos publicados de tu local comercial, generar informativos como fechas de eventos, cierres por temporada, cambios de horarios, cambios de sede, y generar también promociones y descuentos que serán totalmente administrables y se presentaran en la app <b>MAKO</b> para tus clientes.');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->WriteHTML('<b>Próximas actualizaciones:</b>  Adicional a lo ya mencionado seguimos trabajando para poder brindar a nuestros usuarios una plataforma más interactiva con múltiples opciones como lo son: botón para que sus clientes puedan agregar los locales comerciales a favoritos, apertura de planes de mayor impacto visual dentro de la app, notificaciones directas a sus clientes potenciales cuando se genere un informativo o promoción, activación de secciones adopta y noticias actualizadas de Boyacá, entre muchas otras.  ');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(0,3,$pdf->MemImage($imgstr3,$pdf->GetPageWidth()/2-34,$pdf->GetPageHeight()-45,60,''),0,1,'C');






// email stuff (change data below)
$to = $correo; 
$from = "contacto@mako.guru"; 
$subject = "Carta de presentación www.mako.guru"; 
$message = "









<!DOCTYPE html>
<html lang='es'>
<head>
</head>
<body style='font-family: Ubuntu, sans-serif;'>

  <style type='text/css'>
  @import url('https://fonts.googleapis.com/css?family=Ubuntu');
  .container{
    
  }

  .cajatitulo{
   
    
  }
  .cajaPrin{
    
  }
  .imagen img{
    width: 100%;
  }

  </style>

  <div class='container' style='max-width: 800px; width: 100%; height: auto; background-color: #343434; margin: auto;'>
    
    <div class='cajatitulo' style=' width: 100%; height: 70px; background-color: rgb(52, 193, 187); font-size: 2em; text-align: center; color: #fff; padding: 1em 0em;'>
      <span>Bienvenido a www.MAKO.guru</span>
      <br>
      <span>Un directorio para todos</span>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' > <img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako1.png' alt=' www.MAKO.guru - Un directorio para todos'></div>
    </div> 

     <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' > <img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako1-2.png' alt=' www.MAKO.guru - Un directorio para todos'></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' > <img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako2.png' alt=' www.MAKO.guru - Un directorio para todos'></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' > <img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako3.jpg' alt=' www.MAKO.guru - Un directorio para todos'></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' > <img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako4.png' alt=' www.MAKO.guru - Un directorio para todos'></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' > <img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako5.png' alt=' www.MAKO.guru - Un directorio para todos'></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' > <img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako6.png' alt=' www.MAKO.guru - Un directorio para todos'></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' style='width: 100%;'> <a href='https://goo.gl/ocKF1n' target='_blank'> <img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako7.png' alt=' www.MAKO.guru - Un directorio para todos'></a></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' style='width: 100%;'> <a href='https://www.mako.guru' target='_blank'><img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako8.png' alt=' www.MAKO.guru - Un directorio para todos'></a></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' style='width: 100%;'> <a href='http://www.mako.guru/directorio/directorio3.php?id=L1DA1EFJ' target='_blank'><img style='width: 100%;' src='https://www.mako.guru/listadosApp/cartas/mako10.png' alt=' www.MAKO.guru - Un directorio para todos'></a></div>
    </div>

    <div class='cajaPrin' style='width: 100%; background-color: rgb(52, 193, 187);'>
      <div class='imagen' style='width: 100%;'></div>
      <div class='texto'></div>
    </div>

  </div>
</body>
</html>";

// a random hash will be necessary to send mixed content
$separator = md5(time());
  $mime_boundary = "==Multipart_Boundary_x{$separator}x"; 

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "Carta presentación ".$senores.".pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));
$attachment2 = chunk_split(base64_encode(file_get_contents('Brochure MAKO.pdf'))); 

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "PDF presentacion www.mako.guru".$eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";

if ($brochure == '1') {
  // attachment2
$body .= "--{$mime_boundary}\n";
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".'Brochure MAKO.pdf'."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment2.$eol;
$body .= "--".$separator."--";

}

// send message
if (mail($to, $subject, $body, $headers)) {




$sql = "INSERT INTO `carta_presentacion` (`senores`, `correo`, `brochure`)VALUES ('".$senores."', '".$correo."', '".$brochure."');";                     
   if ($results=@mysql_query($sql)) {
                              
                                                         
                              $rs = mysql_query("select max(id) as id from `carta_presentacion` ");
                
                if ($row = mysql_fetch_row($rs)) {
                  $idCarta = trim($row[0]);
      
                };


                $sql2 = "INSERT INTO   `vendedor_has_cartas` (`idVendedor`,`idCarta`)VALUES ('".$idVendedor."','".$idCarta."');";


                              

                              if ($results=@mysql_query($sql2)) {

                                $Json1 = json_encode("1");
                            }else{
                          $Json1 = json_encode("0");  
                              
                            }
                             
                         
                        } else{
                          $Json1 = json_encode("0");  
                        };


  
} else {
  $Json1 = json_encode("0");
}

  $fecha = date('Y-m-d--H-i');


echo $Json1;
$filename = 'cartas1/'.$nombresVen.' - '.strtoupper($senores).' - '.$fecha.'.pdf';
// queda guardando en la carpeta de listados app hasta que se haga la actualizacion de la app de vendedores para pasar a carpeta cartas
$pdf->Output('F',$filename);
mysql_close($conexion);


 ?>




















