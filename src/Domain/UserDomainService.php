<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 13:49
 */

namespace Domain;


class UserDomainService
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }

    public function createAndSaveUser($name, $surName, $email, $age) : User
    {
        $user = new User($name, $surName, $email, $age);
        $this->userRepository->save($user);
        return $user;
    }
}