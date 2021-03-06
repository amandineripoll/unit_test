<?php


class Product {

    protected $name;
    protected $user;

    public function __construct($name, $user)
    {
        $this->name = $name;
        $this->user = $user;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setUser($user){
        $this->user = $user;
    }
    
    public function getUser(){
        return $this->user;
    }

    public function isValid(){
        if($this->user->isValid() && (!empty($this->name)))
            return 1;
        else
            return 0;
    }
    
    public function save(){
        if(isValid()){
            DBConnection::saveProduct($this);
            }
        }
}
