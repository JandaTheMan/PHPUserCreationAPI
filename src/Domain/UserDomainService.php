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

    public function createAndSaveUser(Name $name,Name $surName,Email $email,Age $age) : User
    {
        $id = UserId::generate();
        $user = new User($name, $surName, $email, $age, $id);
        $this->userRepository->save($user);
        return $this->userRepository->getById($user->getId());
    }

    public function getUserById(UserId $id)
    {
        return $this->userRepository->getById($id);

    }
}