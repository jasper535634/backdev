<?php
require_once('model/ContactsLogic.php');
require_once('model/Output.php');

class ContactsController
{
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
        $this->Output = new Output();
        
    }
    public function __destruct(){}

    public function handleRequest(){
        try{
            $op = isset($_GET['op']) ? $_GET['op'] : '';
            switch ($op) {
                case 'create':
                    $this->collectCreateContact();
                    break;
                case 'read':
                    $this->collectReadContact($_REQUEST['id']);
                    break;
            
                case 'update':
                   echo "update";
                    $this->collectUpdateContact($_REQUEST['id']);
                    break;
            
                case 'delete':
                   echo "delete";
                   
                    break;
            
                case 'search':
                    echo "search";
                    break;
            
                case'readpage':
                    echo "readpage";
                    break;
                default:
                $this->collectReadAllContacts();
                    break;
                    
            }
        }catch (Exception $e){
            throw $e;
        }
    }
    public function collectCreateContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $res=$this->ContactsLogic->createContact();
            $contact=$this->Output->createTable($res, "");
            include "view/read.php";
        }else{
            include "view/create.php";
        }
    }
    public function collectReadContact($id)
    {
        $res = $this->ContactsLogic->readContact($id);
        // var_dump($res);
        $contacts = $this->Output->createTable($res, "");
        include 'view/reads.php';
    }
    public function collectReadAllContacts()
    {
        $res = $this->ContactsLogic->readAllContacts();
        // var_dump($res);
        $contacts = $this->Output->createTable($res, "");
        include 'view/reads.php';
    }
    public function collectUpdateContact($id)
    {
        
    }
    public function collectDeleteContact($id)
    {
        $this->ContactsLogic->deleteContact($id);
    }
}


?>