<?php
require_once 'autoloader.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$userConnect = new UserDB('localhost', 'deario', 'root', '');

if(empty($email)){
  $_SESSION['signUpMessage'] = 'E-mail não pode estar vazio!';
  header("Location: ../signup.php");
} else {
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    if ($userConnect->getUser($email)){
      $_SESSION['signUpMessage'] = 'Este e-mail já foi cadastrado';
      header("Location: ../signup.php");
    } else {    
      if(empty($password)){        
        $_SESSION['signUpMessage'] = 'Senha não pode estar vazia!';
        header("Location: ../signup.php");
      } else {
        if(preg_match('~[^a-z0-9]+~i', $password)){
          $_SESSION['signUpMessage'] = 'Não use caracteres especiais nem espaços!';
          header("Location: ../signup.php");          
        } else {
          if($password == $confirmPassword){
            $userConnect->insertUser($email,$confirmPassword);

            $_SESSION['signUpMessage'] = 'Sua conta foi criada, faça login para entrar';
            header("Location: ../signup.php");  
          } else {
            $_SESSION['signUpMessage'] = 'As senhas não conferem!';
            header("Location: ../signup.php");
          }
        }
      }
    }
  } else {
    $_SESSION['signUpMessage'] = 'Digite um e-mail válido';
    header("Location: ../signup.php");
  }
}