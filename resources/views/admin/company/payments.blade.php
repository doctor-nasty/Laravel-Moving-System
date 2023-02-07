@extends('layouts.admin')

@section('title', 'Leads')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Payments</h1>
            <a href="{{ route('company.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('admin.common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $company->name }} 's Payments</h6>

            </div>

        </div>
        <div class="row">
            <div class="card shadow col-lg-12">

                <div class="tab-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Lead Quantity</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Posted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>
                                    <form method="POST" action="{{ route('ldqtyprice') }}">
                                        @csrf

                                        <input type="number" class="form-control form-control-user" id="ld_qty"
                                            placeholder="Lead Quantity" name="ld_qty"
                                            value="{{ old('ld_qty', $payment->ld_qty) }}">

                                            <input type="hidden" value="{{ $payment->id }}" name="id" id="id">
                                            <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                        </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('totamntpayment') }}">
                                        @csrf

                                        <input type="number" class="form-control form-control-user" id="tot_amnt"
                                            placeholder="Total Amount" name="tot_amnt"
                                            value="{{ old('tot_amnt', number_format($payment->tot_amnt, 2)) }}">

                                        <input type="hidden" value="{{ $payment->id }}" name="id" id="id">
                                        <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">

                                    </form>
                                </td>
                                <td>{{ $payment->created_at }}</td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    @endsection
