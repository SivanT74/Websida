<?php
session_start();
$_SESSION['Pnr'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <title>SellazCo</title>

  <style>
    body {
      font-family: sans-serif;
      margin: 0 auto;
      padding: 20px;
      background-image: url("../Bilder/bg-bild.png");
      background-size: cover;
      color: white;
    }
    table {
      text-align: left;
      background-color: rgba(0, 0, 0, 0.5);
      padding: 20px;
      margin: auto;
    }
    button {
      padding: 10px;
      background-color: #0099cc;
      color: white;
      font-size: 18px;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #006699;
    }
    .container {
      width: 85vw;
      margin: 0 auto;
    }
  </style>
</head>

<body>
    <div class="container">
<?php
        if(isset($_SESSION['status'])){
            echo "<h4>".$_SESSION['status']."</h4>";
            unset($_SESSION['status']);
        }


        
    ?>


<div class="navbar">
      <a href="../Personal_Start.php">Hem</a>
      <div class="dropdown">
        <button class="dropbtn">Tidsbokning</button>
        <div class="dropdown-content">
          <a href="boka.php">Boka tid</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Recept</button>
        <div class="dropdown-content">
          <a href="nurseview.php">Förnya</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Övrigt</button>
        <div class="dropdown-content">
          <a href="boka.php">Besök</a>
          <a href="videoChatt_Personal.php">Videosamtal</a>
          <a href="videoChatt_Personal.php">Chat</a>
          <a href="diabetesdagbokvardpersonal.php">Diabetes Dagbok</a>
        </div>
      </div>
      <div style="float: right">
        <a href="../assets/Logout.php">Logga ut</a>        
      </div>
    </div>
    <div class="diabetesdagbok-container">


      <h1 style="text-align: center;">Diabetesdagbok</h1>

      <table border='1'> 

<?php


    $pdo = new PDO('mysql:dbname=grupp3;host=localhost', 'sqllab', 'Hare#2022');


    echo "<tr><th>Pnr</th><th>Mående</th><th>Datum</th><th>Sockervärde</th><th>Insulin</th><th>Problem</th><th>Kommentar</th>";
    foreach($pdo->query( "SELECT * FROM Diabetesdagbok;" ) as $row){
        echo "<tr>";
        echo "<td>".$row['Pnr']."</td>";
        echo "<td>".$row['Mående']."</td>";
        echo "<td>".$row['Datum']."</td>";
        echo "<td>".$row['Sockervarde']."</td>";
        echo "<td>".$row['Insulin']."</td>";
        echo "<td>".$row['Problem']."</td>";
        echo "<td>".$row['Kommentar']."</td>";

        echo "</tr>";
    }

    echo "</th>";
?>
    </div>

</div>
</body>

</html>