<?php
require_once('model/ContactsLogic.php');

class ContactsController
{
    public function construct() {
        $this->ContactsLogic = new ContactsLogic();
    }
    public function destruct(){}
    public function handleRequest(){
        try{
        }catch (Exception $e){
            throw $e;
        }
    }
    public function collectCreateContact(){}
    public function collectReadContact(){
        $contacts = $this->ContactsLogic->readContacts();
        include 'view/contacts.php';
    }
    public function collectUpdateContact(){}
    public function collectDeleteContact(){}
}


?>