<?php

require 'EmailSender.php';
require 'DBConnection.php';

class Exchange {

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
        if($this->isValid() && $this->receiver->age >= 18){
            try{
                DBConnection::saveExchange($this);
            }
            catch(Exception $e){
                echo $e;
            }
        } else {
            try{
                $message = "Veuillez renseigner les informations complémentaires indiquées en pièce jointe";
                EmailSender::sendEmail($this->receiver->email, $message);
            }
            catch(Exception $e){
                echo $e;
            }
        }
    }
}