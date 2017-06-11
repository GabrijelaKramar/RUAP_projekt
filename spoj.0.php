 <?php
$servername = "127.0.0.1:53331";
$username = "azure";
$password = "6#vWHD_$";
$databasename="localdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    echo "Success!!";
?> 