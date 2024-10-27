<?php

namespace App\DSA;

class NodeMissingException extends \Exception {}
class DuplicateEdgeException extends \Exception {}

class Node
{
    public $label;

    public function __construct(string $label)
    {
        $this->label = $label;
    }
}

class DirectedGraph
{
    public $nodes;
    public $edges;

    public function __construct()
    {
        $this->nodes = [];
        $this->edges = [];
    }

    public function addNode(string $label)
    {
        if (array_key_exists($label, $this->nodes))
            return;

        $this->nodes[$label] = new Node($label);
        $this->edges[$label] = [];
    }

    public function addEdge($fromLabel, $toLabel)
    {
        if (
            !array_key_exists($fromLabel, $this->nodes)
            || !array_key_exists($toLabel, $this->nodes)
        ) {
            throw new NodeMissingException('One or both nodes not found to add a edge between');
        }

        $toNode = $this->nodes[$toLabel];

        if (in_array($toNode, $this->edges[$fromLabel]))
            throw new DuplicateEdgeException("$fromLabel -> toLabel edge already exists");

        $this->edges[$fromLabel][$toLabel] = $toNode;
    }

    public function removeNode($label)
    {
        if (!array_key_exists($label, $this->nodes))
            return;

        foreach ($this->edges as $fromLabel => $currentEdges) {
            if (array_key_exists($label, $this->edges[$fromLabel]))
                unset($this->edges[$fromLabel][$label]);
        }

        unset($this->edges[$label]);
        unset($this->nodes[$label]);
    }

    public function removeEdge($fromLabel, $toLabel)
    {
        if (
            !array_key_exists($fromLabel, $this->nodes)
            || !array_key_exists($toLabel, $this->nodes)
        ) {
            throw new NodeMissingException('One or both nodes not found to add a edge between');
        }

        if ($this->edges[$fromLabel][$toLabel])
            unset($this->edges[$fromLabel][$toLabel]);
    }

    public function traverseDepthFirst(string $label)
    {
        if (!array_key_exists($label, $this->nodes))
            return;

        $visited = [];

        $traverse = function ($label) use (&$visited, &$traverse) {
            if (in_array($label, $visited))
                return;

            $visited[] = $label;

            foreach ($this->edges[$label] as $edgeLabel => $edge) {
                $traverse($edgeLabel);
            }

            return implode(', ', $visited);
        };

        echo $traverse($label) . "\n";
    }

    public function hasCycle()
    {
        $visiting = [];
        $visited = [];

        $hasCycle = function ($label) use (&$visiting, &$visited, &$hasCycle) {
            if (in_array($label, $visited))
                return;

            if (in_array($label, $visiting))
                return true;

            $visiting[] = $label;

            foreach ($this->edges[$label] as $neighborLabel => $neighbor) {
                if ($hasCycle($neighborLabel)) {
                    return true;
                }
            }

            array_pop($visiting);
            $visited[] = $label;

            return false;
        };

        foreach ($this->nodes as $label => $node) {
            if ($hasCycle($label))
                return true;
        }

        return false;
    }

    public function showEdgeInfo()
    {
        foreach ($this->edges as $fromLabel => $currentEdges) {
            if ($currentEdges)
                echo "$fromLabel is connected to " . implode(', ', array_keys($currentEdges)) . "\n";
        }
    }
}
