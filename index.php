<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/login.css">
  <title>SellazCo Login</title>

</head>

<body>

<?php
$pdo = new PDO('mysql:dbname=grupp3;host=localhost', 'sqllab', 'Hare#2022');
if (isset($_POST["typ"])){
    if ($_POST["typ"] == "Patient"){
        if (!empty($_POST)) {
        $pnr = $_POST["Pnr"];
        $sql = "SELECT Pnr, Namn, Fornamn FROM Patient WHERE Pnr = '$pnr'";
        foreach ($pdo->query($sql) as $row) {
            if ($row["Pnr"] == $pnr) {
                session_start();
                $_SESSION["Pnr"] = $row["Pnr"];
                $_SESSION["Namn"] = $row["Namn"];
                $_SESSION["Fornamn"] = $row["Fornamn"];
                header("Location: Patient_Start.php");
            }
        } 
        }
    }
    if ($_POST["typ"] == "Personal"){
        if (!empty($_POST)) {
        $pnr = $_POST["Pnr"];
        $sql = "SELECT Pnr FROM Vardpersonal WHERE Pnr = '$pnr'";
        foreach ($pdo->query($sql) as $row) {
            if ($row["Pnr"] == $pnr) {
                session_start();
                $_SESSION["Pnr"] = $row["Pnr"];
                header("Location: Personal_Start.php");
            }
        } 
        }
    }
}

    



if (!empty($pnr)) {
    echo "<div style='background-color:red'>";
    echo 'Personumret existerar ej!!! <br>';
    echo "</div>";
  }
  
?>
    <img class="hospital-logo" src="Bilder/logo.png" alt="Hospital logo">
    <h1>Login</h1>
    <form action="" method="post">
        <label for="Pnr"> Personummer:</label><br>
        <input type="text" name="Pnr" id="Pnr" placeholder= YYYYMMDD-XXXX>
        
        <lable for="användare"> Konto Typ:</Lable>
        <select name="typ" id="användare">
            <option>Patient</option>
            <option>Personal</option>
        </select>
        <input type="submit" value="Logga in">
    </form> 
   

</body>

</html>