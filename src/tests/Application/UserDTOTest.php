<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-03-04
 * Time: 14:07
 */

namespace tests\Application;

use Application\UserDTO;
use Application\UserMapper;
use Domain\Age;
use Domain\Email;
use Domain\Name;
use Domain\User;
use Domain\UserId;

class UserDTOTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateUserDTOfromUserEntity()
    {
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

        $userDTO = UserMapper::fromUserToDTO($user);


        self::assertEquals($name->value(), $user->getName()->value());
        self::assertEquals($surName->value(), $user->getSurName()->value());
        self::assertEquals($email->value(), $user->getEmail()->value());
        self::assertEquals($age->value(), $user->getAge()->value());

    }
}
