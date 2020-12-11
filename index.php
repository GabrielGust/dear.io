<?php 
  require_once 'assets/functions.php';

  session_start();

  if (isset($_SESSION['loginLembrado'])){
    header("Location: login.php");
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" href="images/icon.svg" />
    <link href="styles/global.css"  rel="stylesheet">
    <link href="styles/login.css"  rel="stylesheet">    
    <title>Login</title>
  </head>
  <body>
    <div class="login-page">  
      <form class="loginForm" action="assets/login.php" method="POST">
        <p class="loginMessage">Entre em seu dear.io<img class='loginIcon' src='images/icon.svg' alt='logo'></p>
        <!-- <img src='../images/logo.svg' alt='logo'> -->
        <?php LoginErrorMessage(); ?>

        <input class="emailLogin-input" type="email" name="email" placeholder="E-mail" required>
        <input class="passwordLogin-input" type="password" name="password" placeholder="Senha">

        <div class="remember-check">          
          <input name="rememberMe" type="checkbox" name="remember">
          <p class="rememberText">Lembre-se de mim</p>
        </div>

        <button class="loginSubmit-button" type="submit">Entrar</button>

        <p class="signup-button">
          Não é cadastrado? <a style='color: #ffffff' href="signup.php"><b>Cadastre-se aqui!</b></a>
        </p>
      </form>     
    </div>
  </body>
</html>