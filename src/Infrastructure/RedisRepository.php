<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 16:47
 */

namespace Infrastructure;


use Domain\User;
use Domain\UserId;
use Domain\UserRepositoryInterface;
use Predis\Client;

class RedisRepository implements UserRepositoryInterface
{

    private $redis;

    public function __construct(Client $redis)
    {
        $this->redis = $redis;
    }
    public function save(User $user): void
    {
        $jsonUser = User::toJson($user);
        $this->redis->set($user->getId()->value(),$jsonUser);
    }

    public function getById(UserId $id): User
    {
        $jsonUser = $this->redis->get($id->value());
        return User::fromJson($jsonUser);

    }

}
