<?php
require_once '../classes/notedb.php';

session_start();

if(isset($_POST['delete'])){
  $noteConnect = new NoteDB('localhost', 'deario', 'root', '');
  $deleteNoteByID = $_POST['delete'];
  $noteConnect->deleteNote($deleteNoteByID);

  header("Location: ../notes/index.php");  
} else if (isset($_POST['edit'])){
  $editNoteByID = $_POST['edit'];
  $_SESSION['id_note'] = $editNoteByID;

  header("Location: ../notes/note.php");
} else {
  unset($_SESSION['id_note']);
  header("Location: ../notes/note.php");
}