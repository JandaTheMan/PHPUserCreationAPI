<?php
/**
 * Created by IntelliJ IDEA.
 * User: jandatheman
 * Date: 2019-03-04
 * Time: 10:54
 */

namespace Domain;


class UserId
{
    private $id;

    private function __construct(string $id)
    {
        //$this->validate($id);
        $this->id = $id;
    }

    public static function build(string $id) : userId
    {
        return new UserId($id);
    }

    public static function generate(): userId
    {
        $id = uniqid();
        //$this->validate($id);
        return new UserId($id);
    }

    public function value()
    {
        return $this->id;
    }

    /*private function validate(string $id): void
    {
        //validate the string if format
    }*/

}