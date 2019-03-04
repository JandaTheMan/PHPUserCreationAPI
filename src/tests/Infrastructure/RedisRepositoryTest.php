<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 17:41
 */

namespace tests\Infrastructure;

use Domain\Age;
use Domain\Email;
use Domain\Name;
use Domain\User;
use Domain\UserId;
use Infrastructure\RedisRepository;
use Predis\Client;

class RedisRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function testRedisRepository()
    {
        $redis = new Client(array(
            "scheme" => "tcp",
            "host" => "localhost",
            "port" => "6379",
            "password” => “"));

        $sut = new RedisRepository($redis);

        $name = "Javici";
        $surName= "De Barbera";
        $email = "teagujeroelpecho@barberadelvalles.masia";
        $age = 25;
        $id = UserId::generate();
        $user = new User(Name::build($name),Name::build($surName),Email::build($email),Age::build($age), $id);

        $sut->save($user);
        $receivedUser = $sut->getById($id);

        self::assertEquals($user,$receivedUser);


    }
}
