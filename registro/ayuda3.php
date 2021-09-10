

      <?php if ($_GET['id']=="true") {?>
        <div class="" > 
             <img class="emoji" src="../directorio/imagenes/emo1.png" alt=""><span>Hey ! mucho cuidado aquí, en esta casilla va el celular principal de la empresa, es el número que se mostrará en el directorio offline (sin internet) de la aplicación.</br><img style="margin: auto;" src="imagenes/cel.png" alt=""></span>
             <div class="abrirayuda" id="abrirayuda" onclick="cambiarEstado(8);" style="visibility:visible">?</div> 
            <div class="cerrarayuda" id="cerrarayuda" onclick="cambiarEstado(0);" >X</div>  
        </div> 
      <?php } else {?>
        
      <?php }
       ?>
      