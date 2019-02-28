<?php

namespace tests\unit;

use Domain\User;
use Domain\UserDomainService;
use Domain\UserRepositoryInterface;


class UserDomainServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateUser()
    {
        $mockRepository= $this->createMock(UserRepositoryInterface::class);

        $sut = new UserDomainService($mockRepository);

        $name = "Javici";
        $surName= "De Barbera";
        $email = "teagujeroelpecho@barberadelvalles.masia";
        $age = 25;

        /** @var User $result */
        $result = $sut->createAndSaveUser($name,$surName,$email,$age);

        self::assertEquals($name, $result->getName());
        self::assertEquals($surName, $result->getSurName());
        self::assertEquals($email, $result->getEmail());
        self::assertEquals($age, $result->getAge());
    }


}
