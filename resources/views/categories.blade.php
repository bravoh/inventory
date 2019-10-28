@extends('inventory::layouts.main')

@section('title')
    Item Categories
@endsection

@section('content')

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="">
            <small id="nameHelp" class="form-text text-muted">Category name.</small>
        </div>

        <button type="submit" class="btn btn-primary">Save Category</button>
    </form>

    <div class="table-responsive">
        <br/>
        @if($items->count() > 0)
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $cat)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cat->name}}</td>
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
