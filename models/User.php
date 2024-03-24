<?php

class User extends AbstractEntity
{
    private string $username;
    private string $password;
    private string $role;

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUsername(string $username): string
    {
        return $this->username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}