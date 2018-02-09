<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="blogstyle.css">
 <title>Document</title>
</head>
<body>

  <h2> Verwijder reacties
  </h2>
  <button onclick="window.location.href = 'blogger.html';">Terug naar blogscherm</button>
  <div id="main">

  <form action="deleteblogentry.php" method="POST">
  <button type="submit">Verwijder reactie</button>
  <input placeholder="Id van de reactie om te verwijderen" name="delete" type="text" class="reactionsinput" required></br>
  </form>
  <form action="allowreactions.php" method="POST">
  <button type="submit">Aan- uitzetten reacties</button></br>
  <input placeholder="Artikel id om reacties bij aan of uit te zetten" name="artikelid" class="reactionsinput"></br>
  <input type="radio" name="comments" value="aan" id="comments" checked>Aan</br>
  <input type="radio" name="comments" value="uit" id="comments">Uit</br>
  </form>
  <p>Artikelen en reacties</p>
  <?php
  try {

      $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT artikelen.id, artikelen.titel, artikelen.comments FROM artikelen
      ORDER BY artikelen.id DESC";

      $result = $conn->query($sql);
      foreach ($result as $row) {
        echo $row['id'];
        echo " - ";
        echo $row['comments'];
        echo " - ";
        echo $row['titel'];
        echo "<div class='reacties'>";
        include "blog5.php";
        echo "</div>";
        echo "<br>";
      }
  }
  catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }
  ?>

  </div>
</body>
</html>
