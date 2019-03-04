<?php

namespace tests\unit;

use Domain\Age;
use Domain\Email;
use Domain\Name;
use Domain\User;
use Domain\UserDomainService;
use Domain\UserId;
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

        $name = Name::build($stringName);
        $surName = Name::build($stringSurName);
        $email = Email::build($stringEmail);
        $age = Age::build($intAge);
        $userId = UserID::generate();
        $user = new User($name,$surName,$email,$age,$userId);

        $mockRepository
            ->expects(self::once())
            ->method('save');

        $mockRepository
            ->expects(self::exactly(2))
            ->method('getById')
            ->willReturn($user);

        $result = $sut->saveUser($user);


        self::assertEquals($name->value(), $result->getName()->value());
        self::assertEquals($surName->value(), $result->getSurName()->value());
        self::assertEquals($email->value(), $result->getEmail()->value());
        self::assertEquals($age->value(), $result->getAge()->value());
    }

    public function testGetUser(){

        $mockRepository= $this->createMock(UserRepositoryInterface::class);

        $sut = new UserDomainService($mockRepository);

        $stringName = "Javici";
        $stringSurName= "De Barbera";
        $stringEmail = "teagujeroelpecho@barberadelvalles.masia";
        $intAge = 25;

        $name = Name::build($stringName);
        $surName = Name::build($stringSurName);
        $email = Email::build($stringEmail);
        $age = Age::build($intAge);
        $userId = UserID::generate();
        $user = new User($name,$surName,$email,$age,$userId);

        $mockRepository
            ->expects(self::once())
            ->method('getById')
            ->willReturn($user);

        $result = $sut->getUserById($userId);

        self::assertEquals($name->value(), $result->getName()->value());
        self::assertEquals($surName->value(), $result->getSurName()->value());
        self::assertEquals($email->value(), $result->getEmail()->value());
        self::assertEquals($age->value(), $result->getAge()->value());
        self::assertEquals($userId->value(), $result->getId()->value());

    }


}
