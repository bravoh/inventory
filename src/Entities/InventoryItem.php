<?php

namespace Bravoh\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $table = 'inventory__items';

    protected $fillable = ['id','name','price'];

    public function stock(){
        return $this->hasMany(InventoryItemStock::class,'item_id');
    }

    public function getInStockAttribute(){
        $taken = $this->stock()->whereType('stock-take')->sum('quantity');
        $added = $this->stock()->whereType('+')->sum('quantity');
        $total_added = $taken + $added;

        $removed = $this->stock()->whereType('-')->sum('quantity');

        return $total_added - $removed;
    }

    public function getStockValueAttribute(){
        $value = $this->in_stock * $this->price;
        return number_format($value,2);
    }
}
