@extends('layouts.admin')

@section('title', 'Company Assignment')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Company Assignment</h1>
            <a href="{{ route('company.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('admin.common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Assign Services to {{ $company->name }}</h6>
            </div>


        </div>
        <div class="row">
            <div class="card shadow col-lg-12">
                <ul id="myTabs" class="nav nav-pills nav-justified bg-white py-2 collapse-inner rounded"
                    role="tablist" data-tabs="tabs">
                    <li class="nav-item"><a class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            href="#CarShipping" data-toggle="tab">Car Shipping</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="CarShipping">
                        <div class="row" id="slcnty">

                            <form method="POST"
                                action="{{ route('company.mindayscar', ['company' => $company->id]) }}">
                                @csrf

                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="mindaysinter"
                                        placeholder="Minimum Days" name="mindaysinter" value="{{ $jct_fr_days_car->days }}">
                                </div>

                                <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                <input type="hidden" value="3" name="svc_id" id="svc_id">

                            </form>

                            <form id="cntyselectform" method="POST"
                                action="{{ route('company.cntyinterstate', ['company' => $company->id]) }}">
                                @csrf
                                {{-- <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Please select counties in {{ $company->state }}</h3>
                                    <div name="cntSelect[]" id="cntSelect">
                                        <ul>
                                            @foreach ($counties as $county)
                                                <li>
                                                    <input class="checkItcar" type="checkbox" id="cnty_id" name="cnty_id"
                                                        value="{{ $county->id }}"
                                                        @foreach ($jct_fr_cnty_car as $jct) @if ($jct->cnty_id == $county->id) checked @endif @endforeach>
                                                    {{ $county->county }}
                                                </li>
                                            @endforeach --}}
                                            <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                                <h3>Please select counties in </h3>
                                                @php
                                                $tmp_hd = null;
                                            @endphp

                                            @foreach ($selectedCntys as $cnty)
                                                @if ($cnty->state_code != $tmp_hd)
                                        </div>
                                        <div class="column">
                                            <h4>
                                                {{ $cnty->state_code }}
                                            </h4>
                                            <span>
                                                @php

                                                    $tmp_hd = $cnty->state_code;
                                                @endphp
                                                @endif

                                                <p class="cnty">{{ $cnty->county }}</p>
                                                @endforeach
                                            </span>
                                        </div>
                                        <div class="clear"></div>
                                                <div>
                                                    <ul class="astates">
                                                        @foreach ($allowedstates as $astate)
                                                        <li id="astates">
                                                            <a href="{{ url('admin/company/assignment/' . $company->id . '/' . $astate->state_code . '/carshipping') }}" id="allowedstateslist" name="allowedstateslist"
                                                                value="{{ $astate->id }}"
                                                                class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                                                @foreach ($jct_cmp_st as $jct) @if ($jct->st_id == $astate->id) checked @endif @endforeach>
                                                            {{ $astate->state_code }}</a>
                                                        </li>
                                                    @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                    <input type="hidden" value="3" name="svc_id" id="svc_id">
                                </div>
                            </form>




                        </div>

                        <div class="row">

                            <form id="tostselectform" method="POST"
                                action="{{ route('company.tostcar', ['company' => $company->id]) }}">
                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>To State</h3>
                                    <div name="tostSelect[]" id="tostSelect" multiple="multiple">
                                        <ul>
                                            @foreach ($states as $state)
                                                <li>
                                                    <input class="checkIttostcar" type="checkbox" id="st_id" name="st_id"
                                                        value="{{ $state->id }}"
                                                        @foreach ($jct_to_stt_car as $jct) @if ($jct->st_id == $state->id) checked @endif @endforeach>
                                                    {{ $state->state_code }}
                                                </li>
                                            @endforeach
                                            <input type="hidden" value="{{ $company->id }}" name="cmp_id"
                                                id="cmp_id3">
                                            <input type="hidden" value="3" name="svc_id" id="svc_id">
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>



    <script>
        $('.checkIttostcar').on('click', function() {
            let st_id = $(this).val();

            if ($(this).is(":checked")) {
                $.ajax({
                    type: "POST",
                    url: '{{ url('admin/company/assignment/car/tost') }}',
                    data: {
                        'st_id': st_id,
                        'cmp_id': $("#cmp_id").val(),
                        'svc_id': $("#svc_id").val(),
                        _token: '{{ csrf_token() }}'
                    }
                }).done(function(result) {
                    console.log(result);
                });
            } else {
                $.ajax({
                    type: "DELETE",
                    url: '{{ url('admin/company/assignment/car/tostrem') }}',
                    data: {
                        'st_id': st_id,
                        'cmp_id': $("#cmp_id").val(),
                        'svc_id': $("#svc_id").val(),
                        _token: '{{ csrf_token() }}'
                    }
                })
            }
        });
    </script>

@endsection
