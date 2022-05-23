<?php 
require_once 'model/DataHandler.php';

class contentsLogic{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost","mysql","mvc","root","");
        $this->Output = new output();
    }
    public function __destruct()
    {
        
    }
    public function readContents(){
        try {
            $sql = "SELECT *  FROM contents WHERE id=1";
            return $this->DataHandler->readsData($sql);
        }catch(Exception $e){
            throw $e;
        }
    }




}






?>