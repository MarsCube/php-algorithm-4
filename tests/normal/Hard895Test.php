<?php


namespace normal;


use Algorithm\normal\h895\FreqStack;
use PHPUnit\Framework\TestCase;

class Hard895Test extends TestCase
{
    public function test() {
        // ["FreqStack","push","push","push","push","push","push","pop","push","pop","push","pop","push","pop","push","pop","pop","pop","pop","pop","pop"]
        //[[],[4],[0],[9],[3],[4],[2],[],[6],[],[1],[],[1],[],[4],[],[],[],[],[],[]]
        $stack = new FreqStack();
        $stack->push(4);
        $stack->push(0);
        $stack->push(9);
        $stack->push(3);
        $stack->push(4);
        $stack->push(2);
        echo $stack->pop() . PHP_EOL;
        $stack->push(6);
        echo $stack->pop() . PHP_EOL;
        $stack->push(1);
        echo $stack->pop() . PHP_EOL;
        $stack->push(1);
        echo $stack->pop() . PHP_EOL;
        $stack->push(4);
        echo $stack->pop() . PHP_EOL;
        echo $stack->pop() . PHP_EOL;
        echo $stack->pop() . PHP_EOL;
        echo $stack->pop() . PHP_EOL;
        echo $stack->pop() . PHP_EOL;
        echo $stack->pop() . PHP_EOL;
    }
}