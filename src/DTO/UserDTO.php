<?php
namespace App\DTO;

use App\Classes\User;

class UserDTO
{
    public $user_id;
    public $name;
    public $last_name;

    public function __construct(User $user)
    {
        $this->user_id = $user->getUserId();
        $this->name = $user->getName();
        $this->last_name = $user->getLastName();
    }
    public static function createFromValues(User $user): UserDTO
    {
        return new self($user);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }
}
