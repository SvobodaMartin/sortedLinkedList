<?php

namespace App\services;

use App\Entity\LinkedList;
use App\Entity\Node;

class LinkedListService
{

    public function __construct(
        private LinkedList $list = new LinkedList(),
    )
    {
    }

    public function addNode(Node $node): void
    {
        $head = $this->list->getHead();
        if ($head === null) {
            $this->list->setHead($node);
            return;
        }

        if ($head->getData() > $node->getData()) {
            $node->setNext($head);
            $this->list->setHead($node);
            return;
        }

        $current = $head;

        while ($current->getNext() !== null) {
            if ($current->getNext()->getData() < $node->getData()) {
                $current = $current->getNext();
            } else {
                $node->setNext($current->getNext());
                $current->setNext($node);
                return;
            }
        }

        $current->setNext($node);
    }

    public function showList(): string
    {
        $head = $this->list->getHead();
        if ($head === null) {
            return 'list is empty';
        }

        $listText = $head->getData();
        $nextNode = $head->getNext();


        while ($nextNode !== null) {
            $listText .= ' -> ' . $nextNode->getData();
            $nextNode = $nextNode->getNext();
        }

        return 'Result: ' . $listText;
    }
}