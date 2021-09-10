


          <?php if ($_GET['id']=="true") {?>
        <div class="panelh" >             
          <div class="column ">
            <input type="radio" name="dofes" id="mananadyf" value="1" onchange="from(document.form1.dofes.value,'horariosparallenar4','horariosparallenar4.php')">
            <label for="mananadyf">Mañana - tarde</label>

          </div>
      
     
          <div class="column ">
            <input type="radio" name="dofes" id="tardedyf" value="0" onchange="from(document.form1.dofes.value,'horariosparallenar4','horariosparallenar4.php')">
            <label for="tardedyf">Jornada continua       </label>
             
          </div>
        </br>
        </br>
        </br>

           <div id="horariosparallenar4">
                
              </div>
        </div> 
      <?php } else {?>
        
      <?php }
       ?>