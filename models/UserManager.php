<?php

class UserManager extends AbstractEntityManager
{
    public function getUserByUsername(string $username): ?User
    {
        $sql = <<<SQL
        SELECT * 
        FROM user 
        WHERE usermane = :username
        SQL;
        $result = $this->db->query($sql, ['username' => $username]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }

        return null;
    }

    //TODO : Username should be unique, this need to be checked on sign up
    public function getUserById(int $ownerId)
    {
        $sql = <<<SQL
        SELECT * 
        FROM user 
        WHERE id = :id
        SQL;
        $result = $this->db->query($sql, ['id' => $ownerId]);
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
}