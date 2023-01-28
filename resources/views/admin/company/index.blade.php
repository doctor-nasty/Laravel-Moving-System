@extends('layouts.admin')

@section('title', 'Company List')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Companies</h1>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('company.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add New
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('company.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>

            </div>

        </div>

        {{-- Alert Messages --}}
        @include('admin.common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All company</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">Name</th>
                                <th width="25%">Website</th>
                                <th width="15%">Address</th>
                                <th width="15%">Phone Number</th>
                                <th width="15%">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $comp)
                                <tr>
                                    <td>{{ $comp->name }}</td>
                                    <td>{{ $comp->website }}</td>
                                    <td>{{ $comp->state }}, {{ $comp->zip }}</td>
                                    <td>{{ $comp->phonenumber }}</td>
                                    <td>
                                        @if ($comp->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($comp->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td style="display: flex">
                                        @if ($comp->status == 0)
                                            <a href="{{ route('company.status', ['id' => $comp->id, 'status' => 1]) }}"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif ($comp->status == 1)
                                            <a href="{{ route('company.status', ['id' => $comp->id, 'status' => 0]) }}"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('company.edit', ['company' => $comp->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a href="{{ route('company.assignmentinterstate', ['company' => $comp->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fas fa-location-arrow"></i>
                                        </a>
                                        <a href="{{ route('company.assignmentinternational', ['company' => $comp->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fas fa-location-arrow"></i>
                                        </a>
                                        <a href="{{ route('company.assignmentcarshipping', ['company' => $comp->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fas fa-location-arrow"></i>
                                        </a>
                                        <a href="{{ route('company.assignmentstorage', ['company' => $comp->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fas fa-location-arrow"></i>
                                        </a>
                                        <a class="btn btn-danger m-2" href="{{ route('company.interstateleads', ['company' => $comp->id]) }}">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $company->links() }}
                </div>
            </div>
        </div>

    </div>

    @include('admin.company.delete-modal')

@endsection

@section('scripts')

@endsection
