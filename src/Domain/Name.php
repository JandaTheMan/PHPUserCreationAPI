<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-02-28
 * Time: 14:12
 */

namespace Domain;



use Domain\Exceptions\InvalidNameFormatException;

class Name
{
    private $name;
    const MIN_LENGTH = 5;
    const MAX_LENGTH = 10;

    public function __construct(string $name)
    {
        $this->validate($name);
        $this->name = $name;
    }

    private function validate(string $name): void
    {
        if($this->isNameFormatIncorrect($name)){
            throw new InvalidNameFormatException($name);
        }
    }

    public function value(): string{
        return $this->name;
    }

    private function isNameFormatIncorrect($name): bool
    {
        return strlen($name) < self::MIN_LENGTH || strlen($name) > self::MAX_LENGTH ;
    }

}