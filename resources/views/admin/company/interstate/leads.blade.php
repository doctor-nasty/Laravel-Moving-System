@extends('layouts.admin')

@section('title', 'Leads')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Interstate Leads</h1>
            <a href="{{ route('company.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('admin.common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $company->name }} 's Leads for Interstate</h6>
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
                            <th scope="col">From ZIP</th>
                            <th scope="col">To ZIP</th>
                          </tr>
                        </thead>
                        <tbody>


    <tr>
        @foreach ($instleads as $i)
        <th scope="row">{{$i->id}}</th>
        <td>{{$i->inst_fnm}}</td>
        <td>{{$i->inst_lnm}}</td>
        <td>{{$i->inst_tel}}</td>
        <td>{{$i->inst_email}}</td>
        <td>{{$i->inst_fr_zip}}</td>
        <td>{{$i->inst_to_zip}}</td>
        @endforeach
      </tr>

                        </tbody>
                      </table>

                    <p>test</p>
                </div>
            </div>
        </div>
    </div>


@endsection
