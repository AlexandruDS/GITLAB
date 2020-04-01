<?php


class TreeHelper
{

    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }


    private function childrenOf($item)
    {
        $result = array();
        foreach ($this->items as $i) {
            if ($i->parent_id == $item->id) {
                $result[] = $i;
            }
        }
        return $result;
    }

    private function itemWithChildren($item)
    {
        $result = array();
        $children = $this->childrenOf($item);
        foreach ($children as $child) {
            $result[$child->name] = $this->itemWithChildren($child);
        }
        return $result;
    }

}
