<?php
namespace tests\unit;


use Domain\Age;
use Domain\Email;
use Domain\Name;
use Domain\User;
use Domain\UserId;

require  '../../../vendor/autoload.php';

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testUserEntity(){

        $name = "Javici";
        $surName= "De Barbera";
        $email = "teagujeroelpecho@barberadelvalles.masia";
        $age = 25;
        $user = new User(new Name($name),new Name($surName),new Email($email),new Age($age), UserId::generate());

        $this->assertEquals($name, $user->getName()->value());
        $this->assertEquals($surName, $user->getSurname()->value());
        $this->assertEquals($email, $user->getEmail()->value());
        $this->assertEquals($age, $user->getAge()->value());
    }
}
