<?php
include "../../flexlayout/model/display.php";
require ("Data_Handler.php");
$datahandler = new dataHandler("localhost", "stardunk_levels", "root", "", "mysql");
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
function readAllProducts()
{
    $sql = "SELECT * FROM products";
    $result = $datahandler->readData($sql);
    return $result;
}

//maak functie die data kan wijzingen op basis van een formulier
function updateProduct_les($id)
{
    var_dump($_REQUEST);
    //checks if a form is  not sent
    //check of de var sumbit niet bestaat en ga dan hier in
    if (!isset($_POST['submit'])) {
        //argument ontvangen
        //gegevens op te halen om ze later in het formulier te werken
        //argument verwerken in de query
        //query uitvoeren
        //resultaat ontvangen in een array
        // de resultaten worden in de result geknald
        $result = readOneProduct($id);

        $product_id = $result[0]['product_id'];
        $product_code = $result[0]['product_type_code'];
        $supplier_id = $result[0]['supplier_id'];
        $product_name = $result[0]['product_name'];
        $product_price = $result[0]['product_price'];
        $other_pr = $result[0]['other_product_details'];


        //formulier samenstellen met de values uit de array
        $html = "";
        $html .= "<form action=\"db_handler.php\" method=\"POST\">";

        $html .= "<label for=\"product_id\">product_id:</label><br>";
        $html .= " <input type=\"text\" name=\"product_id\" value=\"$product_id\" readonly></input><br>";

        $html .= "<label for=\"product_type_code\">Product_type_code:</label><br>";
        $html .= " <input type=\"text\" name=\"product_type_code\" value=\"$product_code\"></input><br>";

        $html .= "<label for=\"supplier_id\">supplier_id:</label><br>";
        $html .= "<input type=\"text\" name=\"supplier_id\" value=\"$supplier_id\"></input><br>";

        $html .= "<label for=\"product_name\">product_name:</label><br>";
        $html .= "<input type=\"text\" name=\"product_name\" value=\"$product_name\"></input><br>";

        $html .= "<label for=\"product_price\">product_price:</label><br>";
        $html .= "<input type=\"text\" name=\"product_price\" value=\"$product_price\"></input><br>";

        $html .= "<label for=\"other_product_details\">other product details:</label><br>";
        $html .= "<input type=\"text\" name=\"other_product_details\" value=\"$other_pr\"></input><br><br>";

        $html .= "<input type=\"submit\" name=\"submit\" value=\"update\" placeholder=\"Update Old Product\"></input><br>";
        $html .= "</form>";

        return $html;
        //formulier tonen
    } else {
        //var_dump($_POST['submit']);
        //echo "Hoi";
        //als ja
        //nemen de nieuwe values
        $id = $_POST["product_id"];
        $product_code = $_POST["product_type_code"];
        $supplier_id = $_POST["supplier_id"];
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $other_pr =  $_POST["other_product_details"];
        //stellen update query samen
        $sql = "UPDATE Products SET product_type_code = '$product_code', supplier_id = '$supplier_id', 
    product_name = '$product_name', product_price = '$product_price', 
    other_product_details = '$other_pr'  WHERE product_id = $id";
        //uitvoeren query
        readData($sql, 'localhost', 'stardunk_levels', 'root', '');

        $sql2 = "SELECT * FROM Products WHERE product_id = $id";
        $result = readData($sql2, 'localhost', 'stardunk_levels', 'root', '');
        return $result;
    }
}
function handlerRequest()
{
    $html = "";
    $operation = isset($_GET['op']) ? $_GET['op'] : '';

    // eert read daarna delete en als laatst update

    switch ($operation) {
        case 'create':
            $html .= "<form action=\"db_handler.php\" method=\"post\">";
            $html .= "<label for=\"product_type_code\">Product type code:</label><br>";
            $html .= "<input type=\"text\" id=\"product_type_code\" name=\"product_type_code\" value=\"\"><br>";

            $html .= "<label for=\"supplier_id\">Supplier id:</label><br>";
            $html .= "<input type=\"text\" id=\"supplier_id\" name=\"supplier_id\" value=\"\"><br>";

            $html .= "<label for=\"product_name\">Product name:</label><br>";
            $html .= "<input type=\"text\" id=\"product_name\" name=\"product_name\" value=\"\"><br>";

            $html .= "<label for=\"product_price\">Product price:</label><br>";
            $html .= "<input type=\"text\" id=\"product_price\" name=\"product_price\" value=\"\"><br>";

            $html .= "<label for=\"other_product_details\">Other product details:</label><br>";
            $html .= "<input type=\"text\" id=\"other_product_details\" name=\"other_product_details\" value=\"\"><br><br>";

            $html .= "<input type=\"submit\" name=\"submit\"value=\"create\">";
            $html .= "</form>";
            include "partial.php";
            return $html;

            break;
        case 'read':
            $id = $_GET['id'];
            $html .= createList(readOneProduct($id), "");
            include "partial.php";
            return $html;
            break;

        case 'update':
            //$colum = $_GET['colum'];
            // $value = $_GET['value'];
            $id = $_GET['id'];
            $html .= "update case";

            $html = updateProduct_les($id);
            include "partial.php";
            return $html;
            break;

        case 'delete':
            try {
                $id = $_GET['id'];
                echo deleteOneProduct($id);
                $html .= "product deleted";
            } catch (PDOException $e) {
                echo "somting went wrong error:" . "<br>" . $e->getMessage();
            }
            include "partial.php";
            return $html;
            break;

        default:
            $html .= "readAllproducts";
            $html .= createTable(readAllProducts(), "");
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
                   
                case 'update':
                echo "test";
                $id = $_POST["product_id"];
                $msg = createTable(updateProduct_les($id),"");
                break;

                default:
                $msg = "Er is een fout opgetreden";
                 break;
                }
                return $msg;
        }
 }



function createList($enteries)
{
    $html = '<ul>';
    foreach ($enteries as $entery) {

        foreach ($entery as  $value) {
            $html .= "<li>" . $value . "</li>";
        }
    }
    $html .= '</ul>';
    return $html;
}



//print_r(readData("SELECT * FROM products","localhost","stardunk_levels","root",""))

// readData("SELECT id, firstname, lastname FROM MyGuests");
// $sql = 'INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) VALUES(1,1,"Goudvis","1.50","HorseFighter")';
// echo createData($sql,"localhost","stardunk_levels","root","" );
