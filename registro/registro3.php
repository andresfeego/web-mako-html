

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>.:MAKO:. Un directorio comercial diferente</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta content='http://clickdico.co/archivos/p1.png' property='og:image'/>
<meta name="keywords" content="Directorio comercial sogamoso,directorio,comercial,sogamoso,paginas amarillas sogamoso,dico,boyaca,dico boyaca,comercio boyaca,comercial,localescomerciales boyaca,buscador de comercio boyaca">
<meta name="description" content="Pagina de registro para el directorio comercial, empresarial y profesional de Boyacá">

  <link rel="shortcut icon" type="image/png" href="favicon.png" />    
	<link type="text/css" rel="stylesheet" href="css/estilos.css">
	<link href="css/main.css" rel="stylesheet" type="text/css">
      	<link href="./jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="./formulario_files/ff.css">
	<link rel="stylesheet" href="./formulario_files/fontello.css">
  <link rel="stylesheet" href="./formulario_files/main.min.css" type="text/css">
	<link rel="stylesheet" href="./formulario_files/formoid-flat-green.min.css" type="text/css">
  <script type="text/javascript" language="javascript" src="js/ajax.js"></script> 
  <script type="text/javascript" src="./formulario_files/jquery.min.js"></script>
  <script src="libs/export_canvas/base64.js" type="text/javascript"></script>
  <script src="libs/export_canvas/canvas2image.js" type="text/javascript"></script>


</script>


  <script type="text/javascript">
function cambiarEstado(boton) {
       var ayuda = document.getElementById('ayuda');


        switch(boton) {
  case 1:
    
    ayuda.className = 'hoverdescripcion hover';
    
  break;
    
  case 2:
    ayuda.className = 'hoverdireccion hover';
    
  break;
  

  case 3:
    ayuda.className = 'hovercelular hover';
   
  break;
  
  case 4: 
    ayuda.className = 'hoverweb hover';
   
  break;
  

  case 5:
    ayuda.className = 'hovercat hover';
   
  break;
  
  case 6: 
    ayuda.className = 'hoverhorarios hover';
  
  break;
  
  case 7: 
    ayuda.className = 'hoverhorarios hover';
   
  break;
  

  case 8: 
    document.getElementById("ayuda").style.left="10px";
    sleep(200).then(() => {
    document.getElementById("abrirayuda").style.visibility="hidden";
    document.getElementById("cerrarayuda").style.right="-20px";
    });
  break;


    case 9: 
    ayuda.className = 'hoverterminos hover';
   
  break;

  
  default:
   
   document.getElementById("ayuda").innerHTML="";
   document.getElementById("ayuda").style.removeProperty('left');
      

       sleep(500).then(() => {
              ayuda.className = 'ayuda';
             
            });
}
}  
    
</script>
    </head>
    
<body>

 <?php include ("conexion.php");
 mysql_query("SET NAMES 'UTF8'");?>

  <?php mysql_select_db($baseDatos);?>
  <?php 
    $sql="select * from  `categorias` order by  `idcategorias` asc ";
    $res=mysql_query($sql);

    if (empty($_POST['email1']) or empty($_POST['codigo'])) {
      header('Location: ../home/index.php');
    }

    $mail = $_POST['email1'];
    $codi=$_POST['codigo'];
   

    $sql="select * from  `subcategoria2` order by  `subcategoria2` asc ";
    $res2=mysql_query($sql);

   
  ?>

<div id="nummmmm" class="contenedor">
 
</div>


<div class="bloque_principal">


    <form enctype="multipart/form-data" name="form1" class="formoid-flat-green" style="background-color:#ffffff;font-size:14px; sans-serif;color:#666666;" method="POST" action="validar.php" >



  <div id="bloqueM">
    <div id="intBloqueM">
      <h1>UN DIRECTORIO COMERCIAL DIFERENTE</h1>
    </div>
  </div>


  <div class="bloque" id="bloque1">
    <div id="intBloque">
            <span>1</span>
            <span>HABLANOS DE TU NEGOCIO </span><a name="inicio"></a>

      <div class="bolas" id="bola1"></div>
    </div>
    <div class="int2Bloque">
      

          
    
    
 <div id="logo">
        <div id="userpic" class="userpic">
           <div class="js-preview userpic__preview" ></div>
           <div class="btn btn-success js-fileapi-wrapper">
              <div class="js-browse">
                 <span class="btn-txt">Subir logo</span>
                 <input type="file" name="filedataa">
              </div>
              <div class="js-upload" style="display: none;">
                 <div class="progress progress-success"><div class="js-progress bar"></div></div>
                 <span class="btn-txt">Cargando...</span>
              </div>
           </div>
           
        </div>

    </div>

 
  </br></br></br>
      <div id="errorImg" style="text-align: center; float: left;" ></div>

    <canvas id="canvasFinal" style="display:none;"></canvas>

  <?php echo "<div class='element-input in1' style=''><label class='title'>Código:<span class='required' aria-required='true'>*</span></label><input class='large' type='text' name='codigo' value='".$codi."' aria-required='true' style='background-color: #BBBBBB;text-align: center;color: black;font-size: 24px;'>        <div id='errorCod' ></div>"; ?>
</div>
    
   <!-- <div class="title"><h2>Formulario de registro para empresas y profesionales</h2></div> -->
    <input type="hidden" name="img" value="0">
    <div class="element-input in2"><label class="title">Nombre o razón social:<span class="required" aria-required="true">*</span></label><input maxlength="70" placeholder="" title="Hey!! por favor el nombre de tu empresa." class="large" type="text" name="razon"  aria-required="true" required="required">        <div id="errorRazon" ></div>
</div>
    <div class="element-input in2"><label class="title">Eslogan o actividad comercial:<span class="required" aria-required="true">*</span></label><input  maxlength="100"  placeholder="" onclick="cambiarEstado(1);from(true,'ayuda','ayuda1.php');" class="large" type="text" name="descrip"  aria-required="true">        <div id="errorDescrip" ></div>
</div>

    </div>
  </div>


   <div class="bloque" id="bloque2">
    <div id="intBloque">
            <span>2</span>
            <span>COMO TE CONTACTAN TUS CLIENTES </span>

      <div class="bolas" id="bola2"></div>
    </div>

    <div class="int2Bloque">
      
       <div class="element-input in2"><label class="title">Dirección completa:<span class="required" aria-required="true">*</span></label><input maxlength="70" placeholder="" onclick="cambiarEstado(2);from(true,'ayuda','ayuda2.php');" class="large" type="text" name="direc"  aria-required="true">        <div id="errorDirec" ></div>
</div>

      <input type="hidden" name="barrio"/>

        <div id="busbar">
  

        </div>
      

      <div id="errorBarrio" ></div>
   
 
        <div class="element-input in3"><label class="title">Celular principal:<span class="required" aria-required="true">*</span></label><input  onclick="cambiarEstado(3);from(true,'ayuda','ayuda3.php');" class="large" type="number" name="cel1"  aria-required="true">    
<div class="element-radio ">
          <div class="column element-checkbox">
            <input type="checkbox" name="Wcel1" id="Wcel1" value="1" >
            <label for="Wcel1">tiene whatsapp</label>
          </div>
        </div></br></br>

           <div id="errorCel" ></div>
</div>
       <div class="element-input in3"><label class="title">Celular secundario:</label><input class="large" type="tel"   pattern="[0-9]*" name="cel2"  aria-required="true"></div>
       <div class="element-radio ">
          <div class="column element-checkbox">
            <input type="checkbox" name="Wcel2" id="Wcel2" value="1" >
            <label for="Wcel2" style="margin-left: 15px;">tiene whatsapp</label>
          </div>
        </div></br></br>
   

      <div class="element-input in2" ><label class="title">Teléfono de contacto 1:</label><input class="large" type="tel"   pattern="[0-9]*" name="tel1"  aria-required="true"></div>
       <div class="element-input in2" ><label class="title">Teléfono de contacto 2:</label><input class="large" type="tel"   pattern="[0-9]*" name="tel2" aria-required="true"></div>
      
 

  
     
      <?php echo "<div class='element-input in3'><label class='title'>Correo electronico 1:<span class='required' aria-required='true'>*</span></label><input  maxlength='50' placeholder='' pattern='^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$' class='large' title='Por favor introduce un correo con formato tucorreo@ejemplo.com' type='text' name='email1'  value='".$mail."' aria-required='true'>        <div id='errormail' ></div></div>"; ?>
      <div class="element-input in3"><label class="title">Correo electrónico 2:</label><input maxlength="50" placeholder="" class="large" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="large" title="Por favor introduce un correo con formato tucorreo@servidordecorreo.com" type="text" name="email2" aria-required="true">  <div id="errormail2" ></div> </div>
    

    <div class="element-input in2"><label class="title">Página WEB:</label><input maxlength="100" placeholder="" onclick="cambiarEstado(4);from(true,'ayuda','ayuda4.php');" class="large" type="text" name="web" aria-required="true"></div>
    

    <div class="element-radio in3">
      <label class="title" id="pres">Prestamos servicio a domicilio:<span class="required" aria-required="true">*</span></label>    
        
        <div class="column  in3">
          <input type="radio" name="domi" id="domisi" value="1" onchange="from(document.form1.domi.value,'costdomi','costdomi.php'); ">
          <label for="domisi">Sí</label>

        </div>
          <span class="clearfix"></span>
        
        <div class="column  in3">
          <input type="radio" name="domi" id="domino" value="0"onchange="from(document.form1.domi.value,'costdomi','costdomi.php'); ">
          <label for="domino">No</label>
        </div>
          <span class="clearfix"></span>
    </div>
     </br>
        <div id="errorDom" ></div>

  
    
      <div class=" in3"id="costdomi"></div></td>
          

    </div>

  </div>

   <div class="bloque" id="bloque3">
    <div id="intBloque">
            <span>3</span>
            <span>INGRESA EN UNA CATEGORÍA</span>

      <div class="bolas" id="bola3"></div>
    </div>

    <div class="int2Bloque">
      

<input type="hidden" name="categoria"/>

<div id="buscat">
  

</div>

<div id="errorCat" ></div>
    <div class="lblayuda" onclick="cambiarEstado(5);from(true,'ayuda','ayuda5.php');" ><span class="span">¿No te ubicas?</span></div>

 <a href="" name="palabras"></a>
    <div class="element-textarea in2"><label class="title">Palabras o frases clave, escríbelas separadas por comas:<span class="required" aria-required="true">*</span> <div id="chars">50</div></label><textarea id="text" class="small" name="palclave" cols="20" rows="5" maxlength="500"  placeholder="Separadas por comas"  aria-required="true" ></textarea></div>
    
        <div id="errorKeys" ></div>
 

    </div>

  </div>

   <div class="bloque" id="bloque4">


    <div id="intBloque">
            <span>4</span>
            <span>Y DE TU HORARIO QUE DICES</span>

      <div class="bolas" id="bola4"></div>
    </div>

    <div class="int2Bloque">
      

         </br>
    <div class="element-radio"><label class="title" id="pres">Prestamos servicio las 24 horas:<span class="required" aria-required="true">*</span></label>
      <div class="column column5">
        <input type="radio" name="hor" id="24si" value="1" >
        <label for="24si">Sí</label>
      </div>
        <span class="clearfix"></span>
                
      <div class="column column5">
        <input type="radio" name="hor" id="24no" value="0" >
        <label for="24no">No</label> 
      </div>
        <span class="clearfix"></span>

    </div>

    

        </br>
        <div id="errorHor" ></div>
        


   
      

    <div class="element-radio">
      <label class="title" id="pres">Horarios:<span class="required" aria-required="true">*</span></label>

      <div class="lblayuda ayudahorarios" style="width:150;" onclick="cambiarEstado(6);from(true,'ayuda','ayuda6.php');" ><span class="span">¿Necesitas ayuda con esto?</span></div>
      

      <div class="column element-checkbox inh">
        <input type="checkbox" name="luvi" id="luvisi" value="1" onchange="from(document.form1.luvi.checked,'panelh1','h1.php'); ">
        <label for="luvisi">Lunes a Viernes</label>
      </div>
        </br></br>

        <div class="inh" id="panelh1">             
        
        </div>


     <div class="column element-checkbox inh">
        <input type="checkbox" name="saba" id="saba" value="1" onchange="from(document.form1.saba.checked,'panelh2','h2.php');">
        <label for="saba">Sábados</label>
      </div>
        </br></br>

        <div class="inh" id="panelh2">             
        
        </div>


      <div class="column element-checkbox inh">
        <input type="checkbox" name="lusa" id="lusasi" value="1" onchange="from(document.form1.lusa.checked,'panelh3','h3.php'); ">
        <label for="lusasi">Lunes a sábados</label>
      </div>
        </br></br>
       <div class="inh" id="panelh3">             
        
        </div>

      <div class="column element-checkbox inh">
        <input type="checkbox" name="dofe" id="dofesi" value="1" onchange="from(document.form1.dofe.checked,'panelh4','h4.php'); ">
        <label for="dofesi">Domingos y festivos</label>
      </div>
        </br></br>
        <div class="inh" id="panelh4">             
        
        </div>

      <div class="column element-checkbox inh">
        <input type="checkbox" name="ludo" id="ludosi" value="1" onchange="from(document.form1.ludo.checked,'panelh5','h5.php'); ">
        <label for="ludosi">Lunes a domingo</label>
      </div>
        </br></br>
        <div class="inh" id="panelh5">             
        
        </div>


</div>

        <div id="errorAtenci" ></div>


    </div>
  </div>




    
    <div class="bloque " id="bloque5">
      
      
          
            <span class="span" id="lblregistrar">Al dar click en registrar estas aceptando los <span style="color: red;" onclick="cambiarEstado(9);from(true,'ayuda','terminos.php');">términos y condiciones</span> de nuestro sitio web.</span>
       
            <div id="btnregistrar"  onclick="validar(document.form1);" >
             <span class="span" >Registrar</span>
            </div>
        
  
        <div id="errormnj" ></div>
      </table>
      
    </div>

  </form>
    

  <div class="ayuda" id="ayuda">
    
  </div>
    
    <div id="popup" class="popup" style="display: none;">
            <div class="popup__body"><div class="js-img"></div></div>
            <div style="margin: 0 0 5px; text-align: center;">

                <div class="js-upload btn btn_browse btn_browse_small">Recortar y subir</div>

            </div>
     </div>

</div>


<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<!--><script src="./FileAPI/FileAPI.min.js"></script>
<script src="./FileAPI/FileAPI.exif.js"></script>
	<script src="js/jquery.fileapi.js"></script>
	<script src="./jcrop/jquery.Jcrop.min.js"></script>
	<script src="./statics/jquery.modal.js"></script></!-->
<script>
$('#userpic').fileapi({
   url: 'http://rubaxa.org/FileAPI/server/ctrl.php',
   accept: 'image/*',
   imageSize: { minWidth: 200, minHeight: 200 },
   elements: {
      active: { show: '.js-upload', hide: '.js-browse' },
      preview: {
         el: '.js-preview',
         width: 200,
         height: 200
      },
      progress: '.js-progress'
   },
   onSelect: function (evt, ui){
      var file = ui.files[0];
      if( !FileAPI.support.transform ) {
         alert('Your browser does not support Flash :(');
      }
      else if( file ){
         $('#popup').modal({
            closeOnEsc: true,
            closeOnOverlayClick: false,
            onOpen: function (overlay){
               $(overlay).on('click', '.js-upload', function (){
                  $.modal().close();
                  $('#userpic').fileapi('upload');
               });
               $('.js-img', overlay).cropper({
                  file: file,
                  bgColor: '#fff',
                  maxSize: [$(window).width()-100, $(window).height()-100],
                  minSize: [200, 200],
                  selection: '90%',
                  onSelect: function (coords){
                     $('#userpic').fileapi('crop', file, coords);
                  }
               });
            }
         }).open();
      }
   }
});
</script>


<script>
  function validar(formulario){


    var erroresCometidos=0;
   

    if (!formulario.codigo.value) {
       var divi=document.getElementById( "errorCod");
      divi.innerHTML="<div class='errores' ><span class='span'>Debes ingresar un código</span></div>";
      erroresCometidos++;
    }else{
      var codd = formulario.codigo.value;

        validacod(codd,function(respuesta){

          if (respuesta==1) {
              var divi=document.getElementById( "errorCod");
              divi.innerHTML="<div class='errores' ><span class='span'>Código no existente en la base de datos</span></div>";
              erroresCometidos++;
            
          } else{
            if (respuesta==2) {
              var divi=document.getElementById( "errorCod");
              divi.innerHTML="<div class='errores' ><span class='span'>Este código ya fue registrado</span></div>";
              erroresCometidos++;
            } else{
              var divi=document.getElementById( "errorCod");
              divi.innerHTML="";
            };

          };

        });


       
     
    };


    if (!formulario.razon.value) {
       var divi=document.getElementById( "errorRazon");
      divi.innerHTML="<div class='errores' ><span class='span'>Escribe el nombre de tu empresa o local comercial</span></div>";
      erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorRazon");
      divi.innerHTML="";
    };

    if (!formulario.descrip.value) {
       var divi=document.getElementById( "errorDescrip");
      divi.innerHTML="<div class='errores' ><span class='span'>Escribe una breve descripción de tu principal actividad comercial o profesional.</span></div>";
      erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorDescrip");
      divi.innerHTML="";
    };


    if (!formulario.direc.value) {
       var divi=document.getElementById( "errorDirec");
      divi.innerHTML="<div class='errores' ><span class='span'>Escribe una dirección, para poder ubicarte, es un dato obligatorio. <span style='color: green;'>Ej: Calle 14 # 10 - 53 Local 334</span></span></div>";
      erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorDirec");
      divi.innerHTML="";
    };

 if (!formulario.barrio.value) {
       var divi=document.getElementById( "errorBarrio");
      divi.innerHTML="<div class='errores' ><span class='span'>Debes seleccionar un barrio para continuar.<span style='color: green;'>Si no esta tu barrio, por favor escoge el mas cercano e informanos con un correo a contacto@clickdico.co para agregarlo.</span></span></div>";
      erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorBarrio");
      divi.innerHTML="";
    };

    if (!formulario.cel1.value) {
       var divi=document.getElementById( "errorCel");
      divi.innerHTML="<div class='errores' ><span class='span'>Escribe tu número celular principal.</span></div>";
      erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorCel");
      divi.innerHTML="";
    };


    if (!formulario.email1.value) {
       var divi=document.getElementById( "errormail");
      divi.innerHTML="<div class='errores' ><span class='span'>Escribe tu e-mail con un formato valido. <span style='color: green;'>Ej: tucorreo@ejemplo.com</span></span></div>";
      erroresCometidos++;
    }else{
      var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (expr.test(formulario.email1.value)) {
        var divi=document.getElementById( "errormail");
      divi.innerHTML="";
      } else{
        var divi=document.getElementById( "errormail");
      divi.innerHTML="<div class='errores' ><span class='span'>Formato inválido. <span style='color: green;'>Ej: tucorreo@ejemplo.com</span></span></div>";
      erroresCometidos++;
      };
      
    };

    if (!formulario.email2.value) {
       
    }else{
      var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (expr.test(formulario.email2.value)) {
        var divi=document.getElementById( "errormail2");
      divi.innerHTML="";
      } else{
        var divi=document.getElementById( "errormail2");
      divi.innerHTML="<div class='errores' ><span class='span'>Formato inválido. <span style='color: green;'>Ej: tucorreo@ejemplo.com</span></span></div>";
      erroresCometidos++;
      };
      
    };



     if (!formulario.categoria.value) {
       var divi=document.getElementById( "errorCat");
      divi.innerHTML="<div class='errores' ><span class='span'>Debes seleccionar una categoría para continuar.</span></div>";
      erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorCat");
      divi.innerHTML="";
    };

    

    if (!formulario.hor.value) {
       var divi=document.getElementById( "errorHor");
      divi.innerHTML="<div class='errores' ><span class='span'>Selecciona una opción.</span></div>";
      erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorHor");
      divi.innerHTML="";
    };

    if (!formulario.domi.value) {
       var divi=document.getElementById( "errorDom");
      divi.innerHTML="<div class='errores' ><span class='span'>Selecciona una opción.</span></div>";
      erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorDom");
      divi.innerHTML="";

      if (formulario.domi.value==1) {

         if (!formulario.costdomi.value) {
       var divi=document.getElementById( "errorCostDom");
      divi.innerHTML="<div class='errores' ><span class='span'>Escribe el costo de tu  servicio a domicilio.</span></div>";
      erroresCometidos++;
    };

      };

     

    };

    

    if(!formulario.luvi.checked&&!formulario.saba.checked&&!formulario.lusa.checked&&!formulario.dofe.checked&&!formulario.ludo.checked){
        var divi=document.getElementById( "errorAtenci");
        divi.innerHTML="<div class='errores' ><span class='span'>No tienes un horario de atención seleccionado.</span></div>";
        erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorAtenci");
      divi.innerHTML="";

      if (formulario.luvi.checked) {
        if (!formulario.luvie.value) {
             var divi=document.getElementById( "errorAtenci");
        divi.innerHTML="<div class='errores' ><span class='span'>Hey! falta si es mañana y tarde o jornada continua para Lunes a Viernes.</span></div>";
        erroresCometidos++;
        };
      };

      if (formulario.saba.checked) {
        if (!formulario.sabad.value) {
             var divi=document.getElementById( "errorAtenci");
        divi.innerHTML="<div class='errores' ><span class='span'>Hey! falta si es mañana y tarde o jornada continua para Sabados.</span></div>";
        erroresCometidos++;
        };
      };

      if (formulario.lusa.checked) {
        if (!formulario.lusab.value) {
             var divi=document.getElementById( "errorAtenci");
        divi.innerHTML="<div class='errores' ><span class='span'>Hey! falta si es mañana y tarde o jornada continua para Lunes a Sabados.</span></div>";
        erroresCometidos++;
        };
      };

      if (formulario.dofe.checked) {
        if (!formulario.dofes.value) {
             var divi=document.getElementById( "errorAtenci");
        divi.innerHTML="<div class='errores' ><span class='span'>Hey! falta si es mañana y tarde o jornada continua para Domingos y festivos.</span></div>";
        erroresCometidos++;
        };
      };

      if (formulario.ludo.checked) {
        if (!formulario.ludom.value) {
             var divi=document.getElementById( "errorAtenci");
        divi.innerHTML="<div class='errores'><span class='span'>Hey! falta si es mañana y tarde o jornada continua para Lunes a Domingo.</span></div>";
        erroresCometidos++;
        };
      };
      
    };


    if (formulario.palclave.value.length==0) {
           var divi=document.getElementById( "errorKeys");
          divi.innerHTML="<div class='errores' ><span class='span'>Es muy importante que escribas las palabras clave, pues con estas tus clientes harán busquedas de productos o servicios. <span style='color: green;'> </br> Ej1: portatiles de segunda, repuestos para portatiles, reparación de tablets </br> Ej2: fotografía para bodas, videos promocionales, videos de eventos sociales, videos corporativos</span></span></span></div>";
          erroresCometidos++;
    }else{
      var divi=document.getElementById( "errorKeys");
      divi.innerHTML="";
    };

    if (document.getElementsByTagName('canvas').length==1) {

     var divi=document.getElementById( "errorImg");
          divi.innerHTML="<div class='errores' ><span class='span'>Ten en cuenta que si no escoges una imagen tu negocio aparecera con el icono por defecto de la categoría.  Si necesitas cambiarlo luego ponte en contacto con nosotros. <span style='color: green;'><a href='clickdico.co/contactenos'> Ver información de contacto</a></span></span></span></div>";
    }else{
      var divi=document.getElementById( "errorImg");
          divi.innerHTML="";
      formulario.img.value="1";
    };
   
    if(erroresCometidos==0){
      var micanvasauxi = document.getElementsByTagName('canvas');

      if (micanvasauxi.length>1) {
        var divi=document.getElementById( "errormnj");
       divi.innerHTML="<div class='themodal-overlay' style='background-image: url(imagenes/load7.gif);    background-repeat: no-repeat; background-attachment: fixed; background-position: center;background-color: rgb(255, 255, 255);'></div>";
       guardaimagen(formulario.codigo.value,formulario)

      }else{
        formulario.submit();
      };
   
   
  }else{document.location.href = "#inicio";};



  }

  function guardaimagen(nombreimagen,formulario){
    var divs= document.getElementsByTagName('div');
    var micanvas = document.getElementsByTagName('canvas');
    var midiv = divs[12];
    var ctx = micanvas[0].getContext("2d");


    
    var redimensionadoW = midiv.offsetWidth;
    var redimensionadoH = midiv.offsetHeight;

    var tamaOriginalH = micanvas[0].height;
    var tamaOriginalW = micanvas[0].width;

    var margenRx = midiv.style.marginLeft;
    var margenRy = midiv.style.marginTop;

    var margenOx = ((parseInt(margenRx,10)*(-1))*(tamaOriginalW))/redimensionadoW;
    var margenOy = ((parseInt(margenRy,10)*(-1))*(tamaOriginalH))/redimensionadoH;


    var recuadroOR = (200*tamaOriginalW)/redimensionadoW;


var datosDeLaImagen = ctx.getImageData(margenOx.toFixed(2),margenOy.toFixed(2),recuadroOR ,recuadroOR);
var canvasf = micanvas[1];
var ctx2 =  canvasf.getContext("2d");
canvasf.height = datosDeLaImagen.height;
canvasf.width = datosDeLaImagen.width;
datosDeLaImagen.height = 200;
datosDeLaImagen.width = 200;
ctx2.putImageData(datosDeLaImagen,0,0);
exportAndSaveCanvas(canvasf,nombreimagen,function(res){
   formulario.submit();
});


  }

</script>


<script>
  function exportAndSaveCanvas(canvasE,nombreimagen,respuesta)  {

    // Get the canvas screenshot as PNG
    var screenshot = Canvas2Image.saveAsPNG(canvasE, true);

    // This is a little trick to get the SRC attribute from the generated <img> screenshot
    canvasE.parentNode.appendChild(screenshot);
    screenshot.id = "canvasimage";    
    data = $('#canvasimage').attr('src');
    canvasE.parentNode.removeChild(screenshot);


    // Send the screenshot to PHP to save it on the server
    var url = '../directorio/logos/export.php';
   
    $.ajax({ 
      async : true,
        type: "POST", 
        url: url,
        dataType: 'text',
        data: {
            base64data : data,
            nombrePath : nombreimagen
        },
        success: function(data){
          respuesta(data);
        }
    });



  }
</script>

<script>
  function validacod(codd,pregunta)  {

    var url = 'validaCodigo.php';
   
    $.ajax({ 
      async : false,
        type: "POST", 
        url: url,
        dataType: 'text',
        data: {
            cod : codd,
        },
        success: function(data){
          pregunta(data);
        }
    });



  }
</script>

    <script type="text/javascript" src="js/jquery.tinylimiter.js"></script>
    
    <script>
      $(document).ready( function() {
      var elem = $("#chars");
      $("#text").limiter(50, elem);

//____________quitar scroll en input number

      $('form').on('focus', 'input[type=number]', function (e) {
  $(this).on('mousewheel.disableScroll', function (e) {
    e.preventDefault()
  })
})
$('form').on('blur', 'input[type=number]', function (e) {
  $(this).off('mousewheel.disableScroll')
})

      });
    </script>


    <script type="text/javascript">
     function anular(e) {
          from(document.form1.serviciobuscado.value,'cajaresult','busquedacat.php'); 
          tecla = (document.all)?e.keyCode:e.which;
          return (tecla != 13);


     };

      function anular1(e) {
          from(document.form1.barriobuscado.value,'cajabarresult','busquedabar.php'); 
          tecla = (document.all)?e.keyCode:e.which;
          return (tecla != 13);


     };
</script>

<script type="text/javascript">

  $(document).ready(function(){
    resetBusbar();

     sleep(2000).then(() => {

        resetBuscat();
          });
    
  });


function sleep (time) {

  return new Promise((resolve) => setTimeout(resolve, time));

}

</script>


	
<script type="text/javascript">
    function ok(e , o) {
          
          document.form1.categoria.value=e;
          from(false,'buscat','cajacatfinal.php');
          
          
          sleep(3000).then(() => {

          document.form1.stringcat.value=o;
          });
 
     };

     function resetBuscat() {
        from(false,'buscat','cajacatinicio.php');
        document.form1.categoria.value='';
     };


      function ok1(e , o) {
          
          document.form1.barrio.value=e;
          from(false,'busbar','cajabarfinal.php');
          
          
          sleep(3000).then(() => {

          document.form1.stringbar.value=o;
          });
 
     };

     function resetBusbar() {
        from(false,'busbar','cajabarinicio.php');
        document.form1.barrio.value='';
     };

</script>

</body>
</html>
