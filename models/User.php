<?php
class User
{
    private ?int $userId = null;
    private string $first_name;
    private string $last_name;
    private string $username;
    private string $email;
    private string $password;
    private ?string $rank = null;

    public function __construct($first_name, $last_name, $username, $email, $password, $rank = null)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->rank = "user";
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }


    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRank(): string
    {
        return $this->rank;
    }

    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function setRank($rank): void
    {
        $this->rank = $rank;
    }
}
