<?php
session_start();
$_SESSION['Pnr'];
$_SESSION['Namn'];


?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <title>SellazCo</title>
</head>
<body>

<?php

$con = mysqli_connect("localhost","sqllab","Hare#2022","grupp3");

if (isset($_POST['skicka'])){
    $Pnr =$_SESSION["Pnr"];
    $Diabetes = $_POST['Diabetes'];
    $Dag = $_POST['Dag'];
    $Sockervarde = $_POST['socker'];
    $Insulin = $_POST['insulin'];
    $Problem = $_POST['Problem'];
    $Kommentar = $_POST['Kommentar'];

    $query = "INSERT INTO Diabetesdagbok (Pnr, Sockervarde, Insulin, Datum, Mående, Problem, Kommentar) VALUES ('$Pnr', '$Sockervarde', '$Insulin', '$Dag', '$Diabetes', '$Problem', '$Kommentar')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Lyckades";
        //header("location: diabetesdagbok.php");
    }
    else {
        $_SESSION['status'] = "Misslyckades";
        //header("location: diabetesdagbok.php");
    }
}

?>


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


  <h2>Skickat!</h2> <br>

  

<?php 
if (isset($_POST["pnr"])) {
  echo $_POST["pnr"];
}
?>
<br>

  <h3>Mående</h3>
<?php 
echo $_POST["Diabetes"]; 
?>
<br>

<h3>Datum</h3>
<?php 
echo $_POST["Dag"]; 
?>
<br>

<h3>Sockervärde</h3>
<?php 
echo $_POST["socker"]; 
?>
<br>

<h3>Insulin</h3>
<?php
echo $_POST["insulin"]; 
?>

<h3>Problem</h3>
<?php 
echo $_POST["Problem"]; 
?>
<br>

<h3>Kommentar</h3>
<?php 
echo $_POST["Kommentar"]; 
?>
<br>





</body>
</html>