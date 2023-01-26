@extends('layouts.app')

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
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $company->name }} 's Leads</h6>
            </div>


        </div>
        <div class="row">
            <div class="card shadow col-lg-12">

                <div class="tab-content">
@foreach ($inst as $i)
    {{$i->cmp_id}}
@endforeach

                    <p>test</p>
                </div>
            </div>
        </div>
    </div>


@endsection
