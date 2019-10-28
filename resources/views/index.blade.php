@extends('inventory::layouts.main')

@section('title')
    Inventory Manager
@endsection

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModalLong">
        + Item
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Inventory Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">

                        @csrf

                        <div class="form-group">
                            <label for="name">Item Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="" value="" required="">
                            <small id="nameHelp" class="form-text text-muted">Name of product etc.</small>
                        </div>

                        <div class="form-group">
                            <label for="buying_price">Buying Price</label>
                            <input name="price" type="text" class="form-control" id="buying_price" placeholder="" value="" required="">
                            <small id="buying_priceHelp" class="form-text text-muted">Can also be the estimated market price.</small>
                        </div>

                        <div class="form-group">
                            <label for="current_stock">Current Stock</label>
                            <input name="stock" type="text" class="form-control" id="current_stock" placeholder="" value="0">
                            <small id="current_stockHelp" class="form-text text-muted">The available stock at hand.</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="table-responsive">
        <br/>
        @if($items->count() > 0)
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th class="text-right">Buying Price</th>
                    <th class="text-right">Current Stock</th>
                    <th class="text-right">Stock Value</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $inventory_item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ucwords($inventory_item->name)}}</td>
                        <td class="text-right">{{number_format($inventory_item->price,2)}}</td>
                        <td class="text-right">{{$inventory_item->in_stock}}</td>
                        <td class="text-right">{{$inventory_item->stock_value}}</td>
                        <td></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif

    </div>
@endsection

@section('scripts')

@endsection
