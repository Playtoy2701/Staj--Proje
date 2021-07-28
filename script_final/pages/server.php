<?php
 session_start();

 require_once "config.php";

 $errors = array();
 
if (isset($_POST['login_user'])) { 
       
    $username = pg_escape_string($db, $_POST['id']); 
    $password = pg_escape_string($db, $_POST['pwd']); 
    
    if (empty($username)) { 
        array_push($errors, "Öğrenci Numarası Gerekli"); 
    } 
    if (empty($password)) { 
        array_push($errors, "Şifre Gerekli"); 
    } 
    
    if (count($errors) == 0) { 
           
        $password = md5($password); 
          
        $query = "SELECT * FROM student WHERE student_id= 
                '$username' AND password='$password'"; 
        $results = pg_query($db, $query); 
    
        if (pg_num_rows($results) == 1) { 
               
            $_SESSION['username'] = $username; 
               
               
            header('location: main.php'); 
        } 
        else { 
               
            array_push($errors, "Hatalı Giriş");  
        } 
    } 
} 
   


?>