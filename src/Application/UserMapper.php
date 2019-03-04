<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-03-04
 * Time: 15:25
 */

namespace Application;


use Domain\Age;
use Domain\Email;
use Domain\Name;
use Domain\User;
use Domain\UserId;

class UserMapper
{

    public static function fromDTOtoUser(UserDTo $userDTo):User
    {
        return new User(
            Name::build($userDTo->getName()),
            Name::build($userDTo->getSurName()),
            Email::build($userDTo->getEmail()),
            Age::build($userDTo->getAge()),
            UserId::build($userDTo->getId())
        );
    }

    public static function fromDTOtoUserWithoutID(UserDTo $userDTo):User
    {
        return new User(
            Name::build($userDTo->getName()),
            Name::build($userDTo->getSurName()),
            Email::build($userDTo->getEmail()),
            Age::build($userDTo->getAge()),
            UserId::generate()
        );
    }


    public static function fromUserToDTO(User $user):UserDTO
    {
        return new UserDTO(
            $user->getName()->value(),
            $user->getSurName()->value(),
            $user->getEmail()->value(),
            $user->getAge()->value(),
            $user->getId()->value()
        );
    }

    public static function fromDTOtoUserId(IdDTO $idDTO): UserId
    {
        return UserId::build($idDTO->getId());
    }

}