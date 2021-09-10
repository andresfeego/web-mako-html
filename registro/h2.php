
      
      <?php if ($_GET['id']=="true") {?>
        <div class="panelh" >             
          <div class="column ">
            <input type="radio" name="sabad" id="mananasab" value="1" onchange="from(document.form1.sabad.value,'horariosparallenar2','horariosparallenar2.php')">
            <label for="mananasab">Mañana - tarde</label>

          </div>
      
     
          <div class="column ">
            <input type="radio" name="sabad" id="tardesab" value="0" onchange="from(document.form1.sabad.value,'horariosparallenar2','horariosparallenar2.php')">
            <label for="tardesab">Jornada continua       </label>
             
          </div>
        </br>
        </br>
        </br>

           <div id="horariosparallenar2">
                
              </div>
        </div> 
      <?php } else {?>
        
      <?php }
       ?>