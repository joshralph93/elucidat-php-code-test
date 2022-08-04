<?php

namespace App\ItemTypes;

use App\Item;

class BackstagePassItem implements ItemType
{
    /**
     * @var Item
     */
    private $item;

    /**
     * BackstagePassItem constructor.
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
        $this->item->quality += 1;

        if ($this->item->sellIn <= 10) {
            $this->item->quality += 1;
        }

        if ($this->item->sellIn <= 5) {
            $this->item->quality += 1;
        }

        $this->item->sellIn -= 1;

        if ($this->item->sellIn < 0) {
            $this->item->quality = 0;
        }

        if ($this->item->quality > 50) {
            $this->item->quality = 50;
        }
    }
}
