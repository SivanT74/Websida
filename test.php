<?php
$pdo = new PDO('mysql:dbname=grupp3;host=localhost', 'sqllab', 'Hare#2022');
session_start();
$_SESSION['Pnr'];

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

  <style>
        
        body {
            font-family: sans-serif;
            margin: 0 auto;
            padding: 20px;
            background-image: url("Bilder/bg-bild.png");
            background-size: cover;
            color: white;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .wrapper{
            width: 80%;
            margin: 50px auto;
            text-align: left;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
        }
        select {
            background-color: white;
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        option {
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.7);
        }
        .container {
            width: 85vw;
            margin: 0 auto;
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
        .Lanken{
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-family: "Montserrat", sans-serif;
            text-align: center;
        }
        .Lanken:hover{
            color: #0099cc;
            text-decoration: underline;
        }
        
    </style>
</head>

<body>
    <div class="container">
  <div class="navbar">
  <a href="../Personal_Start.php">Hem</a>
    <div class="dropdown">
      <button class="dropbtn">Journal</button>
      <div class="dropdown-content">
        <a href="journal.php">Prover</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Tidsbokning</button>
      <div class="dropdown-content">
        <a href="bokaTid.php">Avboka tid</a>
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

  <?php
        $patient = $_SESSION["Namn"];
        

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
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"usr":"a21abdhu@student.his.se", "pwd":"Högskolan123"}'); 
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
        //  echo "<div style='background-color:lightgray; border:1px solid black'>";
        //  echo '$response<br><pre>';
        //  echo print_r($response) . "</pre><br>";
        //  echo "</div>";

         
      
         $ch = curl_init($baseurl . '/api/resource/Patient/'.$patient.'');
 
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
 
     
 
          // echo "<div style='background-color:lightgray; border:1px solid black'>";
          // echo '$response<br><pre>';
          // echo print_r($response) . "</pre><br>";
          // echo "</div>";

          $anhoriga = array( );

          foreach ($response as $key => $value) {

            $fnamn = $value['first_name'];
            $enamn = $value['last_name'];
            $pnr = $value['uid'];
            $detalj = $value['patient_details'];
            $tel = $value['phone'];
            $epost = $value['email'];
            $medicin = $value['medication'];
            $diagnoser = $value['medical_history'];
            $allergies = $value['allergies'];
            $mobil = $value['mobile'];
            $anhoriga = $value['patient_relation'];

          }

        ?>
  
  <div class="wrapper">
    <div class="journal-notes-container">
    <h1>Journal</h1>
    </div>
    <div class="journal-add-notes-container">
      <?php
        if (empty($fnamn)) {
          echo "<p>Förnamn Efternamn</p>";
        }else {
          echo "<p>".$fnamn. " ".$enamn. "</p>";
        }

        if (empty($pnr)) {
          echo "<p>Personnr</p>";
        }else {
          echo "<p>".$pnr. "</p>";
        }

        if (empty($detalj)) {
          echo "<p>Längd Vikt</p>";
        }else {
          echo "<p>".$detalj. "</p>";
        }

      ?>

      <img src="profilbild.jpg" alt="bild">
    </div>

    <div class="journal-add-notes-container">
      <!-- <h3 class="journal-doctor-signed">Signerad av Läkare</h3> -->
      <div class="journal-add-notes-first-section">
      <h3>Kontakt info: </h3>
      <?php
        if (empty($tel && $epost)) {
          echo "<ul>
          <li>Adress</li>
          <li>Telefon</li>
          <li>E-post</li>
          </ul>";
        }else {
          echo "<ul>
          <li>Adress</li>
          <li>".$tel."</li>
          <li>".$epost."</li>
          </ul>";
        } 
        
      ?>
      
      </div>

      <div class="journal-add-notes-first-section">
        <h3>Anhöriga: </h3>
        <?php
          if (count($anhoriga) == 0) {
            echo "<ul>
            <li>Text</li>
            <li>Text</li>
            <li>Text</li>
          </ul>";
          }else {
            foreach ($anhoriga as $key => $value) {
              echo "<ul>
              <li>".$value['parent']."</li>
              <li>".$value['relation']."</li>
              </ul>";
            }
            
          } 
          
        ?>
        
      </div>

      <div class="journal-add-notes-second-section">
        <h2>Patient info</h2><br>
        <h3>Viktig medicin: </h3>
        <?php
          if (empty($medicin)) {
            echo "<ul>
            <li>Text</li>
            <li>Text</li>
            <li>Text</li>
          </ul>";
          }else {
            echo "<ul>
            <li>".$medicin."</li>
          </ul>";
          } 
          
        ?>
        
      </div>

      <div class="journal-add-notes-third-section">
        <h3>Diagnoser: </h3>
        <?php
          if (empty($diagnoser)) {
            echo "<ul>
            <li>Text</li>
            <li>Text</li>
            <li>Text</li>
          </ul>";
          }else {
            echo "<ul>
            <li>".$diagnoser."</li>
          </ul>";
          } 
          
        ?>
        
      </div>
      <div class="journal-add-notes-third-section">
        <h3>Allergier: </h3>
        <?php
          if (empty($allergies)) {
            echo "<ul>
            <li>Text</li>
            <li>Text</li>
            <li>Text</li>
          </ul>";
          }else {
            echo "<ul>
            <li>".$allergies."</li>
          </ul>";
          } 
          
        ?>
        
      </div>

      <h3>Anteckningar: </h3>
      <form action="" method="post">
      <input type="text" name="anteckning">
      <button type="submit">Submit</button>
      </form>
      <?php 
        if (isset($_POST['anteckning'])) {
          echo $_POST['anteckning'];
        }
      ?>


    </div>

  </div>

  <!-- <div class="wrapper">
    <div class="journal-notes-container">
      
    </div>
    
  </div> -->
<div>
</body>

</html>