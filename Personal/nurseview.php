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
  <title>SellazCo</title>
  
  <style>

h1 {
  text-align: center;
  color:black;
  font-size: 60px;
  
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
table {
    text-align: left;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
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
<h1><i><u>Läkare/Sjuksköterska</u></i></h1>
  
  <?php
  


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
//  ----------  Här sätter ni era login-data ------------------ //
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"usr":"a20arasa@student.his.se", "pwd":"Högskolan123"}'); 
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


//$ch = curl_init($baseurl . 'api/resource/Patient?fields=["patient_name","uid"]'); 
$ch = curl_init($baseurl . 'api/resource/Patient?fields=["medication","patient_name"]&limit_page_length=500');


// man kan även specificera vilka fält man vill se
// urlencode krävs när du har specialtecken eller mellanslag  
// $ch = curl_init($baseurl . 'api/resource/User?fields='. urlencode('["name", "first_name", "last_login"]'));
// det funkerar lika bra att ta bort mellanslaget i denna fråga
// $ch = curl_init($baseurl . 'api/resource/User?fields=["name","first_name","last_login"]');


//jag kör en get request, ibland vill man kanske köra en annan typ av request, och ibland så beöver man ha med postfields
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


//här väljer jag att loopa över alla poster i [data] och för varje resultat så skriver jag ut name
  echo "<strong>PATIENT LISTA:</strong><br>";
echo "<table><tr><td>Patient</td><td>Recept</td></tr>";
foreach($response['data'] AS $key => $value){
	echo "<tr>";
	echo "<td>";
  echo $value["patient_name"]."<br>";
  echo "</td>";
  echo "<td>";
  echo $value["medication"]."<br>";
  echo "</td>";
  echo "</tr>";
} 
echo "</table>";



?>
  
  
  <?php
  


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
//  ----------  Här sätter ni era login-data ------------------ //
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"usr":"a20arasa@student.his.se", "pwd":"Högskolan123"}'); 
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




$ch = curl_init($baseurl . 'api/resource/Item?fields=["item_name","opening_stock"]&limit_page_length=500'); 
//$ch = curl_init($baseurl . 'api/resource/Patient'); 

// man kan även specificera vilka fält man vill se
// urlencode krävs när du har specialtecken eller mellanslag  
// $ch = curl_init($baseurl . 'api/resource/User?fields='. urlencode('["name", "first_name", "last_login"]'));
// det funkerar lika bra att ta bort mellanslaget i denna fråga
// $ch = curl_init($baseurl . 'api/resource/User?fields=["name","first_name","last_login"]');


//jag kör en get request, ibland vill man kanske köra en annan typ av request, och ibland så beöver man ha med postfields
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


//här väljer jag att loopa över alla poster i [data] och för varje resultat så skriver jag ut name
  echo "<strong> RECEPT LISTA :</strong><br>";
echo "<table><tr><td>Medeciner</td><td>Finns i lager</td></tr>";
foreach($response['data'] AS $key => $value){
	echo "<tr>";
	echo "<td>";
  echo $value["item_name"]."<br>";
  echo "</td>";
  echo "<td>";
  echo $value["opening_stock"]."<br>";
  echo "</td>";
  echo "<td>";
  echo "<input type='submit' name='submit' value='Förnya Recept'>";
  echo "</td>";
  echo "</tr>";
} 
echo "</table>";


?>



  
</div>
</body>

</html>