<?php

class RegisterModel extends Model {

  public function __construct(){
    parent::__construct();
  }
 
  public function checkUsernameModel($user){
    try {
      $sql= 'SELECT * FROM USERNAMES WHERE USERNAME= "'.$user.'"';
      $query= $this->db->query($sql);
      $rows= $query->rowCount();
      
      if($rows > 0){
        return 'false';
      } else {
        return 'true';
      }
      
    }catch(PDOException $e){
      echo $e->getLine();
      echo $e->getMessage();
    }
  }
  
  public function conInsert($dates, $image){
    try {
      $sql = "INSERT INTO usernames (name, surname, username, password, address, phone, gender, birthdate, profession,function, statement) 
      VALUES (:names, :surnames, :username, :password, :address, :phone, :gender, :birthdate, :profession,  :function, :statement)";

        $contEncp= password_hash($dates['pass'], PASSWORD_DEFAULT);
        
        $consult= $this->db->prepare($sql);
        $consult->execute([
          ':names' => $dates['names'],
          ':surnames' => $dates['surnames'],
          ':username' => $dates['username'],
          ':password' => $contEncp,
          ':address' => $dates['address'],
          ':phone' => $dates['phone'],
          ':gender' => $dates['gender'],
          ':birthdate' => $dates['birthdate'],
          ':profession' => $dates['profession'],
          ':function' => 'User',
          ':statement' => 'Avaiable'
        ]);
        
        session_start();
        $_SESSION['SeUser'] = $dates['username'];
        $_SESSION['SeNames'] = $dates['names'];
        $_SESSION['SeSurnames'] = $dates['surnames'];
        $_SESSION['SeFunction'] = 'User';
        header('location: '.constant('URL'));
        
    } catch(PDOException $e) {
        echo $e->getLine();
        echo $e->getMessage();
    }
}


}

?>