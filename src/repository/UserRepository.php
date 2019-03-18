<?php

namespace Blist\Repository;

use Blist\Core\Database;
use Blist\Entity\UserEntity;

class UserRepository
{
    public function createQuery($sql)
    {
        $connection = Database::$connection;
        $query = $connection->prepare($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS, UserEntity::class);
        return $query;
    }

    public function findAll()
    {
        $query = $this->createQuery("SELECT * FROM user");
        $query->execute();
        return $query->fetchAll();
    }

    public function insert(UserEntity $user)
    {
        $query = $this->createQuery("INSERT INTO user VALUES (:id, :username, :email, :password, :isActive)");
        $query->execute($user->toArray());
        if ($query->errorCode() !== '00000') die(print_r($query->errorInfo(), true));
        $user->setId((int) Database::$connection->lastInsertId());
        return $user;
    }

    public function update(UserEntity $user)
    {
        $query = $this->createQuery("UPDATE user SET username=:username, email=:email, password=:password, isActive=:isActive WHERE id=:id");
        $query->execute($user->toArray());
    }

    public function remove(UserEntity $user)
    {
        $query = $this->createQuery("DELETE FROM user WHERE id=:id");
        $query->execute(['id' => $user->getId()]);
    }
}