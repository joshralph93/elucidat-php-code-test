<?php

namespace App\ItemTypes;

use App\Item;

class AgedBrieItem implements ItemType
{
    /**
     * @var Item
     */
    private $item;

    /**
     * AgedBrieItem constructor.
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
        $this->item->sellIn -= 1;
        $this->item->quality += 1;

        if ($this->item->sellIn < 0) {
            $this->item->quality += 1;
        }

        if ($this->item->quality > 50) {
            $this->item->quality = 50;
        }
    }
}
