<?php

namespace App;

class GildedRose
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItem($which = null)
    {
        return ($which === null
            ? $this->items
            : $this->items[$which]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as $item) {
            $updater = match ($item->name) {
                'Conjured Mana Cake'                        => new ItemTypes\ConjuredItem($item),
                'Aged Brie'                                 => new ItemTypes\AgedBrieItem($item),
                'Sulfuras, Hand of Ragnaros'                => new ItemTypes\SulfurasItem($item),
                'Backstage passes to a TAFKAL80ETC concert' => new ItemTypes\BackstagePassItem($item),
                default                                     => new ItemTypes\NormalItem($item),
            };

            $updater->nextDay();
        }
    }
}
