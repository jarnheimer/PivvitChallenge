@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add new purchase:

                    <form id="create" action="{{ route('purchases.store') }}" class="form-horizontal" method="post">
                        <div class="form-group">
                            <label for="customer_name" class="control-label col-md-3">Customer name</label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" id="customer_name" name="customer_name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="offering_id" class="control-label col-md-3">Offering</label>
                            <div class="col-md-3">
                                <select name="offering_id" id="offering_id" class="form-control">
                                    <option>- check offering -</option>
                                    @foreach($offerings as $offering)
                                        <option value="{{ $offering->id }}">{{ $offering->title }} (${{ $offering->price }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="control-label col-md-3">Quantity</label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" min="1" step="1" id="quantity" name="quantity" value="1">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add purchase</button>
                    </form>
                </div>
                <div class="panel-body">
                    Your purchases:

                    <table id="table" class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </table>

                    Total: $<span id="total">0</span>
                </div>
                <div class="panel-footer">
                    <ul id="errors"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
