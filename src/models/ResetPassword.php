<?php


class ResetPassword
{
    private $email;
    private $key;
    private $expDate;

    public function __construct(string $email, string $key, string $expDate)
    {
        $this->email = $email;
        $this->key = $key;
        $this->expDate = $expDate;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getExpDate(): string
    {
        return $this->expDate;
    }

    public function setExpDate(string $expDate): void
    {
        $this->expDate = $expDate;
    }


}