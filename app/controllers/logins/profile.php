<?php

class Profile extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderLogins('imgRegister/index');
    
    if($_POST['checkAccess']!='TRUE' && 
     $_POST['checkAccessPost']!='TRUE'){
      header('location: '.constant('URL').'register');
      return false;
    }
  }
  
  public function getDates(){
    $names= $_POST['namesPost'];
    $surnames= $_POST['surnamesPost'];
    $username= $_POST['usernamePost'];
    $pass= $_POST['passPost'];
    $address = $_POST['addressPost'];
    $phone = $_POST['phonePost'];
    $gender = $_POST['genderPost'];
    $birthdate = $_POST['birthdatePost'];
    $profession = $_POST['professionPost'];


    $dates= [
        'names' => $names,
        'surnames' => $surnames,
        'username' => $username,
        'pass' => $pass,
        'address' => $address,
        'phone' => $phone,
        'gender' => $gender,
        'birthdate' => $birthdate,
        'profession' => $profession
    ];
    
    return $dates;
  }
  
  public function sendImage(){
    $dates= $this->getDates();
    
    if(isset($_POST['skip'])){
      $this->skipImage($dates);
      
    } else if(isset($_POST['send'])){
      if(empty($_FILES['image']['name'])){
        $this->skipImage($dates);
      } else {
        $this->registerImage($dates);
      }
    }    
  }
  
  public function skipImage($dates){
    $imgName= 'default.jpg';
    
    $model= $this->loadLoginsModel('registerModel');
    $model->conInsert($dates, $imgName);
  }
  
  public function registerImage($dates){
    $img= $_FILES['image'];
    $imageModel= $this->loadLoginsModel('imagesModel');
    $image= $imageModel->checkImage($img);
    
    $model= $this->loadLoginsModel('registerModel');
    $model->conInsert($dates, $image);
  }
  
  
}

?>