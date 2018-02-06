
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="blogstyle.css">
 <title>Document</title>
</head>
<body>
<div id="container">
<h2> Johan's Blog

</h2>
<div>
  <button class="select" name='select' onclick=window.location.reload();>Home</button>
  <button class="select" name='select' onclick=getMessage(1);>Verslagen</button>
  <button class="select" name='select' onclick=getMessage(2); >Uitslagen</button>
</div>

<div id="main">
<script>


function getMessage(categorie){
    console.log (categorie);
    //var value = document.getElementById("select").value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "blog2.php? select=" + categorie, false);
    xhttp.send();

    document.getElementById("main").innerHTML = xhttp.responseText;
  }

  function getReaction(categorie){
      console.log (categorie);
      //var value = document.getElementById("select").value;
      var xhttp = new XMLHttpRequest();
      xhttp.open("GET", "blog4.php? select=" + categorie, false);
      xhttp.send();

      document.getElementById("main").innerHTML = xhttp.responseText;
}

</script>

<?php
try {

    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT artikelen.id, artikelen.titel, categories.name,
    artikelen.body FROM artikelen
    INNER JOIN categories ON artikelen.category_id=categories.id
    ORDER BY artikelen.id DESC";

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
    echo "<form action='blog3.php' method='POST'>";
    echo "<textarea name='reactie' placeholder='reageer'></textarea>";
    echo "<textarea name='reactie_id' style='display:none'>";
    echo $row['id'];
    echo "</textarea>";
    echo "<button>";
    echo "Plaats reactie";
    echo "</button>";
    echo "</form>";
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
