<?php
session_start();
include("baglanti.php");
$bolum = $_SESSION["bolum"];
$kullaniciAd = $_SESSION["kullaniciAd"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<header>

  <div class="m-1">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a href="#" class="navbar-brand">
          <img src="dasdada.png" alt="" height="50" alt="CoolBrand">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav">
            <a href="mezunBilgileriniGoster.php" class="nav-item nav-link active">Anasayfa</a>
            <a href="kayitekle.php" class="nav-item nav-link active">Yeni Kayıt</a>
            <a href="digerRaporlar.php" class="nav-item nav-link active">Diğer Raporlar</a>
          </div>
          <div class="navbar-nav ms-auto">
          <?php
            echo "<span class='hg'>Hoşgeldin $kullaniciAd </span>";
            ?>
            <a href="logout.php" class="nav-item nav-link">Çıkış</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  </header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>