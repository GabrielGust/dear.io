<?php 
  require_once 'assets/functions.php';
  session_start();
  
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" href="images/icon.svg" />
    <link href="styles/global.css"  rel="stylesheet">
    <link href="styles/signup.css"  rel="stylesheet">
    <title>Cadastro</title>
  </head>
  <body>
    <div class="signUp-page">  
      <form class="signUpForm" action="assets/signupValidations.php" method="POST">
        <p class="signUpMessage">Faça seu cadastro</p>
        <?php SignUpMessage(); ?>

        <input class="emailSignUp-input" type="email" name="email" placeholder="E-mail" maxlength = "33" required>
        <input class="passwordSignUp-input" type="password" name="password" placeholder="Senha" maxlength = "25" required>
        <input class="confirmPasswordSignUp-input" type="password" name="confirmPassword" placeholder="Confirmar senha" maxlength = "25" required>

        <button class="signUpSubmit-button" type="submit">Cadastrar</button>

        <p class="login-button">
          Já é cadastrado? <a style='color: #ffffff' href="index.php">Clique para fazer login</a>
        </p>
      </form>     
    </div>
  </body>
</html>