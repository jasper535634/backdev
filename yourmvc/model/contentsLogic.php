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




}






?>