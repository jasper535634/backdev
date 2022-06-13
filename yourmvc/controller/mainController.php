<?php
require_once "contentsController.php";
require_once "contactsController.php";
class mainController{
    public function __construct()
    {
        $this->Contents = new ContentsController();
        $this->Contacts = new ContactsController();

    }
    public function handleRequest()
    {
        try{
        $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : "";
        switch($controller){
            case 'contents':
                $this->Contents->handleRequest();
                break;

            case 'contacts':
                $this->Contacts->handleRequest();
                break;
            default:
            $this->Contacts->handleRequest();
            break;
        }

        }catch(Exception $e){
            $errors = $e->getMessage();
        }
    }
}
?>