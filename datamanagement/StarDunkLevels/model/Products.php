<?php
require_once('DataHandler.php');
class Products
{

    function __construct()
    {
        $this->datahandler = new dataHandler( "localhost", "mysql", "stardunk_levels", "root", "", );
        //$this->datahandler = new Output();
    }
    function __destruct()
    {

    }
    function createProduct()
    {
        echo"ja ik ben hier";
        $product_code = $_POST["product_type_code"];
        $supplier_id = $_POST["supplier_id"];
        $productname = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $other_pr =  $_POST["other_product_details"];

        if (empty($product_code) or empty($supplier_id) or empty($productname) or empty($product_price) or empty($other_pr)) {
            $msg = "Alle velden zijn vereist";
        } else {
            $sql = "INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) 
        VALUES('$product_code', '$supplier_id', '$productname', '$product_price', '$other_pr')";
            $lastid = $this->datahandler->createData($sql);

             $sql = "SELECT * FROM products WHERE product_id=$lastid";
            
            $result = $this->datahandler->readsData($sql);
            $res = $result->fetchAll();
            //laat weten of het gelukt is en laat het  resultaat zien
            return $res;


        }
    }
    function readProduct($id)
    {
    $sql = "SELECT product_name, product_price, other_product_details FROM products WHERE product_id=$id";
    $result = $this->datahandler->readsData($sql);
    return $result;  
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