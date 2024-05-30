<?php

class Register extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderLogins('register/index');
    $this->cancelBtn();
  }
  
  public function cancelBtn(){
    if(isset($_POST['cancelBtn'])){
      header('location: '.constant('URL').'register');
    }
  }
    
  
  
  public function echoo($param= null){
    echo 'PARAMM'.$param[1];
  }
  
  public function addUser() {
    if ($_POST['checkAccessPost'] != 'TRUE') {
        header('location: ' . constant('URL') . 'register');
        return false;
    }
    
    $names = $_POST['names'];
    $surnames = $_POST['surnames'];
    $username = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $profession = $_POST['profession'];
    
    $dates = [
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
    
    $model = $this->loadLoginsModel('registerModel');
    $model->conInsert($dates);
}

}

?>