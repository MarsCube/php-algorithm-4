<?php


namespace normal;


use Algorithm\normal\m71\SimplifyPath;
use PHPUnit\Framework\TestCase;

class Middle71Test extends TestCase
{
    public function test() {
        SimplifyPath::handle('/../');
    }
}