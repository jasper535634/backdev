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
                    $this->collectUpdateContact($_REQUEST['id']);
                    break;
            
                case 'delete':
                   $this->collectDeleteContact($_REQUEST['id']);
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
        if (isset($_REQUEST['submit'])){
            $res=$this->ContactsLogic->createContact();
            $contact=$this->Output->createTable($res, "");
            include "view/read.php";
        }else{
            $id         = isset($_REQUEST['id'])? $_REQUEST['id'] : null;
            $name       = isset($_REQUEST['name'])? $_REQUEST['name']: null;
            $phone      = isset($_REQUEST['phone'])? $_REQUEST['phone']: null;
            $email      = isset($_REQUEST['email']) ? $_REQUEST['email']: null;
            $location   = isset($_REQUEST['location'])? $_REQUEST['location']: null;

            include "view/formcontact.php";
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
        $id         = isset($_REQUEST['id'])? $_REQUEST['id'] : null;
        $name       = isset($_REQUEST['name'])? $_REQUEST['name']: null;
        $phone      = isset($_REQUEST['phone'])? $_REQUEST['phone']: null;
        $email      = isset($_REQUEST['email']) ? $_REQUEST['email']: null;
        $location   = isset($_REQUEST['location'])? $_REQUEST['location']: null;

        if (isset($_REQUEST['submit'])){

            $contact = $this->ContactsLogic->updateContact($id, $name, $phone, $email, $location);

            $this->collectReadContact($id);

        }

        $contacts = $this->ContactsLogic->readContact($id);
        $res = $contacts->fetch(PDO::FETCH_NUM);
        [$id, $name, $phone, $email, $location] = $res;

        $msg ="Edit this contact";
        $operation ="update&id=$id";
        include 'view/formcontact.php';
        
    }
    public function collectDeleteContact($id)
    {
        $deleted = $this->ContactsLogic->deleteContact($id);

        include 'view/delete.php';
    }
}


?>