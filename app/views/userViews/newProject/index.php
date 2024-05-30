<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="public/images/icon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/users/newProject.css">
    <link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/users/styles0.css">
    <script src="<?php echo constant('PUBLIC');?>js/icons.js"></script>

    <title>GESTION DE PROYECTOS</title>
  </head>
  <body>
    
    <?php include "app/views/userViews/navbars.php"; ?>
    
    <div class="main">

      <div class="projectDiv">
        <h2>Agregar Proyecto</h2>
        <div class="headerContent">

          <form action="<?php echo constant('URL').'newProject/addNew';?>" method="post">
            <div class="formDiv">
              <input type="text" placeholder="Título" name="title">
            </div>
            <div class="formDiv">
              <textarea placeholder="Descripción" name="desc"></textarea>
            </div>
            <div class="formDiv" id="dateDiv">
              <p class="dateTitle">Fecha de entrega:</p>
              <select name="year">
                <option value="0">Año</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
              </select>
        
              <select name="month">
                <option value="0">Mes</option>
                <?php
                $months= ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
                for($i = 0; $i < 12; $i++){
                  $v= $i + 1;
        
                  print "<option value='".$v."'>
                  ".$months[$i]."</option>";
                }
                ?>
              </select>
        
              <select name="day">
                <option value="0">Día</option>
                <?php
                for($i = 1; $i <= 31; $i++){ ?>
                  <option value='<?php echo $i ?>'>
                  <?php echo $i; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="formDiv">
              <input type="submit" value="Crear" name='saveSubmit'>
            </div>
          </form>

        </div>
      </div>

    </div>

  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</html>