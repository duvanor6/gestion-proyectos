<?php include 'app/views/userViews/headerTop.php'; ?>
<link rel="stylesheet" type='text/css' href="<?php echo constant('PUBLIC');?>css/users/select-list0.css">
<?php include 'app/views/userViews/headerBottom.php';
	 		include "app/views/userViews/navbars.php"; ?>
    
    <div class="main">

      <div class="leftList">

        <div class="projectsDiv">
          <p id="titleLeftList">Mis Proyectos</p>
          <ul>
          	<?php foreach($this->selectAll as $row){ ?>
            <a href="<?php echo constant('URL').'select/view/'.$row['ID'];?>"><li>
            	<?php echo $row['TITLE'];?></li></a>
            <?php } ?>
          </ul>
        </div>

        

      </div> 

      <div class="content">
        <div class="projectDiv">
        <?php
        if(!empty($this->selectProject)){
        	foreach($this->selectProject as $row){ 
        		$percent= $row['PERCENT'];
        		if($row['STATUS']=='Incomplete'){
        			$colorLine= 'progressIncomplete';
        		} else {
        		if($percent<20){ $colorLine= 'progress0'; }
        		else if($percent<40 && $percent>=20){ 
        			$colorLine= 'progress20'; }
        		else if($percent<60 && $percent>=40){ 
        			$colorLine= 'progress40'; }
        		else if($percent<80 && $percent>=60){ 
        			$colorLine= 'progress60'; }
        		else if($percent<100 && $percent>=80){ 
        			$colorLine= 'progress80'; }
        		else if($percent==100){ $colorLine= 'progress100'; }
        		}
        ?>
          <h2><?php echo $row['TITLE'];?></h2>
          <div class="projectContent">
            <div class="actionsDiv">
              
              <button class="actionBtn" id='btnModalDelete'>
                Eliminar Proyecto <i class="fas fa-trash-alt"></i>
              </button>
              <a href="<?php echo constant('URL').'select/completedProject/'.$row['ID'];?>">
                <button class="actionBtn">
                  Completado <i class="fas fa-check"></i>
                </button>
              </a>
              <a href="#form">
                <button class="actionBtn" id="formTaskBtn">
                  Agregar Tarea <i class="fas fa-plus"></i>
                </button>
              </a>
              <a href="#form">
                <button class="actionBtn" id="formUsersBtn">
                  Agregar Personal <i class="fas fa-plus"></i>
                </button>
              </a>
              <a href="#form">
                <button class="actionBtn" id="formRecursos">
                  Agregar Recurso <i class="fas fa-plus"></i>
                </button>
              </a>
              <p class="delivery-date">Fecha de entrega: 
	            	<?php echo $row['DELIVDATE'];?>
	            </p>
            </div>

            <div class="lineDiv"></div>
            <p class="progress-title">Progreso del proyecto:</p>
            <div class="progressLine">
              <div id="progress-bar" class='<?php echo $colorLine; ?>' style='width: <?php echo $percent;?>%;'></div>
              <div class="percent"><?php echo $percent;?>%</div>
            </div>
            <div class="progress-title">Estado: 
            <p id="statementText" class='<?php echo $row['STATUS'];?>Return'>
            	<?php echo $row['STATUS'];?></p></div>

            <div class="tasks" id="tasksDiv">
	           
              <br>
              <h3>Tareas pendientes: </h3>
              <?php 
              if(!empty($this->selectTasks)){
              	foreach($this->selectTasks as $task){ 
              ?>
              <div class="task">
	              <div class="lineDiv"></div>
  	            <p class="task-title"><?php echo $task['TITLE'];?></p>
    	          <p class="task-desc"><?php echo $task['DESCRIPTION'];?></p>

      	        <?php 
      	        $filesRows= $this->model->selectFilesAll($task['ID']);
      	        if(!empty($filesRows)){
      	          foreach($filesRows as $file){ ?>
      	        <a href="<?php echo constant('URL').
      	          'iframe/view/'. $file['IDPROJECT'].'/'
      	          .$file['IDTASK'].'/'. $file['ID'];?>">
      	        <div class="fileDiv">
        	        <p id="fileIcon"></p>
          	      <p id="fileInfo"></p>
            	    <p id="fileName"><?php echo $file['FILE'];?></p>
              	</div><?php 
              	  } 
              	} ?></a>
      	        <p class="completBtns">Completado: 
            	    <a href='<?php echo constant('URL').'select/completedTask/'.$task['IDPROJECT'].'/'. $task['ID'];?>'>
            	    	<button><i class="fas fa-check"></i>
            	    	</button>
            	    </a>
          	    </p>
        	      
  	          </div>
  	          <?php 
                }
        			} else {
        				echo '<h2>Sin tareas!</h2>';
        			} 
  	          ?>
		         </div>
            
            <div id="formTasksDiv">
              <div class="lineDiv"></div>
              <h3>Agregar Tarea:</h3>
              <form class="formDiv" method="post"
               enctype="multipart/form-data" id="taskForm">
                <div class="inputDiv">
                  <input type="text" id="task-title"
                  placeholder="Título">
                </div>

                <div class="inputDiv">
                  <textarea id="task-description" 
                  placeholder="Descripcion"></textarea>
                </div>

                <div class="inputDiv">
                  <input type="button" id="btnSendTask" value="Agregar">
                </div>
                
                <p id="errorLine"></p>
                <input type="hidden" id="idProject" 
                value="<?php echo $row['ID'];?>">
              </form>
            </div>


            <div id="formRecursosDiv">
              <div class="lineDiv"></div>
              <h3>Agregar Recurso:</h3>
              <form class="formDiv" method="post"
               enctype="multipart/form-data" id="recursosForm">
                <div class="inputDiv">
                  <input type="text" id="recurso-title"
                  placeholder="Nombre">
                </div>

                <div class="inputDiv">
                  <textarea id="recurso-description" 
                  placeholder="Descripcion"></textarea>
                </div>

                <div class="inputDiv">
                  <input type="number" id="recurso-valor"
                  placeholder="Valor">
                </div>

                <div class="inputDiv">
                  <input type="button" id="btnSendRecurso" value="Agregar">
                </div>
                
                <p id="errorLine"></p>
                <input type="hidden" id="idProject" 
                value="<?php echo $row['ID'];?>">
              </form>
            </div>



            <div id="formUsersDiv">
              <div class="lineDiv"></div>
              <h3>Agregar Personal:</h3>

              <form class="formDiv" method="post"
               enctype="multipart/form-data" id="personalForm">
                

                <div class="inputDiv">
                <select id="developerlist" class="inputForm">
                  <option default-value="">Desarrolladores</option>
                  <?php
                    
                    foreach ($this->selectAllDevs as $developer) {
                        echo "<option value='" . $developer['USERNAME'] . "'>" . $developer['NAME'] . " " . $developer['SURNAME'] . "</option>";
                    }
                  ?>
                </select>
                </div>

                <div class="inputDiv">
                  <input type="button" id="btnAddPersonalButton" value="Agregar">
                </div>
                
                <p id="errorLine"></p>
                <input type="hidden" id="idProject" 
                value="<?php echo $row['ID'];?>">
              </form>
            </div>

            <hr id="form" class="hrForm">

						<div id="myModal" class="modal">
  						<div class="modal-content">
    						<span class="close closeIcon">&times;</span>
    						<h1 class="modal-content_text">
    							Eliminar:  <?php echo $row['TITLE'];?>
    						</h1>
    						<h2 class="modal-content_text">
    							Estas seguro que deseas eliminar el proyecto?
    						</h2>
    						<a class="modal-content_link" href="<?php echo constant('URL').'select/delete/'.$row['ID'];?>">Eliminar</a>
    						<button class="close modal-content_btn">Cancelar</button>
  						</div>
						</div>
          
          </div>
          
        <?php 
          }
        } else {
          echo '<h2> No results! </h2>';
        } ?>
        </div>
	  	</div>

      <div class="rightList">

      <div class="projectsDiv">
  <p id="titleLeftList">Desarrolladores</p>
  <?php if (!empty($this->selectUsersForProject)) { // Verifica si no está vacío ?>
  <table>
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->selectUsersForProject as $row){ ?>
      <tr>
        <td><?php echo $row['USERNAME']; ?></td>
        <td><?php echo $row['NAME'].' '.$row['SURNAME']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } else { ?>
    <div class="devs">
      <p>No hay desarrolladores asignados.</p>
      </div>
  <?php } ?>
</div>


        <div class="projectsDiv">
  <p id="titleLeftList">Recursos</p>
  <?php 
    if (is_array($this->selectProjectRecursos) && count($this->selectProjectRecursos) > 0) { 
      $totalValor = 0; // Inicializar la variable para el total
  ?>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->selectProjectRecursos as $row) { 
        $totalValor += $row['valor']; // Sumar el valor al total
      ?>
      <tr>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['valor']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="1">Total</td>
        <td><?php echo $totalValor; ?></td>
      </tr>
    </tfoot>
  </table>
  <?php 
    } else { 
  ?>

<div class="devs">
      <p>No hay recursos asignados.</p>
      </div>
  <?php } ?>
</div>      

      </div> 
      
		</div>

  
  </body>
  <script src="<?php echo constant('PUBLIC');?>js/users/select-project1.js"></script>
  <script src="<?php echo constant('PUBLIC');?>js/users/navbars.js"></script>
</html>