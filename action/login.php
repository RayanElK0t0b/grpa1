<?php 

require_once "../config.php"; 

$sql = "SELECT * FROM user WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'"; 
$pre = $pdo->prepare($sql); 
$pre->execute();
$user = $pre->fetch(PDO::FETCH_ASSOC);

if(empty($user)){
     header('Location:../popup-login.php');
     exit();
}else{
     $connect = 1;
     $_SESSION['user'] = $user;
     if($_SESSION['user']['admin'] == 1){
          header('Location:../adminpanel.php');
          exit();
     }else{
          header('Location:../index.php');
          exit();
     }
}


?>