<?php
  require_once '../classes/notedb.php';
  require_once '../assets/functions.php';

  session_start();

  if(isset($_SESSION['loginLembrado'])){
    $_SESSION['id_user'] = $_SESSION['loginLembrado'];
  }

  if(isset($_SESSION['id_user'])){
    $noteConnect = new NoteDB('localhost', 'deario', 'root', '');
    $allNotes = $noteConnect->getNotes($_SESSION['id_user']);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" href="../images/icon.svg" />
    <link href="../styles/global.css"  rel="stylesheet">
    <link href="../styles/notes.css"  rel="stylesheet">    
    <title>Notas</title>
  </head>
  <body class='notesBody'>  
    <div class='navbar'>
      <img class='logo-navbar' src='../images/logo.svg' alt='logo'>
      <nav>
        <ul class='links-navbar'>
          <li><p class='text-navbar'>O lugar perfeito para suas anotações</p></li>
        </ul>
      </nav>
      <a href="../assets/logout.php"><button class='logoutButton-navbar'>Sair da conta</button></a>
    </div>
    <div class="notes-page">
      <div class="notes-card">
        <div class="header-card">
          <p class="title-card"><b>Total de Notas:</b> <?php echo count($allNotes)?></p>
        </div>
        <div class="body-card">  
          <?php 
          $identifyNote = array();
            foreach($allNotes as $note){
              $noteID = $note->id_note;
              $noteTitle = $note->title;
              $noteDate = $note->note_date;

              $identifyNote [] = $noteID;
              echo NoteCard($noteTitle,$noteDate,$noteID);
            }
          ?>
        </div>
        <div class="footer-body">
          <form action='../assets/deleteEditNoteRedirect.php' method='POST'>
            <button class='createNote-button' type='submit' value='newNote'> Nova Nota </button>
          </form>
        </div>             
      </div>  
    </div>
  </body>  
</html>
<?php 
  } else {
    header('Location: ../index.php');
  }
?>