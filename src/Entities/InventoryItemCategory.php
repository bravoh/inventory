<?php

namespace Bravoh\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryItemCategory extends Model
{
    protected $table = 'inventory__item_categories';

    protected $fillable = ['id','item_id','category_id'];
}
