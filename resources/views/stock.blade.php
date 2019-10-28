@extends('inventory::layouts.main')

@section('title')
    Update Stock
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
@endsection


@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        New
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" class="needs-validation" novalidate="">

                    @csrf

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="firstName">Select Item</label>
                                <select class="form-control" name="item_id">
                                    @foreach($inventory_items as $inv_itm)
                                        <option value="{{$inv_itm->id}}">{{$inv_itm->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="firstName">Update Type</label>

                                <select class="form-control" name="type">
                                    @foreach(config('inventory-config.adjustment_types') as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="name">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" id="quantity" aria-describedby="nameHelp" placeholder="" required>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="firstName">Reason</label>
                                <textarea class="form-control" name="reason" ></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary btn-block" type="submit">
                            Update Stock
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="table-responsive">
        <br/>
        @if($items->count() > 0)
            <h2>Change Log</h2>
            <table class="table table-striped table-sm" id="dtable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Inventory Item</th>
                    <th>Opening Quantity</th>
                    <th>Quantity</th>
                    <th>Adjustment Type</th>
                    <th>New Quantity</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($items as $stock)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$stock->date}}</td>
                        <td>{{@ucwords($stock->user->first_name)}} {{@ucwords($stock->user->last_name)}}</td>
                        <td>{{@ucwords($stock->inventory_item->name)}}</td>
                        <td>{{$stock->opening_quantity}}</td>
                        <td>{{$stock->quantity}}</td>
                        <td>{{@config('inventory-config.adjustment_types')[$stock->type]}}</td>
                        <td>{{@$stock->closing_quantity}}</td>
                        <td></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @endif

    </div>
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>

    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#dtable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
@endsection
