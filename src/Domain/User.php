<?php

namespace Domain;

class User
{

    private $id;
    private $name;
    private $surName;
    private $email;
    private $age;

    public function __construct(Name $name,Name $surName,Email $email,Age $age){
        $this->name = $name;
        $this->surName = $surName;
        $this->email = $email;
        $this->age = $age;
        $this->id =uniqid();
    }

    public static function toJson(User $user)
    {
        return json_encode($user);
    }

    public static function fromJson($jsonUser)
    {
        return json_decode($jsonUser);
    }

    public function getName(){
        return $this->name;
    }

    public function getSurName(){
        return $this->surName;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getAge(){
        return $this->age;
    }

    public function getId(){
        return $this->id;
    }

}