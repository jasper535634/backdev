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
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $location = $_POST["location"];

        if (empty($name) or empty($phone) or empty($email) or empty($location)) {
            $msg = "Alle velden zijn vereist";
        } else {
            $sql = "INSERT INTO contacts (name, phone, email, location) 
        VALUES('$name', '$phone', '$email', '$location')";
            $lastid = $this->DataHandler->createData($sql);
            $result = $this->readContact($lastid);
            $res = $result->fetchAll();
            //laat weten of het gelukt is en laat het  resultaat zien
            return $res;


        }

    }

    public function readContact($id){
        try {
            $sql = "SELECT * FROM contacts WHERE id=" .$id;
            return $this->DataHandler->readsData($sql);
        }catch(Exception $e){
            throw $e;
        }

    }

    public function readAllContacts(){
        try {
            $sql = "SELECT * FROM contacts";
            return $this->DataHandler->readsData($sql);
        }catch(Exception $e){
            throw $e;
        }
    }

    public function opdateContact()
    {

    }

    public function deleteContact($id)
    {
        $sql = "DELETE  FROM contacts WHERE id=".$id;
        $result = $this->datahandler->deleteData($sql);
        return $result;
    }
}
?>