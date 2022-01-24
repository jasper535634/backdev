<?php
include "../../flexlayout/model/display.php";
//maak functie die formulie in de db plaatst

function createProduct_les()
{   
    //is er een form naar ons verzonden zo ja
    if(isset($_POST["submit"])){
    //haal de waarden uit de input velden op
    $product_code = $_POST["product_type_code"];
    $supplier_id = $_POST["supplier_id"];
    $productname = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $other_pr =  $_POST["other_product_details"];

     //controleer de velden
     if(empty($product_code) or empty($supplier_id) or empty($productname) or empty($product_price) or empty($other_pr)){
     $msg = "Alle velden zijn vereist";
    }else{
        //connect met de db en table
        //prepare sql en bind paramters, voer de query uit & stel en query samen
        //insert de data in een row & prepaired stmt
        //maak de velden schoon indien nodig
        //voer het uit
        $sql = "INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) 
        VALUES($product_code, $supplier_id, $productname, $product_price,$other_pr)";
        $lastid = createData($sql,"localhost","stardunk_levels","root","" );

        //echo "New records created successfully";
        // set the resulting array to associative

        //sluit de db

        $msg = createTable(readData("SELECT * FROM products WHERE id=$lastid","localhost","stardunk_levels","root",""),"");
       //laat weten of het gelukt is en laat het  resultaat zien
        
        
        
       $con = null;
        return $msg;
        
        }

    }
}


function controlForm()
{
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $knop = $_POST["submit"];

        switch ($knop) {
            case 'Create':
                $msg = createProduct_les();
                break;

            default:
                $msg = "Er is een fout opgetreden";
                break; 
        }
        return $msg;
    }
}

function  createData($sql, $servername, $databasename, $username, $password )
{
  $con = connectDB($servername, $databasename, $username, $password);
  $stmt = $con ->prepare($sql);
  $result = $stmt->execute();
  $id = $con->lastInsertId();
  return $id;
}

function readData($sql, $servername, $databasename, $username, $password)
{
        $con = connectDB("$servername","$databasename","$username","$password");

        $stmt = $con->prepare($sql);

        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();
        
        $con = null;
        return $result;
}



function connectDB($servername, $dbname, $username, $password)
{
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
}

//print_r(readData("SELECT * FROM products","localhost","stardunk_levels","root",""))

// readData("SELECT id, firstname, lastname FROM MyGuests");
// $sql = 'INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) VALUES(1,1,"Goudvis","1.50","HorseFighter")';
// echo createData($sql,"localhost","stardunk_levels","root","" );
?>
