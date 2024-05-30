<?php

class SelectModel extends Model {
  
  public function __construct(){
    parent::__construct();
  }
  
  public function selectProjects(){
    try {
    	$sql= 'SELECT * FROM PROJECTS WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" ORDER BY DELIVDATE';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }

  public function selectRecursosForProjects($idproject){
    try {
      $sql= 'SELECT * FROM RECURSOS WHERE PROJECT= "'.$idproject.'"';
      $data= null;
      
      if($query= $this->db->query($sql)){
         while($row= $query->fetch(PDO::FETCH_ASSOC)){
           $data[] = $row; 
         }
      }
      return $data;
      
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectCompletedProjects(){
    try {
    	$sql= 'SELECT * FROM PROJECTS WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" AND STATUS= "Completed" 
      ORDER BY DELIVDATE';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectIncompleteProjects(){
    try {
    	$sql= 'SELECT * FROM PROJECTS WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" AND STATUS= "Incomplete" 
      ORDER BY DELIVDATE';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectPendingProjects(){
    try {
    	$sql= 'SELECT * FROM PROJECTS WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" AND STATUS= "Pending" 
      ORDER BY DELIVDATE';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectProject($id){
    try {
    	$sql= 'SELECT * FROM PROJECTS WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" AND ID= "'.$id.'"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectPendingTasks($idProject){
    try {
    	$sql= 'SELECT * FROM TASKS WHERE USERNAME= "'.$_SESSION['SeUser'].'" AND IDPROJECT= "'.$idProject.'" AND STATUS= "Pending"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectCompletedTasks($idProject){
    try {
    	$sql= 'SELECT * FROM TASKS WHERE USERNAME= "'.$_SESSION['SeUser'].'" AND IDPROJECT= "'.$idProject.'" AND STATUS= "Completed"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectIncompleteTasks($idProject){
    try {
    	$sql= 'SELECT * FROM TASKS WHERE USERNAME= "'.$_SESSION['SeUser'].'" AND IDPROJECT= "'.$idProject.'" AND STATUS= "Incomplete"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectTasksAll($idProject){
    try {
    	$sql= 'SELECT * FROM TASKS WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" AND IDPROJECT= "'.$idProject.'"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }

  public function selectUsersForProject($project){
    try {
        $sql = "SELECT * FROM usernames 
                INNER JOIN user_project_relations ON usernames.username = user_project_relations.username
                WHERE user_project_relations.IDPROJECT = :project_id AND user_project_relations.role = 'developer'";
               
        $stmt = $this->db->prepare($sql);               
        $stmt->execute([':project_id' => $project]);        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        
        return $data;
        
    } catch (PDOException $e) {        
        echo 'Error DB: ' . $e->getMessage();
        return []; 
    }
}

public function selectAllDevelopers(){
  try {
      
      $sql = "SELECT * FROM usernames WHERE PROFESSION = 'developer' and statement = 'Avaiable'";
      $stmt = $this->db->prepare($sql);      
      $stmt->execute();      
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $data;
      
  } catch (PDOException $e) {      
      echo 'Error DB: ' . $e->getMessage();
      return []; 
  }
}

  
  public function selectTask($id){
    try {
    	$sql= 'SELECT * FROM TASKS WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" AND ID= "'.$id.'"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectFilesAll($idTask){
    try {
    	$sql= 'SELECT * FROM FILES WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" AND IDTASK= "'.$idTask.'"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
  public function selectFile($idProject, $idTask, $id){
    try {
    	$sql= 'SELECT * FROM FILES WHERE USERNAME= "'.
      $_SESSION['SeUser'].'" AND IDPROJECT= "'.$idProject.'" 
      AND IDTASK= "'.$idTask.'" AND ID= "'.$id.'"';
      $data= null;
      
      if($query= $this->db->query($sql)){
       	while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	$data[] = $row; 
       	}
      }
      return $data;
    	
    } catch (PDOException $e) {
      echo 'Error DB: '.$e->getLine();
    }
  }
  
}

?>