<?php

class Node {
    public $children = [];
    public $isWord = false;
}

class Trie {
    private $root;

    function __construct() {
        $this->root = new Node();
    }

    /**
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $length = strlen($word);
        $node = $this->root;
        for ($i = 0; $i < $length; $i++) {
            $letter = $word[$i];
            if ($node->children[$letter] === null) {
                $node->children[$letter] = new Node();
            }
            $node = $node->children[$letter];
        }
        $node->isWord = true;
    }

    /**
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $node = $this->getNode($word);
        if ($node === null) {
            return false;
        }

        return $node->isWord;
    }

    private function getNode($word) {
        $length = strlen($word);
        $node = $this->root;
        for ($i = 0; $i < $length; $i++) {
            $letter = $word[$i];
            if (!$node->children[$letter]) {
                return null;
            }
            $node = $node->children[$letter];
        }

        return $node;
    }

    /**
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $node = $this->getNode($prefix);

        return $node !== null;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */