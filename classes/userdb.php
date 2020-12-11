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
  }s
}