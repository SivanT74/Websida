<?php
$pdo = new PDO('mysql:dbname=grupp3;host=localhost', 'sqllab', 'Hare#2022');

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
      form {
        text-align: left;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
      }
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
      input[type="submit"] {
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
        <?php
          //Här är felmeddelande
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);
                    
          //Sätts en liten fil på dator med inlogg?
          $cookiepath = "/tmp/cookies.txt";
          $tmeout = 3600; // (3600=1hr)
          // här sätter ni er domän
          $baseurl = 'http://193.93.250.83/'; 
                    

          try {
            $ch = curl_init($baseurl . 'api/method/login');
          } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
          }
                    
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, '{"usr":"c21patgr@student.his.se", "pwd":"Högskolan123"}'); 
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
          curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
          curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath);
          curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath);
          curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $response = curl_exec($ch);
          $response = json_decode($response, true);

          $error_no = curl_errno($ch);
          $error = curl_error($ch);
          curl_close($ch);

          if (!empty($error_no)) {
            echo "<div style='background-color:red'>";
              echo '$error_no<br>';
              var_dump($error_no);
              echo "<hr>";
              echo '$error<br>';
              var_dump($error);
              echo "<hr>";
            echo "</div>";
          }

          $ch = curl_init($baseurl . '/api/resource/Patient%20Appointment/?fields=["appointment_date","appointment_time","appointment_type","department","name"]&limit_page_length=500&filters=[["patient_name","=","'.rawurlencode($_SESSION['Namn']).'"]]');
                    
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
          curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
          curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath);
          curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath);
          curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                    
                    

          $response = curl_exec($ch);
          //echo $response;
          $response = json_decode($response, true);
          $error_no = curl_errno($ch);
          $error = curl_error($ch);
          curl_close($ch);

          if (!empty($error_no)) {
            echo "<div style='background-color:red'>";
              echo '$error_no<br>';
              var_dump($error_no);
              echo "<hr>";
              echo '$error<br>';
              var_dump($error);
              echo "<hr>";
            echo "</div>";
          }

          echo "<form method='POST' action='BokaTidTack.php'>";
            echo "<table><th>Datum</th><th>Tid</th><th>Yrkeskategori</th><th>Besöks typ</th>";
              foreach($response['data'] AS $key => $value){
                echo "<tr>";
                  echo "<td>";
                    echo $value["appointment_date"];
                  echo "</td>";
                  echo "<td>";
                    echo $value["appointment_time"];
                  echo "</td>";
                  echo "<td>";
                    echo $value["department"];
                  echo "</td>";
                  echo "<td>";
                    echo $value["appointment_type"]; 
                  echo "</td>";
                  echo "<td>";
                    echo "<input type='submit' value='Ändra?'>";
                  echo "</td>";
                echo "</tr>";
              }
            echo "</table>";
          echo "</form>";        
        ?>
      </div>
    </div>
  </body>
</html>