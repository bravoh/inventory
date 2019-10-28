<?php

namespace Bravoh\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Malezi\Entities\User;

class InventoryItemStock extends Model
{
    protected $table = 'inventory__stocks';

    protected $fillable = ['id','user_id','item_id','opening_quantity','quantity','closing_quantity','type','reason'];

    public function inventory_item(){
        return $this->belongsTo(InventoryItem::class,'item_id');
    }

    public function getDateAttribute(){
        return date('d-m-y  H:i A',strtotime($this->created_at));
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
