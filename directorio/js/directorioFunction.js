
	
	function validaposponer(formulario,venta){

		posponer(formulario, venta,function(respuesta){
      		
      		if (respuesta==1) {
      			var divi=document.getElementById( "botonesregistrook");
      			divi.innerHTML="<div class='imgregistrook'><img style='width:15%;' src='imagenes/emoOk.png' alt=''></div><div class='txtregistrook'>Visita programada correctamente</div><div class='rok' onclick='cerrar();'><span>Cerrar</span></div>";
      		} else{
      			var divi=document.getElementById( "botonesregistrook");
      			divi.innerHTML="<div class='imgregistrook'><img style='width:15%;' src='imagenes/emo3.png' alt=''><div class='txtregistrook'>Algo salio mal programando la visita, tambien puedes usar los botones de llamada o mensaje de whatsapp para comunicarte con nuestro asesor y programarla.</div><div class='rok' onclick='cerrar();'><span>Cerrar</span></div>";
      			
      		};
   	 	});
	}

	function posponer(formulario,ventaa,respuesta){

		var diaa=formulario.dia.value;
		var mesa=formulario.mes.value;

		var url = 'guardaPosponer.php';
		$.ajax({ 
			async : false,
			type: "POST",
			url: url,
			dataType: 'text',
			data:{
				dia: diaa,
				mes: mesa,
				venta: ventaa,
			},
			success: function(data){
				respuesta(data);
			}
		});

	}

	function mostrarInfo(){
		 document.getElementById("infoLocal").style.visibility="visible";
			  document.getElementById("infoLocal").style.opacity="1";
	}

	function ver( codigo , activo){
		if (activo==1) {
			  from(codigo,'contenidoLoc','comerciante0.php');
			  document.getElementById("infoLocal").style.visibility="visible";
			  document.getElementById("infoLocal").style.opacity="1";


		} else{

		};
	}


	if (il!="0") {
			ver(il,tipo);
		};


		function cerrar(){
		
			var divi=document.getElementById( "infoLocal");
      		divi.innerHTML="<div class='contenidoLoc' id='contenidoLoc'></div>";
			  document.getElementById("infoLocal").style.visibility="hidden";
			  document.getElementById("infoLocal").style.opacity="0";

		}
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, "")};

 var estadolabel1=0;

 function sleep (time) {

  return new Promise((resolve) => setTimeout(resolve, time));

}


function cambiarEstadoContacto() {
       var contactodiv = document.getElementById('contacto');
       var iconocontacto = document.getElementById('thicon1');


       if (devi==2 || screen.width <= 1024) {

       	if (estadoContacto==1) {
       		 contactodiv.style.bottom="-27px";
       		 iconocontacto.style.top="-"+iconocontacto.width+"px";
       		 estadoContacto=2;
       	} else{
       		contactodiv.style.removeProperty('bottom');
       		iconocontacto.style.removeProperty('top');
       		estadoContacto=1;
       	};

       };
}  
    
function cerrarinfo1() {
       var divinfo1 = document.getElementById('info1');
      
        divinfo1.style.opacity="0";
      
      sleep(2000).then(() => {

         divinfo1.style.visibility="hidden";
          });
      

}  


function colortitulo(id,color,estado) {
      	var tituloh1 = document.getElementById(id);   
   if (estado=="1") {
   
       tituloh1.style.backgroundColor=""+color;
       tituloh1.style.color="#fff";
   } else{
       tituloh1.style.removeProperty('background-color');
       tituloh1.style.color=""+color;
   };


}  




	function validar(formulario){

		var erroresCometidos=0;
   		
   		 if (!formulario.email1.value) {
       var divi=document.getElementById( "errormail");
      divi.innerHTML="<div class='errores' ><span class='span'>Escribe tu e-mail con un formato valido. <span style='color: green;'>Ej: tucorreo@ejemplo.com</span></span></div>";
      erroresCometidos++;
    }else{
      var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (expr.test(formulario.email1.value)) {
        var divi=document.getElementById( "errormail");
      	
 			if (formulario.plan.value==5) {

 				if (!formulario.codigoObs.value) {
 					var divi=document.getElementById( "errorCodigoObs");
      				divi.innerHTML="<div class='errores' ><span class='span'>Ingresa un codigo de obsequio.</span></div>";
      				erroresCometidos++;
 				} else{

					validamail(formulario.codigoObs.value,formulario.email1.value,function(respuesta){
		      		
		      		if (respuesta==1) {
		      			var divi=document.getElementById( "errormail");
		      			divi.innerHTML="<div class='errores' ><span class='span'>Vaya parece que este mail ya se ha registrado con otro negocio.</span></div>";
		      			erroresCometidos++;
		      		} else{
		      			if (respuesta==0) {
		 
		      				var divi=document.getElementById( "errorCodigoObs");
			      			divi.innerHTML="<div class='errores' ><span class='span'>Vaya parece que el codigo no es valido o ya esta en uso.</span></div>";
			      			erroresCometidos++;


		      			} else{
		      				var divi=document.getElementById( "errormail");
		      				var divi2=document.getElementById( "errorCodigoObs");
		      			formulario.codigo.value=respuesta.trim();
		      			divi.innerHTML="";
		      			divi2.innerHTML="";
		      			};
		      			
		      		};
		   	 	}); 					


 				};

 			} else{
 				     	validamail('vacio',formulario.email1.value,function(respuesta){
      		
      		if (respuesta==1) {
      			var divi=document.getElementById( "errormail");
      			divi.innerHTML="<div class='errores' ><span class='span'>Vaya parece que este mail ya se ha registrado con otro negocio.</span></div>";
      			erroresCometidos++;
      		} else{
      			if (respuesta==0) {
      				var divi=document.getElementById( "errormail");
      			divi.innerHTML="";

      			} else{
      				var divi=document.getElementById( "errormail");
      			formulario.codigo.value=respuesta.trim();
      			divi.innerHTML="";
      			};
      			
      		};
   	 	});
 			};

   	 	
      } else{
        var divi=document.getElementById( "errormail");
      divi.innerHTML="<div class='errores' ><span class='span'>Formato inválido. <span style='color: green;'>Ej: tucorreo@ejemplo.com</span></span></div>";
      erroresCometidos++;
      };
      
    };

   	 	if (!formulario.pass.value) {
       		var divi=document.getElementById( "errorPass");
      		divi.innerHTML="<div class='errores' ><span class='span'>Escribe una contraseña.</span></div>";
      		erroresCometidos++;
    	}else{
      		var divi=document.getElementById( "errorPass");
      		divi.innerHTML="";
   	 	};


		if (!formulario.pass2.value) {
       		var divi=document.getElementById( "errorPass2");
      		divi.innerHTML="<div class='errores' ><span class='span'>Repite tu contraseña.</span></div>";
      		erroresCometidos++;
    	}else{
      		var divi=document.getElementById( "errorPass2");
      		divi.innerHTML="";
   	 	};

   	 	if (formulario.pass2.value&&formulario.pass.value&&formulario.pass2.value!=formulario.pass.value) {
       		var divi=document.getElementById( "errorPass3");
      		divi.innerHTML="<div class='errores' ><span class='span'>No hay coincidencia entre las dos contraseñas.</span></div>";
      		erroresCometidos++;
    	}else{
      		var divi=document.getElementById( "errorPass3");
      		divi.innerHTML="";
   	 	};

   	 	if (formulario.plan.value==0) {
   	 		var divi=document.getElementById( "errorPlan");
      		divi.innerHTML="<div class='errores' ><span class='span'>No has escogido un plan para la inscripción.</span></div>";
      		erroresCometidos++;
   	 	} else{

   	 		var divi=document.getElementById( "errorPlan");
      		divi.innerHTML="";
   	 	};

   	 	

   	 	if (erroresCometidos==0) {


   	 		guardaMail(formulario.codigo.value,formulario.email1.value,formulario.pass.value,function(respuesta){
      		
      		if (respuesta==0) {
      			var divi=document.getElementById( "errorPass3");
      			divi.innerHTML="<div class='errores' ><span class='span'>"+respuesta+"Oh oh, al parecer estamos teniendo problemas intentalo más tarde.</span></div>";
      			erroresCometidos++;
      		} else{
      			var divi=document.getElementById( "errorPass3");
      		divi.innerHTML="";
      		formulario.codigo.value=respuesta.trim();
      		formulario.submit();
      		};
   	 	});


   	 		
   	 	};


	}




	function validamail(cod,mail,respuesta){
		var url = 'validamail.php';
		$.ajax({ 
			async : false,
			type: "POST",
			url: url,
			dataType: 'text',
			data:{
				mail: mail,
				codi:cod,
			},
			success: function(data){
				respuesta(data);
			}
		});
	}


	function guardaMail(codigo,mail,pass,respuesta){
	
		var url = 'guardaMail.php';
		$.ajax({ 
			async : false,
			type: "POST",
			url: url,
			dataType: 'text',
			data:{
				codig:codigo.trim(),
				mail:mail,
				pass:pass,
			},
			success: function(data){
				respuesta(data);
			}
		});
	}



	function validaplan(){
			var formulario = document.form1;
			var miDiv = document.getElementById('codigoObs');
	   		var divi = document.getElementById("contenidocero");


			if (formulario.plan.value==5) {
				miDiv.innerHTML="<div class='element-input in2'><label class='title'>Codigo de obsequio:<span class='required' aria-required='true'>*</span></label><input  maxlength='100'  placeholder='' class='large' type='text' name='codigoObs'  aria-required='true'>        <div id='errorCod' ></div>";
		    	divi.style.height="433px";

			} else{
				miDiv.innerHTML="";
		    	divi.style.height="28em";

			};
	}

		var btn1=0;
		var btn2=0;
		var btn3=0;
		var btn4=0;
		var btn5=0;
		var btn6=0;

	function reiniciarbotones(){
		btn1=0;
		btn2=0;
		btn3=0;
		btn4=0;
		btn5=0;
		btn6=0;

   	


		for (var i = 1; i <= 6; i++) {
			var boton= document.getElementById("btn"+i);
			boton.style.background="#F33446";
		};

	}

	reiniciarbotones();


	function menu(id,reuso){

		if (reuso) {reiniciarbotones();};

		
   		var divi = document.getElementById("contenidocero");
   		var boton= document.getElementById("btn"+id);

			switch(id) {
	    case 1:
	    	if (btn1==0 && btn2==0 && btn3==0 && btn4==0 && btn5==0 && btn6==0  ) {
		    	divi.style.height="28em";
		    	divi.style.background="rgb(226, 226, 226)";
		    	boton.style.background="#b1b1b1";
		       from1('0','contenidocero','registro.php');
	    	   btn1=1;
	    	} 

	    	else{
	    		divi.style.height="0px";
				sleep(1000).then(() => {

         		divi.innerHTML="";
         		if (btn1!=1) {menu(id,true);} else{reiniciarbotones(); };

          		});
	    	};

	        break;
	    case 2:
	       if (btn1==0 && btn2==0 && btn3==0 && btn4==0 && btn5==0 && btn6==0  ) {
		    	divi.style.height="600px";
		    	divi.style.background="rgb(226, 226, 226)";
		    	boton.style.background="#b1b1b1";
		       from1('0','contenidocero','planes.php');
	    	   btn2=1;
	    	} 

	    	else{
	    		divi.style.height="0px";
				sleep(1000).then(() => {

         		divi.innerHTML="";
         		if (btn2!=1) {menu(id,true);} else{reiniciarbotones(); };
         		

          		});
	    	};
	        break;

	         case 3:
	       if (btn1==0 && btn2==0 && btn3==0 && btn4==0 && btn5==0 && btn6==0  ) {
		    	divi.style.height="200px";
		    	divi.style.background="rgb(226, 226, 226)";
		    	boton.style.background="#b1b1b1";
		       from1('0','contenidocero','cargando.php');
	    	   btn3=1;
	    	} 

	    	else{
	    		divi.style.height="0px";
				sleep(1000).then(() => {

         		divi.innerHTML="";
         		if (btn3!=1) {menu(id,true);} else{reiniciarbotones(); };
         		

          		});
	    	};
	        break;

	         case 4:
	       if (btn1==0 && btn2==0 && btn3==0 && btn4==0 && btn5==0 && btn6==0  ) {
		    	divi.style.height="400px";
		    	divi.style.background="rgb(226, 226, 226)";
		    	boton.style.background="#b1b1b1";
		       from1('0','contenidocero','acerca.php');
	    	   btn4=1;
	    	} 

	    	else{
	    		divi.style.height="0px";
				sleep(1000).then(() => {

         		divi.innerHTML="";
         		if (btn4!=1) {menu(id,true);} else{reiniciarbotones(); };
         		

          		});
	    	};
	        break;

	         case 5:
	       if (btn1==0 && btn2==0 && btn3==0 && btn4==0 && btn5==0 && btn6==0  ) {
		    	divi.style.height="80px";
		    	divi.style.background="rgb(226, 226, 226)";
		    	boton.style.background="#b1b1b1";
		       from1('0','contenidocero','btnnombre.php');
	    	   btn5=1;
	    	} 

	    	else{
	    		divi.style.height="0px";
				sleep(1000).then(() => {

         		divi.innerHTML="";
         		if (btn5!=1) {menu(id,true);} else{reiniciarbotones(); };
         		

          		});
	    	};
	        break;

	         case 6:
	       if (btn1==0 && btn2==0 && btn3==0 && btn4==0 && btn5==0 && btn6==0  ) {
		    	divi.style.height="80px";
		    	divi.style.background="rgb(226, 226, 226)";
		    	boton.style.background="#b1b1b1";
		       from1('0','contenidocero','btnservicios.php');
	    	   btn6=1;
	    	} 

	    	else{
	    		divi.style.height="0px";
				sleep(1000).then(() => {

         		divi.innerHTML="";
         		if (btn6!=1) {menu(id,true);} else{reiniciarbotones(); };
         		

          		});
	    	};
	        break;


	    default:
	        alert("0");
		}
	};


	function moverplanes(direccion){
		var div=document.getElementById("planes");

		if (direccion==1) {
			var scroll=div.scrollLeft-800;
				scrollTo(div,scroll,300);
		} else{
			var scroll=div.scrollLeft+800;
				scrollTo(div,scroll,300);

		};

	};


function verPromos(ver){
		var divi=document.getElementById("promos");
		var contdivi=document.getElementById("contPromociones");

		if (ver==1) {
	    	divi.style.right="0%";
	    	contdivi.style.visibility="visible";
		} else{
	    	divi.style.right="-100%";
	    	contdivi.style.visibility="hidden";
		};
}

function verInformativos(ver){
		var divi=document.getElementById("informativos");
		var contdivi=document.getElementById("contInformativos");

		if (ver==1) {
	    	divi.style.right="0%";
	    	contdivi.style.visibility="visible";
		} else{
	    	divi.style.right="-100%";
	    	contdivi.style.visibility="hidden";
		};
}

	function scrollTo(element, to, duration) {
    if (duration <= 0) return;
    var difference = to - element.scrollLeft;
    var perTick = difference / duration * 10;

    setTimeout(function() {
        element.scrollLeft = element.scrollLeft + perTick;
        if (element.scrollLeft === to) return;
        scrollTo(element, to, duration - 10);
    }, 10);
}

	String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, "")};



<!-- metodo que se usa al oprimir enter en input de busqueda-->

     function anular(e) {
          from(document.form2.serviciobuscado.value,'contenido','busquedaservicio.php'); 
          tecla = (document.all)?e.keyCode:e.which;
          return (tecla != 13);


     };

      function anular2(e) {
          from(document.form2.nombrebuscado.value,'contenido','busquedanombre.php'); 
          tecla = (document.all)?e.keyCode:e.which;
          return (tecla != 13);


     };
