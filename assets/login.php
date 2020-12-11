<?php
require_once 'autoloader.php';

session_cache_expire(60);
session_start();

if(isset($_SESSION['loginLembrado'])){;      
  header("Location: ../notes/");
  
} else {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $userConnect = new UserDB('localhost', 'deario', 'root', '');
  if ($userConnect->getUser($email)){
    $userInfos = $userConnect->getUser($email);
  
    foreach ($userInfos as $userInfo){
      $dbUserID = $userInfo->id_user;
      $dbEmail = $userInfo->email;
      $dbPassword = $userInfo->user_password;
    };
    if($password != $dbPassword){
      $_SESSION['loginError'] = 'Senha inválida!';
      header("Location: ../index.php");
      
    } else {   
      $_SESSION['id_user'] = $dbUserID;
      if(isset($_POST['rememberMe'])){
        $_SESSION['loginLembrado'] = $dbUserID;      
        header("Location: ../notes/");
      }
      header("Location: ../notes/");
    }
  }
  else {
    $_SESSION['loginError'] = 'Usuário não encontrado';
    header("Location: ../index.php");
  }
}

