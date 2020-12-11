<?php

function LoginErrorMessage() {
  if(isset($_SESSION['loginError'])){
    echo '<h4>' . $_SESSION['loginError'] . '</h4>';
    session_destroy();
  }
}

function SignUpMessage() {
  if(isset($_SESSION['signUpMessage'])){
    echo '<h4>' . $_SESSION['signUpMessage'] . '</h4>';
    session_destroy();
  }
} 

function NoteCard($noteName, $noteDate, $noteID){
  if($noteName && !trim($noteName) || empty($noteName)){
    $noteName = 'Nota sem título';
  }

  echo "<div class='card-background'>";
  echo "  <div class='noteInfos'>";
  echo "    <p class='noteName'>$noteName</p>";
  echo "    <p class='noteDate'>Última modificação: $noteDate</p>";
  echo "  </div>";
  echo "  <div class='buttonGroup'>";
  echo "    <form class='buttons' action='../assets/deleteEditNoteRedirect.php' method='POST'>";
  echo "      <button name='edit' type='submit' class='editNotes-button' value='" . $noteID . "'> Editar </button>";
  echo "      <button name='delete' type='submit' class='deleteNotes-button' value='" . $noteID . "'> Excluir </button>";
  echo "    </form>";
  echo "  </div>";
  echo "</div>";
}

function ContentErrorMessage() {
  if(isset($_SESSION['contentError']) && isset($_SESSION['id_note'])){
    echo "<p class='contentErrorMessage'>". $_SESSION['contentError'] ."</p>";
    unset($_SESSION['contentError']);
  } else if (isset($_SESSION['contentError'])){
    echo "<p class='contentErrorMessage'>". $_SESSION['contentError'] ."</p>";
    unset($_SESSION['contentError']);
  }
} 