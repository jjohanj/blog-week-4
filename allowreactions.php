<?php

//enable or disable user comments by an article
$comments = $_POST['comments'];
$artikelId = $_POST ['artikelid'];

try {

    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE artikelen SET comments= '" . $comments . "' WHERE id= " . $artikelId;
    $result = $conn->query($sql);

    header('location: http://localhost/blogfinal/blog/reactions.php');
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
