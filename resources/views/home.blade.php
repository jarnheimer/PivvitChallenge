@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-heading">
                    Add new purchase:

                    <form action="{{ route('purchases.store') }}" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="control-label col-md-2">Customer name</label>
                            <div class="col-md-2">
                                <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="offering_id" class="control-label col-md-2">Offering</label>
                            <div class="col-md-2">
                                <select name="offering_id" id="offering_id" class="form-control">
                                    @foreach($offerings as $offering)
                                        <option value="{{ $offering->offering_id }}">{{ $offering->title }} (${{ $offering->price }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="control-label col-md-2">Quantity</label>
                            <div class="col-md-2">
                                <input class="form-control" type="number" min="1" step="1" id="quantity" name="quantity" value="1">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add purchase</button>
                    </form>
                </div>
                <div class="panel-body">
                    Your purchases:

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
