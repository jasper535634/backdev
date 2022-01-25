<?php
include "../../flexlayout/model/display.php";
//maak functie die formulie in de db plaatst

function createProduct_les()
{
    //is er een form naar ons verzonden zo ja
    if (isset($_POST["submit"])) {
        //haal de waarden uit de input velden op
        $product_code = $_POST["product_type_code"];
        $supplier_id = $_POST["supplier_id"];
        $productname = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $other_pr =  $_POST["other_product_details"];

        //controleer de velden
        if (empty($product_code) or empty($supplier_id) or empty($productname) or empty($product_price) or empty($other_pr)) {
            $msg = "Alle velden zijn vereist";
        } else {
            //connect met de db en table
            //prepare sql en bind paramters, voer de query uit & stel en query samen
            //insert de data in een row & prepaired stmt
            //maak de velden schoon indien nodig
            //voer het uit
            $sql = "INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) 
        VALUES('$product_code', '$supplier_id', '$productname', '$product_price', '$other_pr')";
            $lastid = createData($sql, "localhost", "stardunk_levels", "root", "");

            //echo "New records created successfully";
            // set the resulting array to associative

            //sluit de db

            $msg = createTable(readData("SELECT * FROM products WHERE product_id=$lastid", "localhost", "stardunk_levels", "root", ""), "");
            //laat weten of het gelukt is en laat het  resultaat zien



            $con = null;
            return $msg;
        }
    }
}
function handlerRequest()
{
    $html = "";
    $operation = isset($_GET['op']) ? $_GET['op'] : '';

// eert read daarna delete en als laatst update

    switch ($operation) {
        case 'create':
            $html .= "<form><input type=\"text\">velt</form>";
            include "partial.php";
            return $html;

            break;
        case 'read':
            $id = $_GET['id'];
            //echo var_dump($id);
            $html.=createTable(readOneProduct($id),"");
            include "partial.php";
            return $html;
            break;
        case 'update':
            $colum= $_GET['colum'];
            $value= $_GET['value'];
            $id= $_GET['id'];
            $html .= "update case";

            updatedataOneProduct($colum, $value, $id);
            include "partial.php";
            return $html;
            break;
        case 'delete':
            try{
            $id = $_GET['id'];
            deleteOneProduct($id);
            $html .= "product deleted";
            } catch(PDOException $e) {
                echo "somting went wrong error:". "<br>" . $e->getMessage();
              }
            include "partial.php";
            return $html;
            break;

        default:
            $html .= "readAllproducts";
            $html .= createTable(readAllProducts(),"");
            include "partial.php";
            return $html;
            break;
    }
}

function controlForm()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $knop = $_POST["submit"];

        switch ($knop) {
            case 'create':
                $msg = createProduct_les();
                break;

            default:
                $msg = "Er is een fout opgetreden";
                break;
        }
        return $msg;
    }
}

function  createData($sql, $servername, $databasename, $username, $password)
{
    $con = connectDB($servername, $databasename, $username, $password);
    $stmt = $con->prepare($sql);
    $result = $stmt->execute();
    $id = $con->lastInsertId();
    return $id;
}

function readData($sql, $servername, $databasename, $username, $password)
{
    $con = connectDB("$servername", "$databasename", "$username", "$password");

    $stmt = $con->prepare($sql);

    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();

    $con = null;
    return $result;
}
function updateData($sql, $servername, $databasename, $username, $password){
    $con = connectDB("$servername", "$databasename", "$username", "$password");
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $con = null;

}

function deleteData($sql, $servername, $databasename, $username, $password){
    $con = connectDB("$servername", "$databasename", "$username", "$password");

    $con->exec($sql);

    $con = null;
}

function readAllProducts(){
    $sql="SELECT * FROM products";
    $result = readData($sql,"localhost","stardunk_levels","root","");
    return $result;
}

function readOneProduct($id){
    $sql="SELECT * FROM products WHERE product_id=$id";
    $result = readData($sql,"localhost","stardunk_levels","root","");
    return $result;    
}

function updatedataOneProduct($colum, $value, $id){
    $sql = "UPDATE products SET $colum='$value' WHERE product_id=$id";
    $result = updateData($sql,"localhost","stardunk_levels","root","");
    return $result;
}


function deleteOneProduct($id){
    $sql = "DELETE FROM products WHERE product_id=$id";
    $result = deleteData($sql,"localhost","stardunk_levels","root","");
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
