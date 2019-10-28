<?php
Route::group([
    'middleware' => ['web', 'auth'],
    'namespace'=>'Bravoh\Inventory\Http\Controllers',
    'prefix'=>config('inventory-config.path'),
    'as'=>config('inventory-config.route_name').'.'
],function (){
    Route::match(['get','post'],'/', 'InventoryController@index')->name('index');
    Route::match(['get','post'],'categories', 'InventoryController@categories')->name('categories');
    Route::match(['get','post'],'stock', 'InventoryController@stock')->name('stock');
});
