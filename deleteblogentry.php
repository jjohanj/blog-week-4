<?php

$reactie = $_POST['delete'];

try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM reactions WHERE id = $reactie";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    header('location: http://localhost/blogfinal/blog/reactions.php');
    }


catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
