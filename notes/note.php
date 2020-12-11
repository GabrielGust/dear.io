<?php 
  require_once '../classes/notedb.php';
  require_once '../assets/functions.php';

  session_start();

  if(isset($_SESSION['id_user'])){
    $noteConnect = new NoteDB('localhost', 'deario', 'root', '');

    if(isset($_SESSION['id_note'])){
      $noteInfo = $noteConnect->getNote($_SESSION['id_note']);

      foreach($noteInfo as $info){
        $noteTitle = $info->title;
        $noteContent = $info->content;
        $noteDate = $info->note_date;          
      }
    }  
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg" href="../images/icon.svg" />
    <link href="../styles/global.css"  rel="stylesheet">
    <link href="../styles/note.css"  rel="stylesheet">    
    <title>Nota</title>
  </head>
  <body class='noteBody'>
    <div class='navbar'>
      <img class='logo-navbar' src='../images/logo.svg' alt='logo'>
      <nav>
        <ul class='links-navbar'>
          <li><p class='text-navbar'>O lugar perfeito para suas anotações</p></li>
        </ul>
      </nav>
      <a href="../assets/logout.php"><button class='logoutButton-navbar'>Sair da conta</button></a>
    </div>
    <div class="note-page">
      <div class="note-card">
        <div class="form-card">  
          <form class="note-form" action='../assets/editCreateNote.php' method='POST'>

            <div class="headerForm-form">
              <textarea class="titleNote-textarea" name="titleNote" maxlength = "50"<?php echo isset($_SESSION['id_note']) ? null : 'placeholder="Escolha um título"';?> ><?php echo isset($_SESSION['id_note'])  ? $noteTitle : null;?></textarea>
            <div>
            <?php ContentErrorMessage() ?>
            <div class="bodyForm-form">
              <textarea class="content-textarea" name='content' maxlength = "2400"<?php echo isset($_SESSION['id_note']) ? null : 'placeholder="Escreva sua anotação"';?> ><?php echo isset($_SESSION['id_note']) ? $noteContent : null;?></textarea>
            </div>
          </form>
        </div>

        <div class="footerNote-body">
          <div class='footerNoteButtons' action='../assets/editCreateNote.php' method='POST'>
            <button class='backToNotes-button' name='backToNotes' value='back' type='submit'> Voltar </button>
            <button class='editNote-button' name='goEditThis' value='goEdit' type='submit'> <?php echo isset($_SESSION['id_note']) ? 'Alterar' : 'Criar';?> </button>
          </div>
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