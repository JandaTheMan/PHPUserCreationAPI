<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 13:55
 */

namespace Domain;


interface UserRepositoryInterface
{

    public function save(User $user): void;

    public function getById(UserId $id): User;
}