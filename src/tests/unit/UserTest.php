<?php
namespace tests\unit;


use Domain\User;

require  '../../../vendor/autoload.php';

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testUserEntity(){

        $name = "Javici";
        $surName= "De Barbera";
        $email = "teagujeroelpecho@barberadelvalles.masia";
        $age = 25;
        $user = new User($name,$surName,$email,$age);

        $this->assertEquals($name, $user->getName());
        $this->assertEquals($surName, $user->getSurname());
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($age, $user->getAge());
    }
}
