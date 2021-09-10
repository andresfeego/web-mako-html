<?php include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$codigo=$_GET['id'];
//$codigo="03";
$sql="select * from  empresa  where codigo like '".$codigo."'";
$res=mysql_query($sql);
$empresa=mysql_fetch_array($res);



$sql1="select * from  barrios  where idBarrio = ".$empresa['barrio'];
$res1=mysql_query($sql1);
$infbarrio=mysql_fetch_array($res1);
$barrio=$infbarrio['nombreBarrio'];

$sqlc="select * from  ciudades  where id_ciudad = ".$infbarrio['id_ciudad'];
$resc=mysql_query($sqlc);
$infciudad=mysql_fetch_array($resc);



$sql2="select * from  empresa_has_telefonos where  empresa_codigo like  '".$codigo."'";
$res2=mysql_query($sql2);

$sql3="select * from  `empresa_has_correo` where  `empresa_codigo` like  '".$codigo."'";
$res3=mysql_query($sql3);
if ($cor=mysql_fetch_array($res3)) {
	$sql4="select * from  `correo` where  `idcorreo` =".$cor['correo_idcorreo'];
	$res4=mysql_query($sql4);
	$corre=mysql_fetch_array($res4);
	$correoE1=$corre['correo'];
};

if ($cor=mysql_fetch_array($res3)) {
	$sql4="select * from  `correo` where  `idcorreo` =".$cor['correo_idcorreo'];
	$res4=mysql_query($sql4);
	$corre=mysql_fetch_array($res4);
	$correoE2=$corre['correo'];
};

$sql5="select * from  `empresa_has_horario` where  `empresa_codigo` like '".$codigo."'";
$res5=mysql_query($sql5);


 

					 	$sql1="select `codigo`, `visto` from  `empresa` where `codigo` = '".$codigo."'";
    					$res1=mysql_query($sql1);
 						$fila2=mysql_fetch_array($res1);


						$aumento=$fila2['visto']+1;
						$sql3="update  `empresa` set  `visto` =  '".$aumento."' where  `empresa`.`codigo` =  '".$codigo."'";						
						$res3=mysql_query($sql3);
						
					 

 ?>


<?php 
//   imprimiendo en pantalla iconos informativos y promos 

			echo '
				<div class="contInfor2">
			';

			if ($empresa['numPromo' ] > 0) {
				echo '
				<div class="boxPromo2" onclick="verPromos(1);">
					<div class="txtInformativos2">'.$empresa['numPromo'].'</div>
				</div>
			
				';
			}

			if ($empresa['numInfo'] > 0 ) {
				echo '
				<div class="boxInfor2" onclick="verInformativos(1);">
					<div class="txtInformativos2">'.$empresa['numInfo'].'</div>
				</div>
				';
			}

			echo '	
			</div>
			';
//_______________________________________________________________
 ?>
<?php 
//   imprimiendo en pantalla iconos informativos y promos 

		

			if ($empresa['numPromo' ] > 0) {
			
			$sqlp="select  p.*, e.codigo

			from empresa as e
	
			join empresa_has_promo as hp 
				on hp.id_empresa = e.codigo

			join promo as p
				on hp.id_promo = p.id

			
			where e.codigo =  '".$empresa['codigo']."' and p.activo = '1' and eliminado='0'";

			$resp=mysql_query($sqlp);

				echo '
 <div class="contPromociones" id="contPromociones" >
				<div class="promociones" id="promos">
					<div class="cerrarPromos" onclick="verPromos(0);"></div>	
';
					
			while ($promo=mysql_fetch_array($resp)) {
				echo '<div class="promocion">
						<div class="titPromocion">
							<div class="boxPromo3"> '.$promo['porciento'].'%</div>
							<span> '.$promo['titulo'].'</span>
						</div>
						
						<div class="txtPromocion">
							<span> '.$promo['descripcion'].'</span>
						</div>

						<div class="valido"> Promocion valida hasta el: '.$promo['fechaFin']; if ($promo['existencias'] == 1 ) { echo ' o hasta agotar existencias'; } echo '</div> </div>';	
			}

echo '
				</div>
</div>

';
			}

			
//_______________________________________________________________
 ?>


 <?php 
//   imprimiendo en pantalla iconos informativos y promos 

		

			if ($empresa['numInfo' ] > 0) {

$sqli="select  i.*, e.codigo

			from empresa as e
	
			join empresa_has_infor as hi 
				on hi.id_empresa = e.codigo

			join informativo as i
				on hi.id_infor = i.id

			
			where e.codigo = '".$empresa['codigo']."' and i.activo = '1'  and eliminado='0'";

			$resi=mysql_query($sqli);



				echo '
 <div class="contPromociones" id="contInformativos" >
				<div class="promociones" id="informativos">
					<div class="cerrarPromos" onclick="verInformativos(0);"></div>	

';
while ($info=mysql_fetch_array($resi)) {
				echo '
					<div class="promocion">
						<div class="titPromocion">
							<div class="boxInfor3"></div>
							<span> '.$info['titulo'].'</span>
						</div>
						
						<div class="txtPromocion">
							<span> '.$info['descripcion'].'</span>
						</div>


					</div>'


;	
			}



echo '


				</div>
</div>

';
			}

			
//_______________________________________________________________
 ?>

			<div class="cerrar" onclick="cerrar();"></div>
				<?php echo '<div class="descLoc" style="background-color:'.$infciudad['color'].'">' ;?>
					<?php echo '<img class="logoLoc" style="border-color:'.$infciudad['color'].'" src="https://www.mako.guru/directorio/'.$empresa["url_logo"].'" alt="'.$empresa["nombre"].'">'; ?>
					<?php echo '<h1 > '.strtoupper($empresa['nombre']).' </h1> ';?>
					<h2><?php echo $empresa['descripcion']; ?></h2>
						
					<img src="./imagenes/makoTransparente.png" alt="" id="logoTransp">

				</div>
				<div class="infolocall">
			<div class="cajader">
				

				<?php echo '<div style="border-bottom: solid 1px '.$infciudad['color'].';" class="cainfo" id="ubiLoc ">'; ?>

					<?php echo ' <div class="iconos" style="fill: '.$infciudad['color'].';"> '?>
					
							<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="1.06889in" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
							viewBox="0 0 11491 14025"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Capa_x0020_1">
							<metadata id="CorelCorpID_0Corel-Layer"/>
							<path class="fil0 str0" d="M5566 395c-3298,177 -6004,3102 -4946,6692 450,1526 2657,3911 3731,5352 439,588 773,1383 1679,1161 599,-148 916,-887 1374,-1463 1199,-1510 3294,-3856 3601,-5494 660,-3513 -2096,-6427 -5439,-6248zm-2927 6162c-167,-191 -175,-404 -23,-641 1003,-787 2110,-1163 3319,-1127 1128,74 2131,450 3010,1127 154,201 154,399 0,595 -184,198 -393,206 -625,23 -812,-531 -1618,-816 -2416,-857 -935,-20 -1807,255 -2616,826 -193,178 -409,196 -649,54z"/>
							</g>
							</svg>
						
					</div>
					
					<table>
						<tr>
						<td><span><?php echo $empresa['direccion']; ?> </span></td>
						</tr>

					<tr>
						<td><span><?php echo $barrio." - "; ?></span><?php echo "<span style='color:".$infciudad['color'].";'>".$infciudad['nombre']."</span>" ;?>

						</td>
					</tr>
					</table>

					
					

				</div>


				<?php echo '<div style="border-bottom: solid 1px '.$infciudad['color'].';" class="cainfo" id="telLoc ">'; ?>
					
					<?php echo ' <div class="iconos" style="fill: '.$infciudad['color'].';"> '?>

							<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="0.878157in" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
							viewBox="0 0 12661 12001"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Capa_x0020_1">
							<metadata id="CorelCorpID_0Corel-Layer"/>
							<path class="fil0 str0" d="M269 2948c90,1818 1309,3285 2355,4564l1079 1133c1278,1144 4994,4214 6854,2654 247,-206 455,-337 684,-520l872 -789c535,-501 368,-514 -1091,-1392 -252,-151 -1322,-780 -1585,-767 -556,27 -896,1056 -1326,1078 -1157,57 -2442,-868 -3041,-1483 -392,-403 -701,-805 -1026,-1288 -1401,-2090 -519,-1794 378,-2936 -144,-506 -1619,-2956 -2078,-2933 -389,19 -2086,2472 -2075,2679z"/>
							</g>
							</svg>
					</div>
				
								<?php 	
								while($idtel=mysql_fetch_array($res2)){
										$idtelefono=$idtel['telefonos_id_telefono'];

										$sql3="select * from  `telefonos` where  `id_telefono` =".$idtelefono;
										$res3=mysql_query($sql3);
										$tel=mysql_fetch_array($res3);

									echo "<div class='cajatel'>";
										if ($tel['tipo']=="1") {$prefijo="(098) ";$prefijoM="038";}else{$prefijo="";$prefijoM="";};
										echo "<div class='telefonos'><a  data-rel='external' href='tel:".$prefijoM.$tel['telefono']."'> <span class=''>".$prefijo.$tel['telefono']."</span> </a> </div>";

										if($tel['wp']=="1"){ echo "<div class='whatsapp'><a href='https://api.whatsapp.com/send?phone=57".$tel['telefono']."&text=Hola,%20te%20contacto%20desde%20www.mako.guru' target='_blank'><img class='whspicon' ' src='../registro/imagenes/wicono.png' alt=''></a> </div>"; };									
									echo "</div>";
								};

								?>
								
						
					
					
					
					
					

				</div>

				
				<?php echo '<div style="border-bottom: solid 1px '.$infciudad['color'].';" class="cainfo" id="webLoc ">'; ?>
				
					<?php echo ' <div class="iconos" style="fill: '.$infciudad['color'].';"> '?>
					
							<svg xmlns="http://www.w3.org/2000/svg" width="100%" height=".978in" viewBox="0 0 14664 14656" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><g><path class="fil0 str0" d="M14052 4485c-770-1795-2079-3100-3889-3873-905-385-1845-582-2835-582s-1931 195-2835 582c-1795 770-3117 2075-3889 3873-386 901-574 1845-574 2835s188 1942 574 2843c772 1798 2094 3110 3889 3881 904 387 1845 582 2835 582s1930-197 2835-582c1810-772 3119-2086 3888-3881 388-904 583-1853 583-2843s-195-1931-582-2835zm-9152-3098c-630 799-1093 1813-1389 3042h-1908c702-1365 1884-2459 3297-3042zm-3984 5933c0-695 112-1365 327-2012h2092c-103 678-151 1349-151 2012 0 655 48 1318 151 1996h-2108c-207-646-311-1317-311-1996zm687 2875h1908c296 1253 759 2283 1389 3074-1437-599-2619-1693-3297-3074zm5278 3473c-519-151-1006-535-1445-1158-440-622-775-1397-1007-2315h2452v3473zm0-4352h-2651c-104-710-160-1373-160-1996 0-671 56-1342 176-2012h2635v4008zm0-4887h-2452c248-910 585-1675 1023-2291 441-622 910-1006 1429-1150v3441zm6180 0h-1908c-295-1229-759-2243-1389-3042 1413 583 2595 1677 3297 3042zm-5278-3441c519 144 988 528 1429 1150 438 616 775 1381 1023 2291h-2452v-3441zm0 4320h2635c120 670 176 1341 176 2012 0 623-56 1286-160 1996h-2651v-4008zm0 8360v-3473h2452c-240 918-580 1689-1015 2315-435 628-910 1015-1437 1158zm1981-399c630-791 1094-1821 1389-3074h1908c-678 1381-1860 2475-3297 3074zm3673-3953h-2108c103-678 151-1341 151-1996 0-663-48-1334-151-2012h2092c215 647 327 1317 327 2012 0 679-104 1350-311 1996z"/></g></svg>
						
					</div>

					<table>

						
						<tr>
							<td><?php echo "<a href='mailto:".$correoE1."?subject=Contactando%20desde%20Mako.guru%20'><span>" .$correoE1."</span></a>"; ?>
							 </td>
						</tr>

						<?php 

							if (!empty($correoE2)) {
								echo "<tr>
										<td> 
											<a href='mailto:".$correoE2."?subject=Contactando%20desde%20Mako.guru%20'><span>" .$correoE2."</span></a>
										</td>
									</tr>"; 
							 
							}

						 ?>


						<?php 
						$WEB="";


						if ($empresa['pagina_web']!="sin web") {
							$WEB=strtolower($empresa['pagina_web']);

								if (strpos($WEB,'facebook')!== false || strpos($WEB,'fb')!== false) {
							
						echo "

						<tr>
							<td>
								<a target='_blank' href='http://".$WEB."'>
									

								<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' class='_1pbq img5' color='#ffffff'>
									<path fill='#4267b2' fill-rule='evenodd' d='M8 14H3.667C2.733 13.9 2 13.167 2 12.233V3.667A1.65 1.65 0 0 1
										3.667 2h8.666A1.65 1.65 0 0 1 14 3.667v8.566c0 .934-.733
										1.667-1.667
										1.767H10v-3.967h1.3l.7-2.066h-2V6.933c0-.466.167-.9.867-.9H12v-1.8c.033
										0-.933-.266-1.533-.266-1.267 0-2.434.7-2.467
										2.133v1.867H6v2.066h2V14z'>
									</path>
								</svg>


									<span>Ver perfil de facebook</span>
								</a>
							</td>
						</tr>

						";

						}else{
							echo "
						<tr>
							<td><a target='_blank' href='http://".$WEB."'><span>".$WEB."</span></a></td>
						</tr>

						";
						};
						} 

						
					
						

						 ?>
						

						

					</table>

					
					
					

				</div>

			</div>

			<div class="cajaizq">


				<?php echo '<div style="border-bottom: solid 1px '.$infciudad['color'].';" class="cainfo" id="horaLoc ">'; ?>
					
					<?php echo ' <div class="iconos" style="fill: '.$infciudad['color'].';"> '?>

						<svg xmlns="http://www.w3.org/2000/svg" width="100%" height=".872in" viewBox="0 0 11510 11510" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"> <?php echo '<path class="fil0 str0" style="fill: none;stroke: '.$infciudad['color'].';stroke-width: 538.025;"d="M5755 11120c2963 0 5365-2402 5365-5365s-2402-5365-5365-5365-5365 2402-5365 5365 2402 5365 5365 5365zm2774-2591l-2774-2774v-2604"></path>'; ?></svg>

					<?php echo "</div>"; ?>

					<?php 

						while($idhor=mysql_fetch_array($res5)){
								$idhorario=$idhor['horario_idhorario'];

								$sql6="select * from  `horario` where  `idhorario` =".$idhorario;
								$res6=mysql_query($sql6);
								$hor=mysql_fetch_array($res6);

								echo "<table>";

								

								switch ($hor['tipoHorario']) {
							    
							    case 1:
							        echo "<tr><td style='width: 30%;'><span>Lunes a Viernes</span></td>";
							        break;
							    case 2:
							        echo "<tr><td style='width: 30%;'><span>Sabados</span></td>";
							        break;
							    case 3:
							        echo "<tr><td style='width: 30%;'><span>Lunes a Sabados</span></td>";
							        break;

							    case 4:
							        echo "<tr><td style='width: 30%;'><span>Domingos y festivos</span></td>";
							        break;
							    case 5:
							        echo "<tr><td style='width: 30%;'><span>Lunes a Domingos</span></td>";
							        break;
							    case 6:
							        echo "<tr><td style='width: 30%;'><span>Lunes festivos</span></td>";
							        break;
							    case 7:
							        echo "<tr><td style='width: 30%;'><span>Lunes a Jueves</span></td>";
							        break;
							    case 8:
							        echo "<tr><td style='width: 30%;'><span>Viernes y Sabados</span></td>";
							        break;
							    case 9:
							        echo "<tr><td style='width: 30%;'><span>Viernes, Sabados y Domingos</span></td>";
							        break;
							    

							}
								
								

								$sql7="select * from  `horario_has_jornadas` where  `horario_idhorario` =".$idhorario;
								$res7=mysql_query($sql7);
								

								while ($idjor=mysql_fetch_array($res7)) {
									$sql8="select * from  `jornadas` where  `idjornadas` =".$idjor['jornadas_idjornadas'];
									$res8=mysql_query($sql8);
									$jor=mysql_fetch_array($res8);


									if ($jor['tipojornada']=="1") {
										echo "<td style='text-align: right;'><span>".$jor['de']."  a  ".$jor['a']."</span></td>";
									}

									if ($jor['tipojornada']=="2") {
										echo "<tr><td></td><td style='text-align: right;'><span>".$jor['de']."  a  ".$jor['a']."</span></td></tr>";
									}

									if ($jor['tipojornada']=="3") {
										echo "<td style='text-align: right;'><span>".$jor['de']."  a  ".$jor['a']."</span></td>";
									}



								}
									echo "</table>";

							};
						 ?>
					
				

				<?php echo "</div>"; ?>




					
							
						




					

				<?php 



						 if ($empresa['domicilio']=="1") {
						 	if ($empresa['costo_domicilio']==1) {
						 		$costo="A convenir";
						 	} else {
						 		if ($empresa['costo_domicilio']==0) {
						 			$costo="Sin costo";
						 		} else {
						 			$costo="$ ".$empresa['costo_domicilio'];
						 		}
						 		
						 	}
						 	

						 	echo '
					
					<div style="border-bottom: solid 1px '.$infciudad['color'].';" class="cainfo" id="dom24Loc ">
						<div class="iconos" style="fill: '.$infciudad['color'].'">
							<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%"  version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
							viewBox="0 0 1753 1254"
							 xmlns:xlink="http://www.w3.org/1999/xlink">
							 
							 <g id="Capa_x0020_1">
							  <metadata id="CorelCorpID_0Corel-Layer"/>
							  <path class="fil0" d="M250 1050l2 2c0,0 -2,-1 -2,-2zm-36 -5c11,3 12,5 26,5l0 6c-27,0 -16,4 -26,-11l0 0zm0 0l-5 -5 5 5zm-5 -5l-6 -5 6 5zm-6 -5l-6 -10 6 10zm803 -219l-5 0 4 -6 1 6 0 0zm-130 -235c-12,-3 -12,-4 -26,-5l0 -11c20,-4 22,-11 42,-15 -4,15 -9,21 -16,31l0 0zm130 235c22,5 36,22 56,33 31,17 53,1 80,14 18,-22 14,-11 15,-47l-20 -17c-18,3 -19,5 -32,12 -1,-44 -26,-40 -52,-27 0,-29 -2,-17 -15,-36 -16,0 -19,2 -32,5l-62 -42c8,-13 18,-17 31,-26 16,9 14,8 28,19 11,8 17,13 31,16 52,12 142,-47 205,-78l213 -121c15,-11 16,-11 18,-34 40,0 196,7 226,-8 70,-34 56,-110 56,-179 0,-54 0,-108 0,-162l-475 0 -14 17c0,0 -13,235 16,283 15,24 18,25 40,39l7 3c10,7 4,3 9,7 -31,0 -96,12 -116,30 -26,22 -41,46 -78,74 -17,12 -40,32 -62,37l0 -10c24,-2 72,-43 79,-52 14,-16 -10,-7 33,-35 14,-9 36,-28 3,-33 -32,-6 -98,4 -135,-1 -41,-5 -82,-5 -131,-5 -9,18 0,10 -16,21 -17,-4 -35,-23 -113,-42 -35,-9 -106,-20 -142,-20l0 -5c13,0 121,-41 136,-47 -5,-17 -6,-13 -16,-26l-57 -79c-15,10 -25,22 -38,36 -7,7 -11,11 -18,18 -24,21 -70,53 -96,92 -94,0 -205,43 -277,88 -16,10 -22,13 -38,25 -53,39 -128,121 -86,190 37,61 105,95 125,125 -9,13 -18,24 -26,36 -104,-24 -200,98 -98,197 78,76 233,-22 171,-139 14,-22 22,-26 26,-42l106 82c30,36 -18,131 -23,153 66,0 478,4 504,-2 15,-3 31,-14 40,-23 11,-10 19,-22 28,-35 11,-15 15,-22 26,-37 9,-13 21,-20 42,-17 87,10 129,27 207,49 57,16 93,36 145,3 15,-9 22,-15 33,-30 53,-80 -4,-177 -91,-180l-292 -20c-34,-3 -23,-2 -46,-17 -21,-14 -23,-8 -38,-30l0 0z"/>
							  <path class="fil0" d="M1168 863l110 5c32,3 10,10 43,-3 60,-25 122,-12 164,30 40,40 53,105 28,161 -32,72 -115,110 -197,71 -74,-35 27,-23 -179,-71 2,110 183,255 352,170 77,-39 143,-117 143,-207 0,-91 -10,-137 -80,-207 -86,-87 -230,-89 -325,-16 -10,8 -15,10 -24,18l-35 49z"/>
							  <path class="fil0" d="M0 993c0,83 8,132 72,194 44,44 100,65 158,67l15 0c86,-3 170,-50 209,-136 10,-22 20,-61 20,-94 -3,-12 -52,-51 -63,-61 -75,-67 20,64 -65,151 -61,62 -159,59 -212,6 -47,-48 -51,-131 -25,-179 32,-57 80,-73 152,-73 8,-40 -27,-20 -73,-89 -102,24 -188,113 -188,214l0 0z"/>
							  <path class="fil0" d="M756 294l136 188c117,0 218,5 333,5 4,-17 7,-14 -9,-27l-81 -60c-38,-29 -71,-54 -110,-83 -39,-28 -71,-53 -110,-82 -20,-15 -35,-26 -54,-41 -19,-14 -37,-29 -58,-40 -6,12 -47,130 -47,140l0 0z"/>
							  <path class="fil0" d="M527 154l0 26c0,56 58,114 114,114 56,0 66,0 106,-40 50,-50 48,-129 -4,-181l-11 -10c-73,-58 -205,-10 -205,91z"/>
							  <path class="fil0" d="M1262 112l490 0c0,-65 -40,-110 -94,-110 -58,0 -301,-9 -339,11 -9,5 -22,14 -29,23 -23,29 -19,38 -28,76l0 0z"/>
							  <path class="fil0" d="M229 539l15 12c11,-8 13,-11 25,-19 48,-33 110,-51 124,-69l40 -75 -12 -9c-19,10 -36,16 -59,27 -50,25 -106,83 -133,133l0 0z"/>
							 </g>
							</svg>


						</div>
						<table>
							<tr>
								<td>
									<span> Domicilio <span class="ampm">'.$costo.' aprox.</span></span>
					
								</td>
							</tr>
						</table>
					</div>
';
						 }




						 ?>


						

				



					
							
						




					

			<?php 
							if ($empresa['vc_horas']==1) {
								echo '
					
					<div style="border-bottom: solid 1px '.$infciudad['color'].';" class="cainfo" id="dom24Loc2 ">
						<div class="iconos" style="fill: '.$infciudad['color'].'">
					
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
								 width="80%" viewBox="0 0 75.695 75.695" style="enable-background:new 0 0 75.695 75.695;"
								 xml:space="preserve">
								<g>
									<path d="M75.695,37.846c0,20.869-16.98,37.85-37.848,37.85C16.981,75.695,0,58.715,0,37.846C0,16.977,16.981,0,37.848,0
										c7.628,0,15.055,2.331,21.31,6.592l5.816-5.817l4.679,17.946l-17.949-4.678l4.069-4.072c-5.319-3.422-11.538-5.3-17.929-5.3
										c-18.294,0-33.176,14.882-33.176,33.174c0,18.294,14.882,33.178,33.176,33.178c18.293,0,33.175-14.884,33.175-33.178H75.695z
										 M28.429,38.191c-3.186,2.243-5.358,4.178-6.511,5.811c-1.154,1.629-1.734,3.591-1.734,5.881v0.007h17.044v-4.327H26.29
										l0.017-0.036c0.827-1.152,2.363-2.445,4.616-3.874c2.432-1.556,4.092-2.954,4.984-4.197c0.883-1.25,1.322-2.822,1.322-4.716
										c0-2.314-0.776-4.199-2.327-5.662c-1.574-1.464-3.578-2.193-6.04-2.193c-2.637,0-4.718,0.793-6.212,2.381
										c-1.502,1.593-2.213,3.737-2.135,6.454h4.816c-0.046-1.46,0.246-2.606,0.876-3.455C26.839,29.42,27.71,29,28.83,29
										c1.043,0,1.896,0.339,2.532,1.016c0.645,0.673,0.959,1.561,0.959,2.672c0,1.021-0.292,1.939-0.874,2.773
										C30.869,36.285,29.864,37.201,28.429,38.191z M48.587,49.888v-5.507h-9.89v-2.126v-2.121l9.237-15.242h2.746h2.744V40.48h2.812
										v3.905h-2.812v5.506L48.587,49.888L48.587,49.888z M48.587,40.476V30.062l-6.063,10.071l-0.205,0.342H48.587z M39.379,8.508h-2.336
										v4.683h2.336V8.508z M39.379,61.58h-2.336v4.683h2.336V61.58z M67.086,38.553v-2.336h-4.685v2.336H67.086z M14.015,38.553v-2.336
										H9.334v2.336H14.015z"/>
								</g>

							</svg>
						
						</div>
						<table>
							<tr>
								<td>
									<span> Prestamos servicio las 24 horas </span>
								</td>
							</tr>
						</table>
					</div>
		
				';
							};


			?>


						
				

			</div>

	</div>
				
			<?php echo ' <div class="footerloc" style="border-top: solid 1px '.$infciudad['color'].';">  ';?>

						<?php echo '<div class="faceb fb-share-button" data-href="http://www.mako.guru/directorio/directorio3.php?id="'.$codigo.'" data-layout="button_count" data-size="large" data-mobile-iframe="true"><span class="_49vg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="_1pbq img5" color="#ffffff"><path fill="#ffffff" fill-rule="evenodd" d="M8 14H3.667C2.733 13.9 2 13.167 2 12.233V3.667A1.65 1.65 0 0 1
						3.667 2h8.666A1.65 1.65 0 0 1 14 3.667v8.566c0 .934-.733
						1.667-1.667
						1.767H10v-3.967h1.3l.7-2.066h-2V6.933c0-.466.167-.9.867-.9H12v-1.8c.033
						0-.933-.266-1.533-.266-1.267 0-2.434.7-2.467
						2.133v1.867H6v2.066h2V14z"></path></svg></span><a style="color:#fff;" class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.mako.guru%2Fdirectorio%2Fdirectorio3.php%3Fid%3D'.$codigo.'&amp;src=sdkpreparse">Compartir</a>
						</div>
						';?>

				<?php echo ' <div class="visitas" style="background: '.$infciudad['color'].';">  ';?>

							<div class="svgicon">
								<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" x="0px" y="0px"
								viewBox="0 0 95 95" style="enable-background:new 0 0 95 95;" xml:space="preserve">
								<g>
								<path style="fill:#fff;" d="M47.5,20.9C16.337,20.9,0,43.86,0,47.5c0,3.641,16.337,26.6,47.5,26.6
								C78.661,74.1,95,51.141,95,47.5C95,43.86,78.661,20.9,47.5,20.9z M47.5,67.962c-11.659,0-21.112-9.161-21.112-20.462
								S35.841,27.038,47.5,27.038S68.611,36.199,68.611,47.5S59.159,67.962,47.5,67.962z M58.055,47.5c0,5.65-4.727,10.232-10.555,10.232
								c-5.83,0-10.555-4.582-10.555-10.232S41.67,37.269,47.5,37.269c3.15,0-1.933,8.108,0,10.231
								C49.143,49.303,58.055,44.905,58.055,47.5z"/>
								</g><g></g><g></g><g></g><g></g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								<g>
								</g>
								</svg>
							</div>	


							<?php echo '<span> ('.$aumento.')Visitas </span>'; ?>


						</div>

			</div>