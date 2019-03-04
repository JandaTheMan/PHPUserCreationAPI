<?php

namespace Domain;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Annotation as Serializer;

class User
{
    /**
     * @Serializer\Type("Domain\Name")
     */
    private $name;
    private $surName;
    private $email;
    private $age;
    private $id;

    public function __construct(Name $name,Name $surName,Email $email,Age $age,UserId $id){
        $this->name = $name;
        $this->surName = $surName;
        $this->email = $email;
        $this->age = $age;
        $this->id = $id;
    }

    public function getName():Name{
        return $this->name;
    }

    public function getSurName():Name{
        return $this->surName;
    }

    public function getEmail():Email{
        return $this->email;
    }

    public function getAge():Age{
        return $this->age;
    }

    public function getId(): UserId{
        return $this->id;
    }

    private function toArray()
    {
        return array(
            "name" => $this->getName()->value(),
            "surName" => $this->getSurName()->value(),
            "email" => $this->getEmail()->value(),
            "age" => $this->getAge()->value(),
            "id" => $this->getId()->value(),
        );
    }

    public static function toJson(User $user):string
    {
        $jsonContent = json_encode($user->toArray());
        return $jsonContent;
    }

    public static function fromJson($jsonUser):User
    {
        $json = json_decode($jsonUser, true);
        $name = Name::build($json["name"]);
        $surName = Name::build($json["surName"]);
        $email = Email::build($json["email"]);
        $age = Age::build($json["age"]);
        $id = UserId::build($json["id"]);
        $user = new User($name,$surName,$email,$age,$id);
        return $user;
    }
}