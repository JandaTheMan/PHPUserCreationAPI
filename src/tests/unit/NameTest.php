<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 14:17
 */

namespace tests\unit;

use Domain\Exceptions\InvalidNameFormatException;
use Domain\Name;

class NameTest extends \PHPUnit_Framework_TestCase
{

    public function testNameWithCorrectFormatBuildsOK()
    {
        $stringName = "correct";

        $name = new Name($stringName);

        self::assertEquals($stringName,$name->value());

    }

    public function testToLongNameThrowsException(){


        $stringName = "incrorrect_name__more_than_10_characters";

        $this->expectException(InvalidNameFormatException::class);

        $name = new Name($stringName);
        $name->value();

    }

    public function testToShortNameThrowsException(){

        $stringName = "incN"; //incorrectName

        $this->expectException(InvalidNameFormatException::class);

        $name = new Name($stringName);
        $name->value();
    }

}
