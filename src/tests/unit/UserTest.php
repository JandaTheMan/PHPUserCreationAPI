<?php
namespace tests\unit;


use Domain\Age;
use Domain\Email;
use Domain\Name;
use Domain\User;

require  '../../../vendor/autoload.php';

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testUserEntity(){

        $name = "Javici";
        $surName= "De Barbera";
        $email = "teagujeroelpecho@barberadelvalles.masia";
        $age = 25;
        $user = new User(new Name($name),new Name($surName),new Email($email),new Age($age));

        $this->assertEquals($name, $user->getName());
        $this->assertEquals($surName, $user->getSurname());
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($age, $user->getAge());
    }
}
