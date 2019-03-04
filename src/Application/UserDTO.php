<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-03-04
 * Time: 12:51
 */

namespace Application;


use Domain\User;

class UserDTO
{

    public $name;
    public $surName;
    public $email;
    public $age;
    public $id;

    public function __construct(string $name,string $surName, string $email, int $age, string $id)
    {
        $this->name = $name;
        $this->surName = $surName;
        $this->email = $email;
        $this->age = $age;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurName(): string
    {
        return $this->surName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}