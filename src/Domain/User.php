<?php

namespace Domain;

class User
{

    private $id;
    private $name;
    private $surName;
    private $email;
    private $age;

    public function __construct(Name $name,surName $surName,Email $email,Age $age){
        $this-> name = $name->value();
        $this-> surName = $surName>value();
        $this-> email = $email>value();
        $this-> age = $age>value();
        $this-> id = 15;
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


}