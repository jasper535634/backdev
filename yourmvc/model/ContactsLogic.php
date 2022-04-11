<?php
require_once 'model/DataHandler.php';

class ContactsLogic{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost","mysql","mvc","root","");
    }
    public function __destruct()
    {
        
    }

    public function createContact(){

    }

    public function readContact(){

    }

    public function readContacts(){
        try {

        }catch(Exception $e){
            throw $e;
        }
    }

    public function opdateContact(){

    }

    public function deleteContact(){

    }
}
?>