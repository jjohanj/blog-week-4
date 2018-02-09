
<?php

//Compare the id of articels with the id of the reactions if they match put them in a div
try {
    $artid =  $row["id"];
    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT reactions.reacties, reactions.artikel_id, reactions.id  FROM reactions WHERE reactions.artikel_id = $artid
    ORDER BY reactions.id";

    $result = $conn->query($sql);
    foreach ($result as $row) {
      echo "<div>";
      echo $row['id'];
      echo " - ";
      echo $row['reacties'];
      echo "<br>";
      echo "</div>";

    }
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
