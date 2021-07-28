<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
	<?php include "/xampp/htdocs/script_final/css/sign_in.css" ?>
</style>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">



<head>
	<title>Fırat Üniversitesi</title>
</head>
<div class="main">
	<div class="container">
		<center>
			<div class="middle">
				<div id="login">

					<form method="POST" action=>

						<fieldset class="clearfix">

							<p><span class="fa fa-user"></span><input type="text" name="id" id="id" Placeholder="Öğrenci No" required></p>
							<p><span class="fa fa-lock"></span><input type="password" name="pwd" id="pwd" Placeholder="Şifre" required></p>

							<div>
								<span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Şifremi Unuttum</a></span>
								<span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="GİRİŞ YAP"></span>
							</div>

						</fieldset>
						<div class="clearfix"></div>
					</form>
				</div>
				<div class="logo">
					<h1 id="fu">Fırat Üniversitesi</h1>
				</div>

			</div>
		</center>
	</div>

</div>
<?php
session_start();
$s_id=$_POST['id'];
$pass=$_POST['pwd'];

include('config.php');

$sql =" SELECT * FROM student WHERE student_id = '".$s_id."' AND password = '".$pass."'";

$results=pg_query($dbconn,$sql) ;

$row=pg_fetch_array($results);

if(empty($s_id)== false && empty($pass)== false ):
	if ($row['student_id']==$s_id && $row['password']==$pass):

		header('location:main.php');
		$_SESSION['student_id'] = $s_id;
		
	
	else:

  		echo "<script>alert('HATALI GİRİŞ!!! Öğrenci numaranızı ve şifrenizi kontrol ediniz... '); </script>";
    
	endif;
endif;

?>