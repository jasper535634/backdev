<?php
function connectDB($servername, $dbname, $username, $password)
{
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
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
function updateData($sql, $servername, $databasename, $username, $password)
{
    $con = connectDB("$servername", "$databasename", "$username", "$password");
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $con = null;
}

function deleteData($sql, $servername, $databasename, $username, $password)
{
    $con = connectDB("$servername", "$databasename", "$username", "$password");

    $con->exec($sql);

    $con = null;
}
function readOneProduct($id)
{
    $sql = "SELECT * FROM products WHERE product_id=$id";
    $result = readData($sql, "localhost", "stardunk_levels", "root", "");
    return $result;
}

function updatedataOneProduct($colum, $value, $id)
{
    $sql = "UPDATE products SET $colum='$value' WHERE product_id=$id";
    $result = updateData($sql, "localhost", "stardunk_levels", "root", "");
    return $result;
}

function deleteOneProduct($id)
{
    $sql = "DELETE * FROM products WHERE product_id=$id";
    $result = deleteData($sql, "localhost", "stardunk_levels", "root", "");
    return $result;
}


class DataHandler
{
    private $servername;
    private $dbname;
    private $username;
    private $password;
    private $dbdriver;

    public function __construct($servername, $dbname, $username, $password, $dbdriver)
    {
        $this->servername = $servername;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->dbdriver = $dbdriver;
        try {
            $this->dbh = new PDO("$this->dbdriver:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo "Connection with:" . $this->dbdriver . "failed" . $e->getMessage();
        }
    }
    public function creatData($sql)
    {
    $this->querry($sql);
    $id = $this->dbh->lastInsertedId();
    return $id; 
    }

    public function readData($sql)
    {
        $stmt = $this->dbh->querry($sql);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function updatedata($sql)
    {
        $this->querry($sql);
    $id = $this->sth->rowCount();
    return $id; 
    }

    public function deleteData($sql)
    {
    	$this->querry($sql);
        return $this->sth->rowCount();
    }

    private function querry($querry){
        $this -> sth = $this -> dbh-> prepare($querry);
        return $this -> sth -> execute();
    }

    public function __destruct()
    {
        $this->dbh = null;
    }
}


// echo "<pre>";
// var_dump($tester->readData("SELECT * FROM products "));
// echo "</pre>";
//var_dump($tester->deleteData("DELETE FROM products WHERE product_id='61' "));
// var_dump($tester->creatData("INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) 
// VALUES ('3', '1', 'ghb', '30', 'drogeren')"));
//var_dump($tester->updatedata("UPDATE products SET product_name='xtc6' WHERE product_id=64"));

?>