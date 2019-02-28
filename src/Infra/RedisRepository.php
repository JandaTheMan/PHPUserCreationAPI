<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 16:47
 */

namespace Infra;


use Domain\User;
use Domain\UserRepositoryInterface;
use Redis;

class RedisRepository implements UserRepositoryInterface
{

    private $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }
    public function save(User $user): User{


         $this->redis->save($user->getId(), User::toJson($user));
    }

    public function getById($id): User{
        $jsonUser = $this->redis->get($id);
        return User::fromJson($jsonUser);

    }

}
