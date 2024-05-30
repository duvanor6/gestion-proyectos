<?php

class InsertModel extends Model {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function addProject($dates){
    try {
    	$date= date('Y-m-d', mktime(0,0,0, $dates['month'], $dates['day'], $dates['year']));
    	
    	$sql= 'INSERT INTO PROJECTS (USERNAME, TITLE, DESCRIPTION, DELIVDATE, STATUS, PERCENT) VALUES (:User, :Title, :Desc, :Date, :Status, "0")';
      $query= $this->db->prepare($sql);
      $query->execute([
      	  ':User' => $_SESSION['SeUser'],
      	  ':Title' => $dates['title'],
      	  ':Desc' => $dates['desc'],
      	  ':Date' => $date,
      	  ':Status' => 'pending'
      	]);
      echo '<script> window.location.replace("'.
      	constant('URL').'") </script>';
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function addTask($title, $desc, $idProject){
    try {
    	$sql= 'INSERT INTO TASKS (USERNAME, IDPROJECT, TITLE, DESCRIPTION, STATUS) VALUES (:User, :IdProject, :Title, :Desc, :Status)';
      $query= $this->db->prepare($sql);
      $query->execute([
      	  ':User' => $_SESSION['SeUser'],
      	  ':IdProject' => $idProject,
      	  ':Title' => $title,
      	  ':Desc' => $desc,
      	  ':Status' => 'pending'
      	]);
      	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }

  public function addPersonal($idProject, $idPersonal){
    try {
      $sql= 'INSERT INTO user_project_relations (USERNAME, IDPROJECT, ROLE) VALUES (:User, :IdProject, :IdPersonal)';
      $query= $this->db->prepare($sql);
      $query->execute([
          ':User' => $idPersonal,
          ':IdProject' => $idProject,
          ':IdPersonal' => "developer",
        ]);
        
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }

  public function addRecursos($idProject, $nombreRecurso, $descripcionRercurso, $valorRecurso){
    try {
      $sql= 'INSERT INTO recursos (project, nombre, descripcion, valor) VALUES (:IdProject, :Nombre, :Descripcion, :Valor)';
      $query= $this->db->prepare($sql);
      $query->execute([
          ':IdProject' => $idProject,
          ':Nombre' => $nombreRecurso,
          ':Descripcion' => $descripcionRercurso,
          ':Valor' => $valorRecurso,
        ]);
        
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function addFile($idProject, $idTask, $file){
  	try {
    	$sql= 'INSERT INTO FILES (USERNAME, IDPROJECT, IDTASK, FILE) VALUES (:User, :IdProject, :IdTask, :File)';
      $query= $this->db->prepare($sql);
      $query->execute([
      	  ':User' => $_SESSION['SeUser'],
      	  ':IdProject' => $idProject,
      	  ':IdTask' => $idTask,
      	  ':File' => $file,
      	]);
      	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
}

?>