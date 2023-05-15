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
  <link rel="stylesheet" href="../css/klagomal.css">

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
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            text-align: left;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
        }
        .container {
            width: 85vw;
            margin: 0 auto;
        }
        table th, table td{
            min-width: 170px;
        }
    </style>
</head>

<body>
<div class="container">
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


        <div class="klagomal-container">
        <table>

            <?php

                $pdo = new PDO('mysql:dbname=grupp3;host=localhost', 'sqllab', 'Hare#2022');

                echo "<tr><th>Datum</th><th>Omdöme</th><th>Kommentar</th></tr>";
                
                foreach($pdo->query( "SELECT * FROM Feedback;" ) as $row){
                    echo "<tr>";
                    echo "<td>".$row['created_at']."</td>";
                    echo "<td>".$row['Omdome']."</td>";
                    echo "<td>".$row['Kommentar']."</td>";
                    echo "</tr>";
                }

                echo "</th>";
            ?>

        </table>
        </div>

</div>
</body>

</html>