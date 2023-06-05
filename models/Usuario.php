<?php

class Usuario
{
    private $id;
    private $username;
    private $useremail;

    public function getId()
    {
        return $this->id;
    }

    public function setId($i)
    {
        $this->id = trim($i);
    }

    public function getName()
    {
        return $this->username;
    }

    public function setName($n)
    {
        $this->username = ucwords(trim($n));
    }

    public function getEmail()
    {
        return $this->useremail;
    }

    public function setEmail($e)
    {
        $this->useremail = $e;
    }
}

// Criamos a interface para padronizar a interação com o banco de dados
interface UsuarioDAO
{
    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}
