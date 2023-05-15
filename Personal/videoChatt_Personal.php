<?php
session_start();
$_SESSION['Pnr'];


?>
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <title>SellazCo</title>
 
        <style>
        .square {
      height: 500px;
      width: 800px;
      background-color: rgba(6, 6, 6, 1);
      margin: 1cm;
    }
    .content {
      max-width: 800px;
      margin: auto;
    }
    body {
        font-family: sans-serif;
        margin: 0 auto;
        padding: 20px;
        background-image: url("../Bilder/bg-bild.png");
        background-size: cover;
        color: white;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
      }
      .container {
        width: 85vw;
        margin: 0 auto;
      }
      input[type="submit"] {
      margin-top: 20px;
      padding: 10px;
      background-color: #0099cc;
      color: white;
      font-size: 18px;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #006699;
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
        <div class="content">
 
            <div class="square"></div>
 
            <div align="right">
                <form action="" method="get" id="nameform">
                    <input type="submit" value="Starta video">
                </form>
            </div>
           
 
            <div class="square"></div>
 
            <div align="right">
                <form action="" method="get" id="nameform">
                    <input type="submit" value="Skicka meddelande">
                </form>
            </div>
           
 
        </div>
       
         
</div>
    </body>
</html>