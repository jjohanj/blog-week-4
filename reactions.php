<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="blogstyle.css">
 <title>Document</title>
</head>
<body>
<div id="container">
  <h2> Verwijder reacties
  </h2>
  <button onclick="window.location.href = 'blogger.html';">Terug naar blogscreen</button>
  <form action="deleteblogentry.php" method="POST">
  <button type="submit">Delete entry</button></br>
  <input placeholder="Enter id number to delete" name="delete" type="text" id="titel" required></br>
  </form>
  <form action="allowreactions.php" method="POST">
  <button type="submit">Enalble disable</button></br>
  <input type="radio" name="comments" value="aan" id="comments" checked>Aan</br>
  <input type="radio" name="comments" value="uit" id="comments">Uit</br>
  <input placeholder="Enter artikel id to enable/disable" name="artikelid" id="artikelid"></br>

  </form>
    <div id="main">
<?php
try {

  echo "Reacties";
  echo "<br>";
  echo "<br>";
    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT reactions.id, reactions.reacties FROM reactions";

    $result = $conn->query($sql);
    foreach ($result as $row) {

      echo $row ['id'];
      echo " ";
      echo $row ['reacties'];
      echo "<br>";
}
      echo "<br>";
      echo "Artikelen";
      echo "<br>";
      $sql2 = "SELECT artikelen.id, artikelen.titel, artikelen.comments FROM artikelen";

      $result2 = $conn->query($sql2);
      foreach ($result2 as $row2) {
        echo "<br>";
        echo $row2 ['comments'];
        echo "<br>";
        echo $row2 ['id'];
        echo " ";
        echo $row2 ['titel'];
    }
  }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
  </div>
</div>
</body>
</html>
