<?php
require_once('DataHandler.php');
class Products
{

    function __construct()
    {
        $this->datahandler = new dataHandler( "localhost", "mysql", "stardunk_levels", "root", "", );

    }
    function __destruct()
    {

    }
    function createProduct()
    {

    }
    function readProduct()
    {

    }
    function listProduct()
    {
        $sql = "SELECT * FROM products";
        $result = $this->datahandler->readsData($sql);
        //$result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
       return $res;
    }
    
    function updateProduct()
    {
    }
    function deleteproduct()
    {
    }
}

?>