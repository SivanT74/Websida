<?php
session_start();
$_SESSION['Pnr'];
$_SESSION['Namn'];

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
      table, th, td {
        width: 20%;
        margin: auto;
        border: 1px solid black;
        border-collapse: collapse;
      }
 
      .content {
        width: 100%;
        text-align: center;
      }
 
      .inner{
        display: inline-block;
        margin-right: 102px;
        margin-left: 102px;
      }
    </style>
 
  </head>
  <body>
    <div class="navbar">
      <a href="../Patient_Start.php">Hem</a>
      <div class="dropdown">
        <button class="dropbtn">Journal</button>
          <div class="dropdown-content">
            <a href="prover.php">Prover</a>
          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Tidsbokning</button>
            <div class="dropdown-content">
              <a href="BokaTidAvboka.php">Avboka tid</a>
              <a href="bokaTid.php">Boka tid</a>
              <a href="bokaTid.php">Ombokning</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Recept</button>
              <div class="dropdown-content">
                <a href="patientrecept.php">Förnya</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Övrigt</button>
                <div class="dropdown-content">
                  <a href="bokaTid.php">Besök</a>
                  <a href="videoChatt.php">Videosamtal</a>
                  <a href="videoChatt.php">Chat</a>
                  <a href="diabetesdagbok.php">Diabetes Dagbok</a>
                </div>
              </div>
              <div style="float: right">
                <a href="../assets/Logout.php">Logga ut</a>        
              </div>
            </div>
            <h1 align="center">Bokning</h1>
            <div class="content">

              <p>Din ändring utav tid skickades till vårdpesonal, svar på mejlen inom 24h</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>