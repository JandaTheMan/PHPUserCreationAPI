<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-03-04
 * Time: 15:14
 */

namespace Application;


use Domain\User;
use Domain\UserDomainService;
use Domain\Application;

class UserApplicationService
{

    private $domainService;

    public function __construct(UserDomainService $domainService)
    {
        $this->domainService =$domainService;
    }


    public function createAndSaveUser(UserDTO $userDTO): userDTO
    {
        $user = $this->domainService->saveUser(UserMapper::fromDTOtoUserWithoutID($userDTO));
        return UserMapper::fromUserToDTO($user);
    }


    public function getUserById(IdDTO $idDTO)
    {
        $user = $this->domainService->getUserById(UserMapper::fromDTOtoUserId($idDTO));
        return UserMapper::fromUserToDTO($user);
    }
}