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
}