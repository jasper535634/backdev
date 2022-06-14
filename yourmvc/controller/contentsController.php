<?php
require_once('model/contactsLogic.php');
require_once('model/output.php');
require_once('model/contentsLogic.php');

class ContentsController
{
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
        $this->Output = new Output();
        $this->contentsLogic = new contentsLogic();
        
    }
    public function __destruct(){}

    public function handleRequest(){
        try{
            $op = isset($_GET['op']) ? $_GET['op'] : '';
            switch ($op) {                
                case'readallpost':
                    $msg = "this is the choice page";
                    $this->collectReadAllContents();
                    break;

                case'readpost':
                    $msg = "this is the choice page";
                    $this->collectReadContent($_REQUEST['id']);
                    break;
                    
                case'readpage':
                    echo "readpage";
                    break;
                case'createcontent':
                    $this->collectCreateContent();
                    break;
                default:
                $this->collectReadAllContents();
                    break;
                    
            }
        }catch (Exception $e){
            throw $e;
        }
    }
    
    public function collectReadContent($id)
    {
        $res = $this->contentsLogic->readContent($id);
        $content = $this->Output->createBlog($res[0], $res[1]);
        // $content = $this->Output->createList($res[1]);
        ?>
        <!-- <pre><?php //var_dump($res);?></pre> -->
        <?php
        
        include 'view/choice.php';
    }
    public function collectReadAllContents()
    {
        // var_dump($_REQUEST);
        $result = $this->contentsLogic->readAllContents();
        $content = $this->Output->createTable($result,"","readpost","contents");
        include 'view/choice.php';
    }

    public function collectCreateContent(){
        // $this->contentLogic->createContent();
        include 'view/createcontent.php';
    }

}



?>