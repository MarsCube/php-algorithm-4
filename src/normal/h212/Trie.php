<?php


namespace Algorithm\normal\h212;

/**
 * 实现 Trie (前缀树)
 *
 * 实现一个 Trie (前缀树)，包含 insert, search, 和 startsWith 这三个操作。
 *
 * Class Trie
 * @package Algorithm\normal\m208
 */
class Trie
{
    /**
     * @var Node 根节点
     */
    private $root;

    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->root = new Node();
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     */
    function insert(string $word)
    {
        $len = strlen($word);
        $root = $this->root;
        for ($i = 0; $i < $len; $i++) {
            if (!isset($root->next[$word[$i]])) {
                $root->next[$word[$i]] = new Node();
            }
            $root = $root->next[$word[$i]];
        }
        $root->is_string = true;
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search(string $word): bool
    {
        $node = $this->searchPrefix($word);
        return $node && $node->is_string;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith(string $prefix): bool
    {
        return (bool)$this->searchPrefix($prefix);
    }

    /**
     * 查找前缀节点
     *
     * @param $prefix
     * @return Node|false
     */
    private function searchPrefix($prefix)
    {
        $len = strlen($prefix);
        $root = $this->root;
        for ($i = 0; $i < $len; $i++) {
            if (!isset($root->next[$prefix[$i]])) {
                return false;
            }
            $root = $root->next[$prefix[$i]];
        }
        return $root;
    }

    public function root(): Node
    {
        return $this->root;
    }
}