function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();
//***************************************************************************************
function from(id,ide,url){
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la página en el caché...
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion.open("GET",vinculo,true);//ponemos true para que la petición sea asincrónica
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }else
               {
      document.getElementById(ide).innerHTML="<div class='cargando' style='height: 100%;margin: auto; text-align: center; color:#b1b1b1;'> <div class='lds-css ng-scope' style='padding-top: 40%; height: 100%;'> <div style='width:100%;height:100%;margin:auto;' class='lds-ripple'>  <div></div>    <div></div>    </div>    </div>   </br><p style='font-size: 2.5em'> Cargando </p>  </div> ";


                }
       }
       miPeticion.send(null);

}
//************************************************************************************************
function limpiar()
{
	document.form.reset();
	
}