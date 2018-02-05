<?php

$title = $_POST['titel'];
$body = $_POST['body'];
$categorie = $_POST['category_id'];

try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO artikelen (titel, body, category_id)
    VALUES ('$title', '$body', '$categorie')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo "Connected successfully</br>";
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "succesfull blog entry";
    header('Location: http://jjohanj.nl.transurl.nl/blog/blogger.html');
    }


catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
