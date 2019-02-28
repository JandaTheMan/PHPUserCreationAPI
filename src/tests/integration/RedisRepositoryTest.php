<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 17:41
 */

namespace tests\integration;

use Predis\Client;

class RedisRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function testRedisRepository()
    {
        $redis = new Client(array(
            "scheme" => "tcp",
            "host" => "localhost",
            "port" => port,
            "password” => “password"));
    }
}
