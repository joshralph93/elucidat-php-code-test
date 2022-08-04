<?php

namespace App\ItemTypes;

interface ItemType
{
    /**
     * Update item for next day.
     *
     * @return void
     */
    public function nextDay(): void;
}
