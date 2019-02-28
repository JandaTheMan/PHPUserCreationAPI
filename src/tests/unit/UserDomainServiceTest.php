<?php

namespace tests\unit;

use Domain\Age;
use Domain\Email;
use Domain\Name;
use Domain\User;
use Domain\UserDomainService;
use Domain\UserRepositoryInterface;


class UserDomainServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateUser()
    {
        $mockRepository= $this->createMock(UserRepositoryInterface::class);

        $sut = new UserDomainService($mockRepository);

        $stringName = "Javici";
        $stringSurName= "De_Barbera";
        $stringEmail = "teagujeroelpecho@barberadelvalles.masia";
        $intAge = 25;

        $name = new Name($stringName);
        $surName = new Name($stringSurName);
        $email = new Email($stringEmail);
        $age = new Age($intAge);

        $result = $sut->createAndSaveUser($name,$surName,$email,$age);

        self::assertEquals($name, $result->getName());
        self::assertEquals($surName, $result->getSurName());
        self::assertEquals($email, $result->getEmail());
        self::assertEquals($age, $result->getAge());
    }


}
