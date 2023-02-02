@extends('layouts.admin')

@section('title', 'Company List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Movesize Price</h1>

        </div>

    </div>

    {{-- Alert Messages --}}
    @include('admin.common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Movesize Price</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Service</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($jct_svc_mvsz as $mvsz)
                            <tr>
                                <th scope="row">{{ $mvsz->id }}</th>
                                <td>{{ $mvsz->name }}</td>
                                <td>{{ $mvsz->cmp_name }}</td>
                                <td>
                                    @switch($mvsz->svc_id)
                                        @case(1)
                                            Interstate
                                        @break

                                        @case(2)
                                            International
                                        @break

                                        @case(3)
                                            Car Shipping
                                        @break

                                        @case(4)
                                            Storage
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    <form method="POST"
                                    action="{{ route('mvszupdateprice') }}">
                                    @csrf

                                        <input type="text" class="form-control form-control-user" id="price"
                                            placeholder="Minimum Days" name="price" value="{{old('price', number_format($mvsz->price, 2))}}">

                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

@endsection
