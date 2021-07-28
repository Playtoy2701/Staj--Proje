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
  <?php include "/xampp/htdocs/script_final/css/pass.css" ?>
</style>
<style>
  <?php include "/xampp/htdocs/script_final/css/main.css" ?>
</style>
<style>
  <?php include "/xampp/htdocs/script_final/css/hazirlik.css" ?>
</style>
<head>
  <title>Firat Üniversitesi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body>
  <!-- Nav-Bar Başlangıcı-->
  <nav id="nav-bar" class="navbar navbar-dark bg-dark navbar-expand-sm">
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
  <!--Nav-Bar Bitiş--><div class="change-background">
    <h1 id="cha-pass">Şifrenizi Değiştirin</h1>
  <div class=container-change>
<form id="pass_form" method="post" action=>

  <div>
  <p><input id="a1" type="password" name="c_pass" Placeholder=" Geçerli Olan Şifreniz" required></p>
  </div>

  <div>
    
  <p><input id="a1" type="password" name="n_pass"  Placeholder=" Yeni Şifreniz" required></p>
  </div>

  <div >
  <p><input id="a1" type="password" name="c_n_pass" Placeholder=" Yeni Şifrenizi Tekrar Ediniz" required></p>
  </div>

  <button id="b1" type="submit" class="btn btn-primary mb-4">Şifreyi değiştir</button>

</form>
</div>
</div>

</section>

</body>

<?php


@$c_p=$_POST['c_pass'];
@$n_p=$_POST['n_pass'];
@$cn_p=$_POST['c_n_pass'];

include('config.php');

$query="UPDATE student SET password='".$n_p."'WHERE PASSWORD='".$c_p."'";
$sql =" SELECT * FROM student WHERE password = '".$c_p."'";
$results1=pg_query($dbconn,$sql) ;
$row=pg_fetch_array($results1);

if( @$row['password']==$c_p):
  if( $n_p == $cn_p):
     $n_p=md5($n_p);
     $results2=pg_query($dbconn,$query) ;
     if(@$result2):
      echo "Şifre değiştirildi.";
     endif; 
  elseif($n_p != $cn_p):   
     echo"şifreler aynı değil";
  endif;

elseif( $row['password']!=$c_p):
  echo"Geçerli şifrenizi yanlış girdiniz.";

endif;
?>