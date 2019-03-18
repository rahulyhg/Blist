<?php

namespace Blist\Entity;

class UserEntity
{
    /** @var int */
    private $id;

    /** @var string */
    private $username;

    /** @var string */
    private $email;

    /** @var string */
    private $password;

    /** @var bool */
    private $isActive;

    public function __construct()
    {
        $this->cast();
    }

    public function cast()
    {
        $this->id = $this->id !== null ? (int) $this->id : null;
        $this->isActive = (bool) $this->isActive;
    }

    public function toArray()
    {
        return [
            'id' => $this->id !== null ? (string) $this->id : 'NULL',
            'username' => (string) $this->username,
            'email' => (string) $this->email,
            'password' => (string) $this->password,
            'isActive' => $this->isActive ? '1' : '0',
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }
}