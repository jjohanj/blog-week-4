<?php

// write the blog entry to the database
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
    header('Location: http://jjohanj.nl.transurl.nl/blog/blogger.html');
    }


catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
