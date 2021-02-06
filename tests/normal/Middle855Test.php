<?php


namespace normal;


use Algorithm\normal\m855\ExamRoom;
use PHPUnit\Framework\TestCase;

class Middle855Test extends TestCase
{
    public function test()
    {
        $function = ["ExamRoom","seat","seat","seat","leave","leave","seat","seat","seat","seat","seat","seat","seat","seat","seat","leave","leave","seat","seat","leave","seat","leave","seat","leave","seat","leave","seat","leave","leave","seat","seat","leave","leave","seat","seat","leave"];
        $args = [[10],[],[],[],[0],[4],[],[],[],[],[],[],[],[],[],[0],[4],[],[],[7],[],[3],[],[3],[],[9],[],[0],[8],[],[],[0],[8],[],[],[2]];
        $result = [null];
        $examRoom = new ExamRoom($args[0][0]);
        for ($i = 1; $i < count($function); $i++) {
            if ($function[$i] == 'seat') {
                $result[] = $examRoom->seat();
            } else {
                $result[] = $examRoom->leave($args[$i][0]);
            }
        }
        $this->assertEquals([null,0,9,4,null,null,0,4,2,6,1,3,5,7,8,null,null,0,4,null,7,null,3,null,3,null,9,null,null,0,8,null,null,0,8,null], $result);
    }
}