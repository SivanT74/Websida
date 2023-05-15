<?php
session_start();



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
  <div class="wrapper">
    <div class="journal-notes-container">
      <h1>Prover</h1>
      <?php
        //session_start();
        $_SESSION['Pnr'];
        $_SESSION['Namn'];
        $patient =$_SESSION['Fornamn'];
	
      
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

        // echo "<div style='background-color:lightgray; border:1px solid black'>";
        // echo '$response<br><pre>';
        // echo print_r($response) . "</pre><br>";
        // echo "</div>";
        
        // api/resource/Patient%20Medical%20Record?fields=[%22name%22,%22reference_name%22,%22modified%22,%20%22patient%22,%20%22reference_doctype%22,%20%22communication_date%22,%20%22subject%22,%20%22status%22]&filters=[[%22patient%22,%20%22=%22,%20%22'.$patient.'%22]]
      
        $ch = curl_init($baseurl . '/api/resource/Lab%20Test?fields=["name","modified",%20"patient",%20"status"]&filters=[["patient",%20"=",%20"'.rawurlencode($_SESSION["Fornamn"]).'"]]');

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
        echo "<form action='' method='POST'>";
        echo "<select name='name' id='name'>";
        foreach($response['data'] AS $key => $value){

          if ($value["status"]=='Completed') {
          
            echo '<option value="'.$value['name'].'">';
          echo  "Labtest: " .date('Y-m-d H:i', strtotime($value['modified']));
          echo "</option>";
          }

          

        }
        echo "</select>";
        echo "<input type='submit'>";
        echo "</form>";

        // echo $_POST['name'];
        echo "<br>";
        if (isset($_POST['name'])) {

          
          

          foreach($response['data'] AS $key => $value){

            if ($value['name']==$_POST['name']) {
              $labtid = $value['name'];
            }

    

          

          }
          
          
          // echo $labtid;
        
        }
	$ch = curl_init($baseurl .'/api/resource/Lab%20Test/?fields=["practitioner_name"]&limit_page_length=500&filters=[["patient","=","'.rawurlencode($_SESSION["Fornamn"]).'"]]');
     
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
      <!-- <form method="post" action="">
      <input type="date" name="datum" id="">
      <input type="time" name="time">
      <button>Hämta</button>
      </form> -->
    </div>
    <div class="journal-add-notes-container">
      <h3 class="journal-doctor-signed">Signerad av <?php foreach($response['data'] AS $key => $value){echo $value["practitioner_name"];}?></h3>
      <div class="journal-add-notes-second-section">
        <h2>Prov resultat</h2>
        <?php
        
        if (!empty($labtid)) {
          $ch = curl_init($baseurl . '/api/resource/Lab%20Test/'.$labtid.'');

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

          foreach ($response['data'] as $key => $value) {
            if ($key=="normal_test_items") {

              echo "<div>";
              echo "<table><th>Datum</th><th>Typ</th><th>Prov</th><th>Resultatsvärde</th><th>Mått</th><th>Normalsvärde</th><th>Referensmall</th>";
                  foreach($value AS $keys => $values){
                    echo "<tr>";
                    echo "<td>";
                    $datum=$values["modified"];
                    echo date('Y-m-d H:i', strtotime($datum));
                    // echo $values["modified"];
                    echo "</td>";
                    echo "<td>";
                    echo $values["parenttype"];
                    echo "</td>";
                    echo "<td>";
                    echo $values["lab_test_name"];
                    echo "</td>";
                    echo "<td>";
                    echo $values["result_value"];
                    echo "</td>";
                    echo "<td>";
                    if (!empty($values["lab_test_uom"])) {
                      echo $values["lab_test_uom"]; 
                    }else {
                      echo "-";
                    }
                    echo "</td>";
                    echo "<td>";
                    echo $values["normal_range"]; 
                    echo "</td>";
                    echo "<td>";
                    echo $values["template"]; 
                    echo "</td>";
                    
                    echo "</tr>";
                  }
                  echo "</table>";
                  echo "</div>";

              // print_r($value);
            }
          }
          

        
        }else {
          

          $ch = curl_init($baseurl . '/api/resource/Lab%20Test?fields=[%22name%22,%22modified%22,%20%22patient%22,%20%22status%22]&filters=[[%22patient%22,%20%22=%22,%20%22'.$patient.'%22]]');

          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
          curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
          curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiepath);
          curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiepath);
          curl_setopt($ch, CURLOPT_TIMEOUT, $tmeout);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


          $response = curl_exec($ch);
          // echo $response;
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
          echo "<div>";
          echo "<table><th>Prov</th><th>DAtum</th><th>Status</th>";
          foreach ($response['data'] as $key => $value) {
            

             
                 
              echo "<tr>";
              echo "<td>";
              echo $value["name"];
              echo "</td>";
              echo "<td>";
              $datum=$value["modified"];
              echo date('Y-m-d H:i', strtotime($datum));
              echo "</td>";
              echo "<td>";
              $status=$value["status"];
              echo $value["status"];
              echo "</td>";
    
              
              echo "</tr>";
            
              

          //     // print_r($value);
          //   
          }
          echo "</table>";
          echo "</div>";
          
        }

        ?>
        
        <!-- <p>text...</p> -->
      </div>
      
      <h2>Referensintervaller(se diagram nedanför)</h2>


    </div>
  </div>
      </div>
</body>

</html>