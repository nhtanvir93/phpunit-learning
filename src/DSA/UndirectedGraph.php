<?php

namespace App\DSA;

class NodeNotFoundException extends \Exception {}

class MinPriorityQueue
{
    public $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function size()
    {
        return count($this->items);
    }

    public function enqueue(Edge $edge)
    {
        for ($i = 0; $i < $this->size(); $i++) {
            if ($this->items[$i]->cost > $edge->cost) {
                array_splice($this->items, $i, 0, $edge);
                return;
            }
        }

        $this->items[] = $edge;
    }

    public function dequeue()
    {
        return array_shift($this->items);
    }
}



class Node
{
    public $label;
    public $edges;

    public function __construct(string $label)
    {
        $this->label = $label;
        $this->edges = [];
    }

    public function addEdge(Node $toNode, int $cost)
    {
        $this->edges[$toNode->label] = new Edge($this, $toNode, $cost);
    }
}



class Edge
{
    public $fromNode;
    public $toNode;
    public $cost;

    public function __construct(Node $fromNode, Node $toNode, int $cost)
    {
        $this->fromNode = $fromNode;
        $this->toNode = $toNode;
        $this->cost = $cost;
    }
}



class UndirectedGraph
{
    public $nodes;

    public function __construct()
    {
        $this->nodes = [];
    }

    public function addNode(string $label)
    {
        if (array_key_exists($label, $this->nodes))
            return;

        $this->nodes[$label] = new Node($label);
    }

    public function addEdge(string $fromLabel, string $toLabel, int $cost)
    {
        if (!array_key_exists($fromLabel, $this->nodes) || !array_key_exists($toLabel, $this->nodes))
            throw new NodeNotFoundException("$fromLabel or $toLabel not found");

        $fromNode = $this->nodes[$fromLabel];
        $toNode = $this->nodes[$toLabel];

        $fromNode->addEdge($toNode, $cost);
        $toNode->addEdge($fromNode, $cost);
    }

    public function showEdges()
    {
        foreach ($this->nodes as $label => $node) {
            foreach ($node->edges as $toLabel => $edge) {
                echo "$label is connected to $toLabel with cost " . $edge->cost . "\n";
            }
        }
    }
}
