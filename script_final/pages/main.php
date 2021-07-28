<?php
 
session_start();
 
if (!isset($_SESSION['student_id'])) {
  header('location: sign_in.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: sign_in.php");
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html>
<style>
  <?php include "/xampp/htdocs/script_final/css/enroll_lesson.css" ?>
</style>
<style>
  <?php include "/xampp/htdocs/script_final/css/main.css" ?>
</style>
<style>
  <?php include "/xampp/htdocs/script_final/css/hazirlik.css" ?>
</style>
<head>
  <title>Fırat Ünivesitesi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body>
  <!-- Nav-Bar Başlangıcı-->
  <nav id="nav-bar" class="navbar fixed-top navbar-dark bg-dark navbar-expand-sm">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Genel İşlemler
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="http://localhost/script_final/pages/main.php">Genel Bilgiler</a>
            <a class="dropdown-item" href="http://localhost/script_final/pages/main.php">Alınan Dersler</a>
            <a class="dropdown-item" href="http://localhost/script_final/pages/main.php">Ders Programı</a>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ders ve Dönem İşlemleri
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="http://localhost/script_final/pages/enroll_lesson.php">Ders Kayıt</a>
            <a class="dropdown-item" href="http://localhost/script_final/pages/notes.php">Not ve Devamsızlık Durumu</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hazırlık
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="http://localhost/script_final/pages/hazirlik_1.php">Sınav Takvimi</a>
            <a class="dropdown-item" href="http://localhost/script_final/pages/hazirlik_2.php">Not Listesi</a>
            <a class="dropdown-item" href="http://localhost/script_final/pages/hazirlik_3.php">Ders Programı</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Başvuru
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="http://localhost/script_final/pages/appeal_1.php">Kayıt Dondurma</a>
            <a class="dropdown-item" href="http://localhost/script_final/pages/appeal_2.php">Mazaret Sınavı</a>
            <a class="dropdown-item" href="http://localhost/script_final/pages/appeal_3.php">Ek Sınav</a>
          </div>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbar-list-4">
      <ul class="navbar-nav" id="right-side">
        <li id="student" class="nav-item"><?php
                                          require_once "config.php";
                                          $s_iddd = $_SESSION['student_id'];
                                          $query = " SELECT * FROM student WHERE student_id = '" . $s_iddd . "'";
                                          $result = pg_query($dbconn, $query);
                                          while ($row = pg_fetch_array($result)) {

                                            echo "" . $row["first_name"] . " " . $row["last_name"] . "  -  " . $row["student_id"] . "<br>";
                                          }
                                          ?></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="http://localhost/script_final/pages/change_pass.php">Şifre Değişikliği</a>
            <a class="dropdown-item" href="http://localhost/script_final/pages/logout.php">Çıkış</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!--Nav-Bar Bitiş-->

  <!--Genel Bilgiler Başlangıcı -->
  <div class="content-1">
    <div id="agnoo" class="col3">
      <div class="agno">AGNO
        <div id="agno_print">
          <?php
          require_once "config.php";
          $s_iddd = $_SESSION['student_id'];
          $query = " SELECT * FROM student WHERE student_id = '" . $s_iddd . "'";
          $result = pg_query($dbconn, $query);
          while ($row = pg_fetch_array($result)) {

            echo "" . $row["agno"] . "/4", "<br>";
          }
          ?>
        </div>
      </div>
    </div>
    <div id="general" class="col3">
      <div class="general-information">
        <div class="general_print">Genel Bilgiler</div>
        <div class="genel_print1" id="adsoyad"><?php
                                  require_once "config.php";
                                  $s_iddd = $_SESSION['student_id'];
                                  $query = " SELECT * FROM student WHERE student_id = '" . $s_iddd . "'";
                                  $result = pg_query($dbconn, $query);
                                  while ($row = pg_fetch_array($result)) {
                                    echo "Ad-Soyad: " . $row["first_name"] . "   " . $row["last_name"] .  "<br>";
                                  }
                                  ?>
        </div>
        <div class="genel_print1" id="dogum"><?php
                                  require_once "config.php";
                                  $s_iddd = $_SESSION['student_id'];
                                  $query = " SELECT * FROM student WHERE student_id = '" . $s_iddd . "'";
                                  $result = pg_query($dbconn, $query);
                                  while ($row = pg_fetch_array($result)) {
                                    echo "Doğum Tarihi: " . $row["birth_day"] . "<br>";
                                  }
                                  ?>
        </div>
        <div class="genel_print2" id= "enroll"><?php
                                  require_once "config.php";
                                  $s_iddd = $_SESSION['student_id'];
                                  $query = " SELECT * FROM student WHERE student_id = '" . $s_iddd . "'";
                                  $result = pg_query($dbconn, $query);
                                  while ($row = pg_fetch_array($result)) {
                                    echo "Kayıt Tarihi: " . $row["enrollment_day"] . "<br>";
                                  }
                                  ?>
        </div>
        <div class="genel_print2" id="advisor"><?php
                                  require_once "config.php";
                                  $s_iddd = $_SESSION['student_id'];
                                  $query = " SELECT * FROM student WHERE student_id = '" . $s_iddd . "'";
                                  $result = pg_query($dbconn, $query);
                                  while ($row = pg_fetch_array($result)) {
                                    echo "Danışman Akademisyen: " . $row["advisor_instructor"] . "<br>";
                                  }
                                  ?>
        </div>
      </div>
    </div>
    <div id="donemm" class="col3">
      <div class="donem">Dönem
        <div id="donem_print">
          <?php
          require_once "config.php";
          $s_iddd = $_SESSION['student_id'];
          $query = " SELECT * FROM student WHERE student_id = '" . $s_iddd . "'";
          $result = pg_query($dbconn, $query);
          while ($row = pg_fetch_array($result)) {

            echo "" . $row["term"] . "<br>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!--Genel Bilgiler Bitiş-->



  <!--Ders Programı Başlangıcı-->
  <div class="content-2">
    <div class="calendar">
      <header>
        <div class="calendar__title" style="display: flex; justify-content: center; align-items: center">
          <div class="icon secondary chevron_left">‹</div>
          <h1 class="" style="flex: 1;"><span></span><strong>DERS PROGRAMI</strong> 2020-2021 GÜZ</h1>
          <div class="icon secondary chevron_left">›</div>
        </div>
        <div style="align-self: flex-start; flex: 0 0 1"></div>
      </header>

      <div class="outer">
        <table>
          <thead>
            <tr>
              <th>Pazartesi</th>
              <th>Salı</th>
              <th>Çarşamba</th>
              <th>Perşembe</th>
              <th>Cuma</th>
              <th class="secondary">Cumartesi</th>
              <th class="secondary">Pazar</th>
            </tr>
          </thead>
        </table>
      </div>
        <div class="wrap">
          <table class="offset">
            <tbody>
              <?php
              require_once "config.php";
              $s_iddd = $_SESSION['student_id'];
              $query = "SELECT * FROM weekly_lesson WHERE student_id='" . $s_iddd . "' ORDER BY start_at ASC";
              $result = pg_query($dbconn, $query);
              while ($row = pg_fetch_array($result)) {
                echo "<tr>";
                echo "<td>";
                if ($row["gun"] == "pazartesi") {
                  echo "<br>" . $row["ders_kodu"] . "<br><br>" . $row["start_at"] . "-" . $row["end_at"];
                } else {
                  echo "-";
                }
                "</td>";
                echo "<td>";
                if ($row["gun"] == "salı") {
                  echo "<br>" . $row["ders_kodu"] . "<br><br>" . $row["start_at"] . "-" . $row["end_at"];
                } else {
                  echo "-";
                }
                "</td>";
                echo "<td>";
                if ($row["gun"] == "çarşamba") {
                  echo "<br>" . $row["ders_kodu"] . "<br><br>" . $row["start_at"] . "-" . $row["end_at"];
                } else {
                  echo "-";
                }
                "</td>";
                echo "<td>";
                if ($row["gun"] == "perşembe") {
                  echo "<br>" . $row["ders_kodu"] . "<br><br>" . $row["start_at"] . "-" . $row["end_at"];
                } else {
                  echo "-";
                }
                "</td>";
                echo "<td>";
                if ($row["gun"] == "cuma") {
                  echo "<br>" . $row["ders_kodu"] . "<br><br>" . $row["start_at"] . "-" . $row["end_at"];
                } else {
                  echo "-";
                }
                "</td>";
                echo "<td>";
                if ($row["gun"] == "cumartesi") {
                  echo "<br>" . $row["ders_kodu"] . "<br><br>" . $row["start_at"] . "-" . $row["end_at"];
                } else {
                  echo "-";
                }
                "</td>";
                echo "<td>";
                if ($row["gun"] == "oazar") {
                  echo "<br>" . $row["ders_kodu"] . "<br><br>" . $row["start_at"] . "-" . $row["end_at"];
                } else {
                  echo "-";
                }
                "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
    </div>

  </div>

  <!--Ders Programı Bitiş-->


  <!--ALınan Dersler Başlangıç-->

  <div class="content-3">
    <h3 id="content-3-top">Alınan Dersler</h3>
    <div id="enrolled-lessons" class="container">
      <div class="row">
        <div class="span5">
          <table class="table table-striped table-condensed">
            <thead>
              <tr>
                <th>Öğretim Görevlisi</th>
                <th>Ders Kodu</th>
                <th>Harf Notu</th>
                <th>Statü</th>
              </tr>
            </thead>
            <tbody>
              <?php

              require_once "config2.php";
              $s_iddd = $_SESSION['student_id'];
              $query = " SELECT * FROM lessons WHERE student_id = '" . $s_iddd . "'";
              $result = pg_query($dbconn, $query);
              while ($row = pg_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row["instructor"] . "</td>";
                echo "<td>" . $row["course_code"] . "</td>";
                echo "<td>" . $row["course_grade"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
              }
              pg_close($dbconn);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Alınan Dersler Bitiş-->
  <!--Footer'dan önceki Ayraç-->

  <div class="space"></div>

</body>

<footer class="footer"></footer>

</html>