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
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $tmp_hd = NULL;
                        @endphp
                        @foreach ($jct_svc_mvsz as $mvsz)
                            @if ($mvsz->svc_id != $tmp_hd)
                                <tr>
                                    <td colspan="2">
                                        <h3>
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
                                        </h3>
                                    </td>
                                </tr>
                                @php

                                    $tmp_hd = $mvsz->svc_id;
                                @endphp
                            @endif
                            <tr>
                                <td>{{ $mvsz->name }}</td>
                                <td>
                                    <form method="POST" action="{{ route('mvszupdateprice') }}">
                                        @csrf

                                        <input type="number" step="any" class="form-control form-control-user" id="price"
                                            placeholder="Price" name="price"
                                            value="{{ old('price', number_format($mvsz->price, 2)) }}">

                                        <input type="hidden" value="{{ $mvsz->id }}" name="id" id="id">
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="2">
                                <h3>
                                Car
                                </h3>
                            </td>
                        </tr>
                        @foreach ($jct_svc_car as $car)

                    <tr>
                        <td>{{ $car->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('mvszupdatepricecar') }}">
                                @csrf

                                <input type="number" step="any" class="form-control form-control-user" id="price"
                                    placeholder="Price" name="price"
                                    value="{{ old('price', number_format($car->price, 2)) }}">

                                <input type="hidden" value="{{ $car->id }}" name="id" id="id">
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="2">
                        <h3>
                        Storage
                        </h3>
                    </td>
                </tr>
                @foreach ($jct_svc_strg as $strg)

            <tr>
                <td>{{ $strg->name }}</td>
                <td>
                    <form method="POST" action="{{ route('mvszupdatepricestrg') }}">
                        @csrf

                        <input type="number" step="any" class="form-control form-control-user" id="price"
                            placeholder="Price" name="price"
                            value="{{ old('price', number_format($strg->price, 2)) }}">

                        <input type="hidden" value="{{ $strg->id }}" name="id" id="id">
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
