@extends('layouts.app')

@section('content')
<h1>Zip Codes</h1>

<p>
    <a class="btn btn-primary" href="/zipcodes/create"><span class="glyphicon glyphicon-plus"></span> Add Zip Code</a>
</p>

<form class="form-inline" method="GET">
  <div class="form-group mb-2">
    <label for="filter" class="col-sm-2 col-form-label">Filter</label>
    <input type="text" class="form-control" id="filter" name="filter" placeholder="Enter Zip Code" value="{{$filter}}">
  </div>
  <button type="submit" class="btn btn-default mb-2">Filter</button>
</form>

<table class="table table-bordered table-hover">
    <thead>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('ZIP')</th>
        <th>@sortablelink('CITY')</th>
        <th>@sortablelink('STATE')</th>
        <th>@sortablelink('STATE_CODE')</th>
        <th>@sortablelink('Latitude')</th>
        <th>@sortablelink('Longitude')</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @if ($zipcodes->count() == 0)
        <tr>
            <td colspan="5">No zipcodes to display.</td>
        </tr>
        @endif

        @foreach ($zipcodes as $zipcode)
        <tr>
            <td>{{ $zipcode->id }}</td>
            <td>{{ $zipcode->ZIP }}</td>
            <td>{{ $zipcode->CITY }}</td>
            <td>{{ $zipcode->STATE }}</td>
            <td>{{ $zipcode->STATE_CODE }}</td>
            <td>{{ $zipcode->Latitude }}</td>
            <td>{{ $zipcode->Longitude }}</td>
            <td>
                <a class="btn btn-sm btn-success" href="">Edit</a>

                <form style="display:inline-block" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger"> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<!-- <table id="products-table" class="table table-bordered table-hover" class="display" style="width:100%">
    <thead>
    <th>ID</th>
        <th>ZIP</th>
        <th>CITY</th>
        <th>STATE</th>
        <th>STATE_CODE</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Actions</th>
    </thead>
    <tbody>

    </tbody>
</table>
<td>{{ $zipcode->id }}</td>
            <td>{{ $zipcode->ZIP }}</td>
            <td>{{ $zipcode->CITY }}</td>
            <td>{{ $zipcode->STATE }}</td>
            <td>{{ $zipcode->STATE_CODE }}</td>
            <td>{{ $zipcode->Latitude }}</td>
            <td>{{ $zipcode->Longitude }}</td>
<script>
$(document).ready(function() {
    $('#products-table').DataTable({
        "serverSide": true,
        "ajax": {
            url: "", 
            method: "get"
        },
        "columnDefs" : [{
            'targets': [4], 
            'orderable': false
        }],
    });
});
</script> -->

{!! $zipcodes->appends(Request::except('page'))->render() !!}


<p>
    Displaying {{$zipcodes->count()}} of {{ $zipcodes->total() }} zipcodes(s).
</p>
@endsection