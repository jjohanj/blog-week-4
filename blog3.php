<?php
//put the input of the reactions in a variable and write to database table
//reactions
$reactie = $_POST['reactie'];
$reactieId =  $_POST['reactie_id'];
echo $reactie;

try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO reactions (reacties, artikel_id)
    VALUES ('$reactie', '$reactieId')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo "Connected successfully</br>";
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "succesfull blog entry";
    }


catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
