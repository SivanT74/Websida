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
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/Start.css">
  <title>SellazCo</title>

</head>

<body>
<div class="container">
<div class="navbar">
    <a href="Patient_Start.php">Hem</a>
    <div class="dropdown">
      <button class="dropbtn">Journal</button>
      <div class="dropdown-content">
        <a href="Patient/journal.php">Prover</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Tidsbokning</button>
      <div class="dropdown-content">
        <a href="Patient/BokaTidAvboka.php">Avboka tid</a>
        <a href="Patient/bokaTid.php">Boka tid</a>
        <a href="Patient/bokaTid.php">Ombokning</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Recept</button>
      <div class="dropdown-content">
        <a href="Patient/patientrecept.php">Förnya</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Övrigt</button>
      <div class="dropdown-content">
        <a href="Patient/bokaTid.php">Besök</a>
        <a href="Patient/videoChatt.php">Videosamtal</a>
        <a href="Patient/videoChatt.php">Chat</a>
        <a href="Patient/diabetesdagbok.php">Diabetes Dagbok</a>
      </div>
    </div>
    <div style="float: right">
      <a href="assets/Logout.php">Logga ut</a>        
    </div>
  </div>
    <div class="main-menu">
    <h1>Huvud Meny</h1>
    <div class="left-column">
        <button><a href="Patient/journal.php">Journal</a></button>
        <button><a href="Patient/prover.php">Prover</a></button>
        <button><a href="Patient/videoChatt.php">Video/Chat</a></button>
        <button><a href="Patient/diabetesdagbok.php">Diabetesdagbok</a></button>
    </div>
    <div class="right-column">
        <button><a href="Patient/bokaTid.php">Boka tid/Avboka</a></button>
        <button><a href="Patient/patientrecept.php">Recept</a></button>
        <button><a href="Patient/bokaTid.php">Besök</a></button>
        <button><a href="Patient/klagomal.php">Omdöme</a></button>
    </div>
    </div>

    <div class="about-us">
    <h2>Om Verksamheten:</h2>
    <p>
        På vårdcentralen Hälsa tar vi emot allt från barn, ungdomar till vuxna. 
        Vår fokus står starkt för att erbjuda lättillgänglig vård till kontinuerligt 
        fullfölja en patients process som präglas av omtanke och helhet. </p>
    <br>
    <p>
        Hos vårdcentralen Hälsa fokuserar vi på bästa möjliga vård, stöd till 
        goda levnadsvanor respektive rehabilitering men även välmående.
        Vi arbetar hårt för att stärka din hälsa och möter dina behov på 
        bästa möjliga sätt.
        Hjälp oss att utvecklas och bli bättre. 
    </p>
    <p>
        Under klagomål kan du lämna dina synpunkter om vårdcentralen direkt 
        via webben. Men även lägga in önskemål för utveckling. Du kan dessutom 
        informera oss angående dina upplevelser från dina besök.
    </p>    
    </div>

    <div class="footer-container">
    <div class="footer-items">
      <p>Adress</p>
      <p>Hälsogatan 23A</p>
    </div>
    <div class="footer-items">
      <p>Telefon mottagning</p>
      <p>(076) 123 45 67</p>
    </div>
    <div class="footer-items">
      <p>Öppettider</p>
      <p>Måndag - Fredag: 08:00-17:00</p>
      <p>Lördag - Söndag: Stängd</p>
    </div>
  </div>
</div>
</body>

</html>