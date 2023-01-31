@extends('layouts.admin')

@section('title', 'Leads')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Leads</h1>
            <a href="{{ route('company.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('admin.common.alert')
        <style>
            label {
                margin-left: 20px;
            }

            #datepicker {
                width: 180px;
                margin: 0 20px 20px 20px;
            }

            #datepicker>span:hover {
                cursor: pointer;
            }
        </style>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $company->name }} 's Leads</h6>
                <form action="{{ route('search', ['company' => $company->id]) }}" method="GET">
                    <input type="date" name="datefrom" required />
                    <input type="date" name="dateto" required />
                    <input type="hidden" name="cmp_id" value="{{$company->id}}" required />
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit">Search</button>
                </form>
            </div>

        </div>
        <div class="row">
            <div class="card shadow col-lg-12">

                <div class="tab-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($leads as $i)
                                <tr>
                                    <th scope="row">
                                        @switch($i->svc_id)
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
                                    </th>
                                    <td>{{ $i->inst_fnm }} {{ $i->intl_fnm }} {{ $i->carshp_fnm }} {{ $i->strg_fnm }}
                                    </td>
                                    <td>{{ $i->inst_lnm }} {{ $i->intl_lnm }} {{ $i->carshp_lnm }} {{ $i->strg_lnm }}
                                    </td>
                                    <td>{{ $i->inst_tel }} {{ $i->intl_tel }} {{ $i->carshp_tel }} {{ $i->strg_tel }}
                                    </td>
                                    <td>{{ $i->inst_email }} {{ $i->intl_email }} {{ $i->carshp_email }}
                                        {{ $i->strg_email }}</td>
                                    <td>{{ $i->inst_created_at }} {{ $i->intl_created_at }} {{ $i->carshp_created_at }}
                                        {{ $i->strg_created_at }}</td>
                                </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    @endsection
