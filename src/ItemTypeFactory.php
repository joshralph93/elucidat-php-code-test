<?php

namespace App;

use App\ItemTypes\ItemType;

class ItemTypeFactory
{
    /**
     * Resolve an item type.
     *
     * @param Item $item
     * @return ItemType
     */
    public static function resolveFor(Item $item): ItemType
    {
        return match ($item->name) {
            'Conjured Mana Cake'                        => new ItemTypes\ConjuredItem($item),
            'Aged Brie'                                 => new ItemTypes\AgedBrieItem($item),
            'Sulfuras, Hand of Ragnaros'                => new ItemTypes\SulfurasItem($item),
            'Backstage passes to a TAFKAL80ETC concert' => new ItemTypes\BackstagePassItem($item),
            default                                     => new ItemTypes\NormalItem($item),
        };
    }
}
