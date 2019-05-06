<?php

require 'Product.php';
require 'EmailSender.php';
require 'DBConnection.php';

class Exchange extends Product {

    protected  $receiver;
    protected  $product;
    protected  $owner;
    protected  $BeginningDate;
    protected  $EndingDate;

    
    public function __construct($receiver, $product, $owner, $BeginningDate, $EndingDate)
   {
      $this->receiver = $receiver;
      $this->product = $product;
      $this->owner = $owner;
      $this->BeginningDate = $BeginningDate;
      $this->EndingDate = $EndingDate;
   }
   
   public function setReceiver($receiver){
    $this->receiver = $receiver;
   }

   public function setProduct($product){
    $this->product = $product;
   }

   public function setOwner($owner){
    $this->owner = $owner;
   }

   public function setBegginingDate($BeginningDate){
    $this->BeginningDate = $BeginningDate;
   }

   public function setEndingDate($EndingDate){
    $this->EndingDate = $EndingDate;
   }

   public function isValid(){
        if($this->receiver->isValid() && $this->product->isValid() && $this->BeginningDate < $this->EndingDate){
            return 1;
        }
        else{
            return 0;
        }
    }

   public function save(){
    if($this->isValid()){
        try{
            DBConnection::saveExchange($this);
        }
        catch(Exception $e){
            echo $e;
        }
        }
    }
}

// $userOwner = new User("dd", "dd", "amadd@dmail.r", 15);
// $userReceiver = new User("aa", "aa", "amadd@dmail.r", 25);
// $product = new Product("chaise", $userOwner);
// $end = "2019-06-27";
// $begin = "2019-05-15";
// $exchange = new Exchange($userReceiver, $product, $userOwner, $begin, $end);
// print $exchange->save();
// && $this->BeginningDate < $this->EndingDate
//(new DateTime()->format('Y-m-d') < $this->BeginningDate)q