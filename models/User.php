<?php


class User extends AbstractEntity
{
    private string $username;
    private string $email;
    private string $password;
    private string $role;
    private string $picture;
    private datetime $signUpDate;

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUsername(): string
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

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSignUpDate(): datetime
    {

        return $this->signUpDate;
    }

    public function setSignUpDate(string | datetime $signUpDate): void
    {
        if(is_string($signUpDate)){
            $this->signUpDate = new DateTime($signUpDate);
        } else {
            $this->signUpDate = $signUpDate;
        }
    }

    public function getHowManyBookByUser($userId) {
        $bookManager = new BookManager();
        return $bookManager->getHowManyBooksById($userId);
    }
}