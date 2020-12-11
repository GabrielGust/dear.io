<?php

class UserDB
{
  private $connection;

  public function __construct($host, $dbname, $user, $password)
  {
    $this->connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
  }

  public function insertUser($email, $user_password)
  {
    $create = $this->connection->prepare("insert into Users ( email, user_password ) values ( ?, ? )");
    echo 'O usário foi criado!';

    return $create->execute([$email, $user_password]);    
  }

  public function getUser($email){
    $read = $this->connection->prepare("select * from Users where email= ?");
    $read->execute([$email]);
    return $read->fetchAll(PDO::FETCH_OBJ);
  }

  public function updateUser($email, $user_password, $id_user){
    $update = $this->connection->prepare("update Users set email = :email, user_password = :password where id_user = :id");

    $update->bindValue(":email", $email, PDO::PARAM_STR);
    $update->bindValue(":password", $user_password, PDO::PARAM_STR);
    $update->bindValue(":id", $id_user, PDO::PARAM_INT);
    $update->execute();

    echo 'Usuário atualizado com sucesso!';
  }

  public function deleteUser($id_user)
  {
    $delete = $this->connection->prepare("delete from Users where id_user = :id");
    $delete->bindValue(":id", $id_user, PDO::PARAM_INT);
    $delete->execute();

    echo 'Usuário excluído com sucesso!';
  }
}