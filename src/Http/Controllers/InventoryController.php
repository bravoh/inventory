<?php

namespace Bravoh\Inventory\Http\Controllers;

use Bravoh\Inventory\Entities\InventoryCategory;
use Bravoh\Inventory\Entities\InventoryItem;
use Bravoh\Inventory\Entities\InventoryItemStock;

class InventoryController extends Controller
{
    public function index(){
        $item = InventoryItem::find(\request()->id);

        if (\request()->isMethod('POST'))
            $this->saveInventoryItem();

        $items = InventoryItem::all();

        return view('inventory::index',compact('item','items'));
    }

    public function saveInventoryItem(){
        $data = array(
            'name'=>\request()->name,
            'price'=>\request()->price,
        );

        $item = InventoryItem::updateOrCreate(['id'=>\request()->id,'name'=>\request()->name,],$data);

        if (is_null(\request()->id) && \request()->stock > 0)
            $this->moveStock($item,\request()->stock,'stock-take');

        return back();
    }

    public function moveStock(InventoryItem $item, $qty, $type = '+',$reason = null){
        $opening_qty = $item->in_stock;
        $closing_qty = 0;

        switch ($type){
            case '-':
                $closing_qty = $opening_qty - $qty;
                break;
            case 'reset':
                $closing_qty = 0;
                break;
            default:
                $closing_qty = $opening_qty + $qty;
                break;
        }
        $data = [
            'item_id'=>$item->id,
            'opening_quantity'=>$opening_qty,
            'quantity'=>$qty,
            'closing_quantity'=>$closing_qty,
            'type'=>$type,
            'user_id'=>\Auth::id(),
            'reason'=>$reason
        ];

        InventoryItemStock::create($data);
    }

    public function categories(){
        if (\request()->isMethod('post'))
            InventoryCategory::updateOrCreate(['id'=>\request()->id,'name'=>\request()->name]);

        $items = InventoryCategory::all();

        return view('inventory::categories',compact('items'));
    }

    public function stock(){
        $item = InventoryItem::find(\request()->item_id);

        if (\request()->isMethod('POST'))
            $this->moveStock(
                $item,
                \request()->quantity,
                \request()->type,
                \request()->reason
            );

        $items = InventoryItemStock::orderBy('id','desc')->get();
        $inventory_items = InventoryItem::all();

        return view('inventory::stock',compact('items','inventory_items'));
    }

}
