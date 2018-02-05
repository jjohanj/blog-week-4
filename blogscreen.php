
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
<div>
  <button class="select" name='select' onclick=window.location.reload();>Home</button>
  <button class="select" name='select' onclick=getMessage(1);>Verslagen</button>
  <button class="select" name='select' onclick=getMessage(2); >Uitslagen</button>
</div>


<button onclick="asd(1)">Hide</button>
<button onclick="asd(2)">Show</button>

<div id="main">
<script>

function asd(a)
{
    if(a==1)
    document.getElementById("asd").style.display="none";
    else
    document.getElementById("asd").style.display="block";
}

  function getMessage(categorie){
  //var value = document.getElementById("select").value;
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "blog2.php? select=" + categorie, false);
  xhttp.send();


  }

  function openForm (){

    alert ("test");
  }

</script>

<?php
try {

    $conn = new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT artikelen.titel, categories.name, artikelen.body FROM artikelen
    INNER JOIN categories ON artikelen.category_id=categories.id ORDER BY artikelen.id DESC";
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
    echo "<button onclick='asd(2)'>";
    echo "reageer";
    echo "</button>";
    echo "<form id='asd'>";
    echo "form";
    echo "</form>";
    }
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<form id="asd">form </form>
</div>


</body>
</html>
