<?php


namespace normal;


use Algorithm\normal\m208\Trie;
use PHPUnit\Framework\TestCase;

class Middle208Test extends TestCase
{
    public function test()
    {
        $trie = new Trie();
        $trie->insert("apple");
        $this->assertTrue($trie->search("apple"));   // 返回 true
        $this->assertFalse($trie->search("app"));    // 返回 false
        $this->assertTrue($trie->startsWith("app")); // 返回 true
        $trie->insert("app");
        $this->assertTrue($trie->search("app"));     // 返回 true
    }
}