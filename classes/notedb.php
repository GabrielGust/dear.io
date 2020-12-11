<?php

class NoteDB {
  private $connection;

  public function __construct($host, $dbname, $user, $password)
  {
    $this->connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
  }

  public function insertNote($title, $content, $id_user, $note_date)
  {
    $create = $this->connection->prepare("insert into Notes ( title, content, id_user, note_date ) values ( :title, :content, :id, :note_date )");
    $create->bindValue(":title", $title, PDO::PARAM_STR);
    $create->bindValue(":content", $content, PDO::PARAM_STR);
    $create->bindValue(":id", $id_user, PDO::PARAM_INT);
    $create->bindValue(":note_date", $note_date, PDO::PARAM_STR);
    return $create->execute();
  }

  public function getNote($id_note)
  {
    $read = $this->connection->prepare("select * from Notes where id_note= :note_id");
    $read ->bindValue(":note_id", $id_note, PDO::PARAM_INT);
    $read ->execute();

    return $read->fetchAll(PDO::FETCH_OBJ);
  }

  public function getNotes($id_user)
  {
    $read = $this->connection->prepare("select id_note, title, content, DATE_FORMAT(note_date,'%d%/%c%/%Y %às %T') as note_date from Notes where id_user= :user_id order by DATE_FORMAT(note_date,'%Y%/%c%/%d %às %T') desc;");
    $read->bindValue(":user_id", $id_user, PDO::PARAM_INT);
    $read->execute();

    return $read->fetchAll(PDO::FETCH_OBJ);
  }

  public function updateNote($title, $content, $note_date, $id_note)
  {
    $update = $this->connection->prepare("update Notes set title = :title, content = :content, note_date = :note_date where id_note = :id");
    $update->bindValue(":title", $title, PDO::PARAM_STR);
    $update->bindValue(":content", $content, PDO::PARAM_STR);
    $update->bindValue(":note_date", $note_date, PDO::PARAM_STR);
    $update->bindValue(":id", $id_note, PDO::PARAM_INT);
    $update->execute();
  }
  
  public function deleteNote($id_note)
  {
    $delete = $this->connection->prepare("delete from Notes where id_note = :id");
    $delete->bindValue(":id", $id_note, PDO::PARAM_INT);
    $delete->execute();
  }
}