<?php

class User {
    protected  $firstname;
    protected  $lastname;
    protected  $email;
    protected  $age;

    public function __construct($firstname, $lastname, $email, $age)
   {
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->email = $email;
      $this->age= $age;

   }

   public function setFirstname($firstname){
    $this->firstname = $firstname;
   }

   public function setLastname($lastname){
    $this->lastname = $lastname;
   }

   public function setEmail($email){
    $this->email = $email;
   }

   public function setAge($age){
    $this->age = $age;
   }
   
    public function isValid(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL) && (!empty($this->firstname)) && (!empty($this->lastname)) && $this->age >= 13)
            return 1;
        else
            return 0;
    }

    public function save(){
        if(isValid()){
            DBConnection::saveUser($this);
            }
    }
    
    
}

//$user = new User("dd", "dd", "amadddmail.r", 15);
//print $user->isValid();