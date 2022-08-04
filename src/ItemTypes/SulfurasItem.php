<?php

namespace App\ItemTypes;

use App\Item;

class SulfurasItem implements ItemType
{
    /**
     * @var Item
     */
    private $item;

    /**
     * SulfurasItem constructor.
     *
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Update item for next day.
     *
     * @return void
     */
    public function nextDay(): void
    {
        $this->item->quality = 80;
    }
}
