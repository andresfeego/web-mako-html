

      <?php if ($_GET['id']=="true") {?>
        <div class="panelh" >             
          <div class="column ">
            <input type="radio" name="luvie" id="mananalv" value="1" onchange="from(document.form1.luvie.value,'horariosparallenar','horariosparallenar1.php')">
            <label for="mananalv">Mañana - tarde</label>

          </div>
      
     
          <div class="column ">
            <input type="radio" name="luvie" id="tardelv" value="0" onchange="from(document.form1.luvie.value,'horariosparallenar','horariosparallenar1.php')">
            <label for="tardelv">Jornada continua       </label>
             
          </div>
        </br>
        </br>
        </br>

           <div id="horariosparallenar">
                
              </div>
        </div> 
      <?php } else {?>
        
      <?php }
       ?>
      