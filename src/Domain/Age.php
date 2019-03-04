<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 14:12
 */

namespace Domain;

use Domain\Exceptions\InvalidAgeFormatException;

class Age
{
    private $age;
    const MIN_AGE = 0;
    const MAX_AGE = 110;

    public function __construct(int $age)
    {
        $this->validate($age);
        $this->age = $age;
    }

    private function validate(int $age): void
    {
        if($this->isntRealAge($age)){
            throw new InvalidAgeFormatException($age);
        }
    }

    public function value(): int {
        return $this->age;
    }

    private function isntRealAge(int $age) : bool
    {
        return
        $age < self::MIN_AGE ||
        $age > self::MAX_AGE;
    }

    public static function build(int $age)
    {
        return new Age($age);
    }

}