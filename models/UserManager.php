<?php

class UserManager extends AbstractEntityManager
{
    public function getUserByUsername(string $username): ?User
    {
        $sql = <<<SQL
        SELECT * 
        FROM user 
        WHERE username = :username
        SQL;
        $result = $this->db->query($sql, ['username' => $username]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }

        return null;
    }

    public function getUserById(int $id)
    {
        $sql = <<<SQL
        SELECT * 
        FROM user 
        WHERE id = :id
        SQL;
        $result = $this->db->query($sql, ['id' => $id]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }

        return null;
    }

    public static function getUsernameByOwnerId(int $ownerId): string
    {
        $userManager = new UserManager();
        $user = $userManager->getUserById($ownerId);
        if ($user) {
            return $user->getUsername();
        }

        return '';
    }

    public static function getProfilePictureByOwnerId(?int $ownerId): string
    {
        $userManager = new UserManager();
        $user = $userManager->getUserById($ownerId);
        if ($user) {
            return $user->getPicture();
        }

        return '';
    }

    public function addUser(User $user): void
    {
        $sql = <<<SQL
    INSERT INTO user (username, email, password, role, picture, signUpDate)
    VALUES (:username, :email, :password, :role, :picture, :signUpDate)
    SQL;
        $this->db->query($sql, [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole(),
            'picture' => $user->getPicture(),
            'signUpDate' => $user->getSignUpDate()->format('Y-m-d H:i:s'),
        ]);
    }

    public function getUserByEmail(string $email): ?User
    {
        $sql = <<<SQL
    SELECT *
    FROM user
    WHERE email = :email
    SQL;
        $result = $this->db->query($sql, ['email' => $email]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }

        return null;
    }

    public function updateUser(?User $user)
    {
        $sql = <<<SQL
        UPDATE user
        SET username = :username, email = :email, password = :password
        WHERE id = :id
        SQL;
        $this->db->query($sql, [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'id' => $user->getId()
        ]);
    }
}