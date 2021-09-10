
<?php 

require "mem_image.php";
include ("../../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
   // decoding the received JSON and store into $obj variable.
   $obj = json_decode($json,true);
   

   $rs = mysql_query("select total_factura as acu from `ventas` where idVenta = '".$obj['idVenta']."'");
                
                if ($row = mysql_fetch_row($rs)) {
                  $acuerdo = trim($row[0]);
      
                };



   // name store into $name.
  $cliente = $obj['cliente'];
  $nit = $obj['nit'];
  $direccion = $obj['direccion'];
  $telefono = $obj['telefono'];
  $razon = $obj['razon'];
  $codigo = $obj['codigo'];
  $plan = $obj['plan'];
  $idVenta = $obj['idVenta'];
  $correo = $obj['correo'];
  $fecha = date('Y-m-d H:i');
  $nombrePlan = 'BASICO único pago';
  $valorPlan = $acuerdo;
  $abono = $obj['abono'];
  $saldo = $obj['saldo'];
  $obser = $obj['obser'];

  switch ($plan) {
    
      case '2':
          $nombrePlan = 'BRONCE por un año';
          $valorPlan = '$ 150.000';
      break;

      case '3':
          $nombrePlan = 'PLATA por un año';
          $valorPlan = '$ 600.000';
      break;

      case '4':
          $nombrePlan = 'ORO por un año';
          $valorPlan = '$ 1.000.000';
      break;

      case '5':
          $nombrePlan = 'OBSEQUIO';
          $valorPlan = '$ 0';
      break;

  }

class PDF extends  PDF_MemImage{

}








$pdf=new PDF('P','mm',array(215,215));
$pdf->SetMargins(12,10);
$pdf->AliasNbPages();
$pdf->AddPage();




$image = "logoFeego2018.jpg";
$imgstr = fread(fopen($image, "r"), filesize($image));

$image2 = "logomako.jpg";
$imgstr2 = fread(fopen($image2, "r"), filesize($image2));

$image3 = "firma.jpg";
$imgstr3 = fread(fopen($image3, "r"), filesize($image3));

$pdf->SetTextColor(0,0,0);
$pdf->SetFont("helvetica","b", 13);
$pdf->SetDrawColor(143,144,146);
$pdf->SetFillColor(255,255,255);

$pdf->SetTitle('Recibo de venta');

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

$pdf->SetFont("helvetica","", 9);
$pdf->SetDrawColor(143,144,146);
$pdf->Cell(70,5,'Cliente:'.$cliente,'B',0,'L');
$pdf->setX(87);
$pdf->Cell(70,5,'Nit:'.$nit,'B',0,'L');
$pdf->setX(159);
$pdf->SetFont("helvetica","b", 13);
$pdf->Cell(50,5,'FACTURA DE VENTA',1,1,'c');
$pdf->Ln();

$pdf->SetFont("helvetica","", 9);
$pdf->SetDrawColor(143,144,146);
$pdf->Cell(70,5,'Dirección:'.$direccion,'B',0,'L');
$pdf->setX(87);
$pdf->Cell(70,5,'Telefono:'.$telefono,'B',0,'L');
$pdf->setY($pdf->getY()-5);
$pdf->setX(159);
$pdf->SetTextColor(220,0,0);
$pdf->SetFont("helvetica","b", 17);
$pdf->Cell(50,10,'Nº 000'.$idVenta,1,1,'C');
$pdf->Ln();

$pdf->setY($pdf->getY()-5);



$pdf->SetTextColor(0,0,0);
$pdf->SetFont("helvetica","", 9);
$pdf->SetDrawColor(143,144,146);
$pdf->Cell(70,5,'Razón Social:'.$razon,'B',0,'L');
$pdf->setX(87);
$pdf->Cell(70,5,'Codigo mako:'.$codigo,'B',0,'L');
$pdf->setY($pdf->getY()-5);
$pdf->setX(159);
$pdf->SetFont("helvetica","b", 12);
$pdf->Cell(50,10,'Fecha: '.$fecha,1,1,'c');
$pdf->Ln();

$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(52,192,187);
$pdf->SetDrawColor(143,144,146);

$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*1,7,'CANT',1,0,'C',1);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*9,7,'ARTICULO',1,0,'C',1);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,'VALOR',1,1,'C',1);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont("helvetica","", 11);

$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*1,7,'1',1,0,'C');
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*9,7,'Registro en plan '.$nombrePlan.' en www.mako.guru',1,0,'L');
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,$valorPlan,1,1,'C');


for ($i=0; $i < 1; $i++) { 
  $pdf->Cell(((($pdf->GetPageWidth())-24)/12)*1,7,'',1,0,'C');
  $pdf->Cell(((($pdf->GetPageWidth())-24)/12)*9,7,'',1,0,'L');
  $pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,'',1,1,'L');
}

$pdf->SetFont("helvetica","B", 6);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*8,7,'Esta factura se asimilia en todos sus efectos legales a la letra de cambio segun articulo 774 del código del comercio',0,0,'R');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(52,192,187);
$pdf->SetFont("helvetica","B", 13);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,'TOTAL:',1,0,'L',1);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,$valorPlan,1,1,'C');

$pdf->SetFont("helvetica","B", 6);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*8,7,'',0,0,'R');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(52,192,187);
$pdf->SetFont("helvetica","B", 13);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,'ABONO:',1,0,'L',1);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,$abono,1,1,'C');

$pdf->SetFont("helvetica","B", 6);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*8,7,'',0,0,'R');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(52,192,187);
$pdf->SetFont("helvetica","B", 13);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,'SALDO:',1,0,'L',1);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(((($pdf->GetPageWidth())-24)/12)*2,7,$saldo,1,1,'C');

$pdf->Ln();

$pdf->SetFont("helvetica","", 10);
$pdf->Cell(0,7,'Observaciones: '.$obser,'B',1,'L');
$pdf->Cell(0,7,'','B',1,'L');

$pdf->Cell(0,3,$pdf->MemImage($imgstr3,$pdf->GetPageWidth()/2-34,$pdf->GetPageHeight()-45,60,''),0,1,'C');






// email stuff (change data below)
$to = $correo; 
$from = "contacto@mako.guru"; 
$subject = "Factura www.mako.guru"; 
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
    <h1>".$razon."  Bienvenido a WWW.MAKO.GURU</h1> 
    <h1>Un directorio para todos.</h1>  
  </div>
  <div style='border: #f34437 solid 2px;margin: 1em; border-radius:  20px; height:  auto; float:  left; overflow:  hidden;'>
    <div style='width: 50%; float: left; height: 400px; vertical-align: middle; text-align: center;'>
      <img style='width: 100%' src='https://www.mako.guru/listadosApp/img/buscar.jpg' alt='' https:=''>
    </div>
    <div style='width: 50%; float: left; height: 400px; vertical-align: middle; text-align: center; position: relative'>
        
      <div style='font-size:1.5em;color:rgb(46,54,56);top: 45%;position: relative;'>
        <div style='height:180px; width: 100%'; float: left;></div>
        Felicidades ahora tus cliente te podrán encontrar de una forma mas fácil y en todo momento.
      </div>
    </div>
  </div>


  <div style='border: #f34437 solid 2px;margin: 1em; border-radius:  20px; height:  auto; float:  left; overflow:  hidden;'>
    <div style='width: 50%; float: left; height: 400px; vertical-align: middle; text-align: center;'>
      <img style='width: 100%' src='https://www.mako.guru/listadosApp/img/pdfFile.jpg' alt='' https:=''>
    </div>
    <div style='width: 50%; float: left; height: 400px; vertical-align: middle; text-align: center; position: relative'>
        
      <div style='font-size:1.5em;color:rgb(46,54,56);top: 45%;position: relative;'>
        <div style='height:180px; width: 100%'; float: left;></div>
        Adjunto a este correo encontrarás la factura en formato pdf.
      </div>
    </div>
  </div>


  <div style='border: #f34437 solid 2px;margin: 1em; border-radius:  20px; height:  auto; float:  left; overflow:  hidden;'>
    <div style='width: 50%; float: left; height: 400px; vertical-align: middle; text-align: center;'>
      <img style='width: 100%' src='https://www.mako.guru/listadosApp/img/arboles.jpg' alt='' https:=''>
    </div>
    <div style='width: 50%; float: left; height: 400px; vertical-align: middle; text-align: center; position: relative'>
        
      <div style='font-size:1.5em;color:rgb(46,54,56);top: 45%;position: relative;'>
        <div style='height:180px; width: 100%'; float: left;></div>
        Salvemos el planeta, no imprimas este documento si no es estrictamente necesario.
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

// attachment name
$filename = "Factura #".$idVenta.".pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "PDF Factura www.mako.guru".$eol;

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

// send message
if (mail($to, $subject, $body, $headers)) {
    $sql = "update ventas set clienteFactura='".$cliente."' , nitFactura='".$nit."', abono='".$abono."', saldo='".$saldo."'  where idVenta='".$idVenta."'";
      
  if ($results=@mysql_query($sql)) {
      $Json1 = json_encode("1");
  } else {
      $Json1 = json_encode("1");
  }
  
} else {
  $Json1 = json_encode("0");
}


  $fecha = date('Y-m-d--H-i');

echo $Json1;
$pdf->Output('F','facturaN-'.$idVenta.' - '.$fecha.'.pdf');
mysql_close($conexion);


 ?>



