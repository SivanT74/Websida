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
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/navbar.css">
  <title>SellazCo</title>
</head>

<body>
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
                 
  ?>
<div class="navbar">
  <a href="../Patient_Start.php">Hem</a>
    <div class="dropdown">
      <button class="dropbtn">Journal</button>
      <div class="dropdown-content">
        <a href="journal.php">Prover</a>
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
  </div>
  <div class="wrapper">
    <div class="journal-notes-container">
      <h1>Läkarens anteckningar</h1>
      
       <form method="post" action="">
      <input type="date" name="datum" id="">
      <input type="time" name="time">
      <button>Hämta</button>
      </form> 
    </div>
    <?php
      $ch = curl_init($baseurl .'/api/resource/Lab%20Test/?fields=["practitioner_name"]&limit_page_length=500&filters=[["patient_name","=","'.rawurlencode($_SESSION['Namn']).'"]]');
     
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
           


    ?>
    <div class="journal-add-notes-container">
      <h3 class="journal-doctor-signed">Signerad av <?php foreach($response['data'] AS $key => $value){echo $value["practitioner_name"];}?> </h3>
      <div class="journal-add-notes-first-section">
        <h2>Läkar anteckningar</h2>
        <?php
         $ch = curl_init($baseurl .'/api/resource/Lab%20Test/?fields=["lab_test_comment"]&limit_page_length=500&filters=[["patient_name","=","'.rawurlencode($_SESSION['Namn']).'"]]');


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

            foreach($response['data'] AS $key => $value){
              echo $value["lab_test_comment"]; 
            }
        ?>
      </div>
      <div class="journal-add-notes-second-section">
        <h2>Prov resultat</h2>
        <?php
        $ch = curl_init($baseurl .'/api/resource/Lab%20Test/?fields=["lab_test_name","result_value","lab_test_uom","result_date"]&limit_page_length=500&filters=[["patient_name","=","'.rawurlencode($_SESSION['Namn']).'"]]');


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

             
                  // echo "<div style='background-color:lightgray; border:1px solid black'>";
                  // echo '$response<br><pre>';
                  // echo print_r($response) . "</pre><br>";
                  // echo "</div>";
          
               
        
          echo "<table><th>Namn på prov</th><th>Ditt värde</th><th>Normal värde</th><th>datum</th>";
          foreach($response['data'] AS $key => $value){
            echo "<tr>";
            echo "<td>";
            echo $value["lab_test_name"];
            echo "</td>";
            echo "<td>";
            echo $value["result_value"];
            echo "</td>";
            echo "<td>";
            echo $value["lab_test_uom"];
            echo "</td>";
            echo "<td>";
            echo $value["result_date"];
            echo "</td>";
            echo "</tr>";
            
          }
          
          echo "</table>";
        
        ?>
      </div>

      
    </div>
  </div>
</body>

</html>