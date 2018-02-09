
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="blogstyle.css">
 <title>Document</title>
</head>
<body>
<div id="container">
<h2> Johan's Blog

</h2>
<div id="menu">
  <button class="select" onclick=window.location.reload();>Blog</button>
  <button class="select" name='select' onclick=getMessage(1);>Verslagen</button>
  <button class="select" name='select' onclick=getMessage(2); >Uitslagen</button>
</div>

<div id="main2">

<?php
try {

    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT artikelen.id, artikelen.titel, categories.name,
    artikelen.body, artikelen.comments FROM artikelen
    INNER JOIN categories ON artikelen.category_id=categories.id
    ORDER BY artikelen.id DESC";

    $result = $conn->query($sql);
    foreach ($result as $row) {

      echo "<br>";
      echo "<p>";
      echo $row['titel'];
      echo "</p>";
      echo "<div class='blogtext'>";
      echo $row['body'];
      echo "</div>";
      echo "<div class='categorieoutput'>";
      echo $row ['name'];
      echo "</div>";
      echo "<div class='reacties'>";
      if ($row ['comments'] == 'aan') {
        echo "<div>";
        echo "<form action='blog3.php' method='POST' >";
        echo "<textarea name='reactie' placeholder='reageer'></textarea>";
        echo "<textarea name='reactie_id' style='display:none'>";
        echo $row['id'];
        echo "</textarea>";
        echo "<button class='reactiebutton'>";
        echo "Plaats reactie";
        echo "</button>";
        echo "</form>";
        echo "</div>";
      }
      include "blog4.php";
      echo "</div>";
    }
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
</div>
<script>

function getMessage(categorie){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "blog2.php? select=" + categorie, false);
    xhttp.send();

    document.getElementById("main2").innerHTML = xhttp.responseText;
  }

</script>
</body>
</html>
