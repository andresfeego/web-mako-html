

      

      <?php if ($_GET['id']=="true") {?>
        <div class="panelh" >             
          <div class="column ">
            <input type="radio" name="lusab" id="mananals" value="1" onchange="from(document.form1.lusab.value,'horariosparallenar3','horariosparallenar3.php')">
            <label for="mananals">Mañana - tarde</label>

          </div>
      
     
          <div class="column ">
            <input type="radio" name="lusab" id="tardels" value="0" onchange="from(document.form1.lusab.value,'horariosparallenar3','horariosparallenar3.php')">
            <label for="tardels">Jornada continua       </label>
             
          </div>
        </br>
        </br>
        </br>

           <div id="horariosparallenar3">
                
              </div>
        </div> 
      <?php } else {?>
        
      <?php }
       ?>