<?php
  require_once 'autoloader.php';
  date_default_timezone_set('America/Sao_Paulo');
  setlocale(LC_ALL, 'pt_BR');
  session_start();

  if(isset($_POST['goEditThis'])){
    if(isset($_SESSION['id_note'])){
      $title = $_POST['titleNote'];
      $content = $_POST['content'];
      $date = date("Y/m/d H:i:s");
      $id = $_SESSION['id_note'];

      if($content && !trim($content) || empty($content)){
        $_SESSION['contentError'] = 'Insira pelo menos algum conteúdo para alterar a nota';
        header("Location: note.php");
      } else {
        $noteConnect = new NoteDB('localhost', 'deario', 'root', '');
        $noteConnect->updateNote($title,$content,$date,$id);
        unset($_SESSION['id_note']);
        header("Location: ../notes/index.php");
      }
    } else {

      $title = $_POST['titleNote'];
      $content = $_POST['content'];
      $idUser = $_SESSION['id_user'];
      $date = date("Y/m/d H:i:s");

      if($content && !trim($content) || empty($content)){      
        $_SESSION['contentError'] = 'Insira pelo menos algum conteúdo para criar uma nota';
        header("Location: ../notes/note.php");             
      } else {
        $noteConnect = new NoteDB('localhost', 'deario', 'root', '');
        $noteConnect->insertNote($title,$content,$idUser,$date);
        header("Location: ../notes/index.php");   
      }
    }     
  } else {
    unset($_SESSION['id_note']);
    header("Location: ../notes/index.php");
  }
?>