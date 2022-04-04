<?php
require_once('header.php');
?>
<h2>TITLE HEADING</h2>
<h5>Title description, Dec 7, 2017</h5>
<a class="button" href="./index.php?op=create">Create new product</a>
<br>
<form class="searchform" action="index.php?op=search" method="POST">
    <input type="text" name="searchterm">
    <input class='searchbtn' type="submit" name="submit" value="search">
</form>
<br>
<?php
require_once('./model/Products.php');
require_once('./model/Output.php');
$products = new Products();
$output = new Output();

function collectReadPagedProducts($p = 1)
{
    global $products, $output;
    // $res = $products->listProduct($_REQUEST['page']);
    $res = $products->listProduct($p);

    echo $output->createTable($res[0], "");
    echo $output->createPageButton($res[1]);
    echo "<br>";
    echo "Showing page {$p} of all products";
}





$op = isset($_GET['op']) ? $_GET['op'] : '';
switch ($op) {
    case 'create':
        if(isset($_GET['flag']) ){
            echo'test';
            $res=$products->createProduct();
            echo $output->createTable($res, "");
         }else{
        $html = "";
        $html .= "<form action=\"index.php?op=create&flag=1\" method=\"post\">";
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
        echo $html;
         }
        break;
    case 'read':
        $res = $products->readProduct($_REQUEST['id']);
        echo $output->createlist($res);
        break;

    case 'update':
        echo $products->collectUpdateproduct($_REQUEST['id']);
        break;

    case 'delete':
        try {
        $products->collectDeleteproduct($_REQUEST['id']);
        echo "<br>product deleted<br>";
        echo "<a href='index.php'>back</a>";
    } catch (PDOException $e) {
        echo "somting went wrong error:" . "<br>" . $e->getMessage();
    }
        break;

    case 'search':
        echo $products->searchproduct($_POST['searchterm']);
        break;

    case'readpage':
        collectReadPagedProducts($_REQUEST['page']);
        break;
    default:
        collectReadPagedProducts();
        break;
        
}



require_once('footer.php');
?>