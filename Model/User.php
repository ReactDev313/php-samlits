<?php

namespace SamplitsApp;

/**
 * Class User
 */
class User extends Model
{
    public static $table_name = 'users';
    public static $saved_fields = ['email', 'username', 'hashed_password', 'role','balance'];

    /**
     * @var string
     */
    protected $email;

    /**
     * @var
     */
    protected $username;

    /**
     * @var
     */
    protected $hashed_password;

   /**
     * @var
     */
    protected $role;
    /**
     * @var
     */
    protected $balance;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHashedPassword()
    {
        return $this->hashed_password;
    }

    /**
     * @param mixed $hashed_password
     * @return User
     */
    public function setHashedPassword($hashed_password): User
    {
        $this->hashed_password = $hashed_password;
        return $this;
    }

    public function getUserRole() 
    {
         return $this->role;
    }

    public function setUserRole($userrole): User
    {
        $this->role = $userrole;
        return $this;
    }
    public function getBalance() 
    {
         return $this->role;
    }

    public function setBalance($balance): User
    {
        $this->balance = $balance;
        return $this;
    }
}