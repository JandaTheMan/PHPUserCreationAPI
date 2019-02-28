<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 15:42
 */

namespace tests\unit;

use Domain\Email;
use Domain\Exceptions\InvalidEmailFormatException;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    public function testEmailWithCorrectFormatBuildsOK()
    {
        $stringName = "user@correctFormat.com";

        $email = new Email($stringName);

        self::assertEquals($stringName,$email->value());

    }

    /**
     * @dataProvider getInvalidString
     */
    public function testToInvalidEmailThrowsException($stringName){


        $this->expectException(InvalidEmailFormatException::class);

        $email = new Email($stringName);

    }

    public function getInvalidString()
    {
        return [
            ["user@email"],
            ["user.com"],
            ["^]+++ytefve"],
        ];
    }
}
