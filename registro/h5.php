

          <?php if ($_GET['id']=="true") {?>
        <div class="panelh" >             
          <div class="column ">
            <input type="radio" name="ludom" id="mananald" value="1" onchange="from(document.form1.ludom.value,'horariosparallenar5','horariosparallenar5.php')">
            <label for="mananald">Mañana - tarde</label>

          </div>
      
     
          <div class="column ">
            <input type="radio" name="ludom" id="tardeld" value="0" onchange="from(document.form1.ludom.value,'horariosparallenar5','horariosparallenar5.php')">
            <label for="tardeld">Jornada continua       </label>
             
          </div>
        </br>
        </br>
        </br>

           <div id="horariosparallenar5">
                
              </div>
        </div> 
      <?php } else {?>
        
      <?php }
       ?>