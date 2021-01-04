<?php

class User
{
    private $name;
    private $surname;
    private $password;
    private $email;
    private $role;

    public function __construct($name, $surname, $password, $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
        $this->email = $email;
        $this->role = 'user';
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname() :string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }


}