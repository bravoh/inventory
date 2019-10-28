<?php

namespace Bravoh\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryCategory extends Model
{
    protected $table = 'inventory__categories';

    protected $fillable = ['id','name'];
}
