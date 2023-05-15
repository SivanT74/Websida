<?php
session_start();
$con = mysqli_connect("localhost","sqllab","Hare#2022","grupp3");

if (isset($_POST['save_radio'])){
    $Kommentar = $_POST['Kommentar'];
    $Omdome = $_POST['rating'];

    $query = "INSERT INTO Feedback (Kommentar, Omdome) VALUES ('$Kommentar', '$Omdome')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Insert sucesful";
        header("location: klagomal.php");
    }
    else {
        $_SESSION['status'] = "Insert unsucesful";
        header("location: klagomal.php");
    }
}