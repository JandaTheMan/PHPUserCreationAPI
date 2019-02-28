<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 14:17
 */

namespace tests\unit;

use Domain\Age;
use Domain\Exceptions\InvalidAgeFormatException;

class AgeTest extends \PHPUnit_Framework_TestCase
{

    public function testNameWithCorrectFormatBuildsOK()
    {
        $intAge = 55;

        $age = new Age(55);

        self::assertEquals($intAge,$age->value());

    }

    /**
     * @dataProvider getInvalidString
     */
    public function testToInvalidNameThrowsException($intAge){


        $this->expectException(InvalidAgeFormatException::class);

        $age = new Age($intAge);

    }

    public function getInvalidString()
    {
        return [
            [-50],
            [545454],
            [151],
        ];
    }

}
