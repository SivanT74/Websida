<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SellazCo</title>
</head>

<body>
<div class="navbar">
    <a href="index.php">Hem</a>
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
  <div class="wrapper">
    <div class="profil-container">
      <div class="profil-section-one">
        <div class="profil-section-one-left-side">
          <div class="temporary-profile-picture"></div>
        </div>
        <div class="profil-section-one-right-side">
          <div class="patient-information-item">
            <h2>Namn</h2>
            <h2>Efternamn</h2>
          </div>
          <div class="patient-information-item">
            <h2>Personnr</h2>
          </div>
          <div class="patient-information-item">

            <h2>Längd</h2>
            <h2>Vikt</h2>
          </div>
        </div>
      </div>
      <div class="profil-section-two">
        <div class="profile-section-two-left-side">
          <h2>Kontakt info</h2>
          <ul>
            <li>Adress</li>
            <li>Telefon</li>
            <li>E-post</li>
          </ul>
        </div>
        <div class="profile-section-two-right-side">
          <h2>Anhöriga</h2>
          <ul>
            <li>Namn</li>
            <li>Efternamn</li>
            <li>Telefon</li>
          </ul>
        </div>
      </div>
      <div class="profil-section-three">
        <h1>Patient Info</h1>
        <div class="patient-information-medecin">
          <h2><b>Viktig Medecin</b></h2>
          <p>text</p>
          <p>text</p>
          <p>text</p>
        </div>
        <div class="patient-information-medecin">
          <h2><b>Diagnoser</b></h2>
          <p>text</p>
          <p>text</p>
          <p>text</p>
        </div>
        <div class="patient-information-medecin">
          <h2><b>Allergier</b></h2>
          <p>text</p>
          <p>text</p>
          <p>text</p>
        </div>
        <form action="" class="profil-form">
          <label for="anteckning">Anteckning:</label>
          <input type="text" placeholder="text...">
          <button>Skicka</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>