<?php


// Get all the artikels of the chosen catagory
$select = $_GET['select'];

try {

    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT artikelen.titel, categories.name, artikelen.body FROM artikelen
    INNER JOIN categories ON artikelen.category_id=categories.id WHERE categories.id = $select ORDER BY artikelen.id DESC" ;
    $result = $conn->query($sql);
    foreach ($result as $row) {
      echo "<p>";
      echo $row['titel'];
      echo "</p>";
      echo "<div class='blogtext'>";
      echo $row['body'];
      echo "</div>";
      echo "<div class='categorieoutput'>";
      echo "Categorie: " . $row['name'];
      echo "</div>";
    }
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
