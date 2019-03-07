<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-03-04
 * Time: 14:05
 */

namespace tests\Application;

use Application\IdDTO;
use Application\userApplicationService;
use Application\UserDTO;
use Domain\Age;
use Domain\Email;
use Domain\Name;
use Domain\User;
use Domain\UserDomainService;
use Domain\UserId;
use Domain\UserRepositoryInterface;

class UserApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateUser()
    {

        $mockRepository= $this->createMock(UserRepositoryInterface::class);

        $userDomainService = new UserDomainService($mockRepository);
        $sut = new UserApplicationService($userDomainService);

        $stringName = "Javici";
        $stringSurName= "De Barbera";
        $stringEmail = "teagujeroelpecho@barberadelvalles.masia";
        $intAge = 25;
        $user = new User(Name::build($stringName),Name::build($stringSurName),Email::build($stringEmail),Age::build($intAge), UserId::generate());


        $dtoUser = new UserDTO($stringName,$stringSurName,$stringEmail,$intAge, "");

        $mockRepository
            ->expects(self::once())
            ->method('save');
         $mockRepository
             ->expects(self::once())
             ->method('getById')
             ->willReturn($user);


        $dtoResponseUser = $sut->createAndSaveUser($dtoUser);

        self::assertEquals($dtoUser->getName(), $dtoResponseUser->getName());
        self::assertEquals($dtoUser->getSurName(), $dtoResponseUser->getSurName());
        self::assertEquals($dtoUser->getEmail(), $dtoResponseUser->getEmail());
        self::assertEquals($dtoUser->getAge(), $dtoResponseUser->getAge());
        self::assertNotEmpty($dtoResponseUser->getId());


    }

    public function testGetUserById()
    {

        $mockRepository= $this->createMock(UserRepositoryInterface::class);

        $userDomainService = new UserDomainService($mockRepository);
        $sut = new UserApplicationService($userDomainService);

        $stringName = "Javici";
        $stringSurName= "De Barbera";
        $stringEmail = "teagujeroelpecho@barberadelvalles.masia";
        $intAge = 25;
        $user = new User(Name::build($stringName),Name::build($stringSurName),Email::build($stringEmail),Age::build($intAge), UserId::generate());


        $dtoUser = new UserDTO($stringName,$stringSurName,$stringEmail,$intAge, "");


        $mockRepository
            ->expects(self::once())
            ->method('getById')
            ->willReturn($user);


        $dtoResponseUser = $sut->getUserById(new idDTO($user->getId()->value()));

        self::assertEquals($dtoUser->getName(), $dtoResponseUser->getName());
        self::assertEquals($dtoUser->getSurName(), $dtoResponseUser->getSurName());
        self::assertEquals($dtoUser->getEmail(), $dtoResponseUser->getEmail());
        self::assertEquals($dtoUser->getAge(), $dtoResponseUser->getAge());
        self::assertNotEmpty($dtoResponseUser->getId());


    }
}
