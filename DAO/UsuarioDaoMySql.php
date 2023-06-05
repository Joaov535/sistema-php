<?php
require_once 'models/Usuario.php';

class UsuarioDaoMySql implements UsuarioDAO
{
    private $pdo;

    // $driver é o prórpio $pdo que é enviado no index
    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add(Usuario $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (username, useremail) VALUES(:nome, :email)");
        $sql->bindValue(':nome', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }

    public function findAll()
    {
        $arr = [];
        $sql = $this->pdo->query("SELECT * FROM usuarios");

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
            foreach ($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setName($item['username']);
                $u->setEmail($item['useremail']);
                $arr[] = $u;
            }
        }

        return $arr;
    }
    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setName($data['username']);
            $u->setEmail($data['useremail']);

            return $u;
        } else {
            return false;
        }
    }

    public function findByEmail($em)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE useremail = :email");
        $sql->bindValue(':email', $em);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setName($data['username']);
            $u->setEmail($data['useremail']);

            return $u;
        } else {
            return false;
        }
    }

    public function update(Usuario $u)
    {
      $sql = $this->pdo->prepare("UPDATE usuarios SET username = :nome, useremail = :email WHERE id = :id");
      $sql->bindValue(':id', $u->getId());
      $sql->bindValue(':nome', $u->getName());
      $sql->bindValue(':email', $u->getEmail());
      $sql->execute();

      return true;
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }
}
