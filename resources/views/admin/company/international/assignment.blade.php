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
                            href="#International" data-toggle="tab">International</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="International">
                        <div class="row" id="slcnty">

                            <form method="POST"
                                action="{{ route('company.mindaysinternat', ['company' => $company->id]) }}">
                                @csrf

                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="mindaysinter"
                                        placeholder="Minimum Days" name="mindaysinter" value="{{ $jct_fr_days_internat->days }}">
                                </div>

                                <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                <input type="hidden" value="2" name="svc_id" id="svc_id">

                            </form>

                            <form id="cntyselectform" method="POST"
                                action="{{ route('company.cntyinternat', ['company' => $company->id]) }}">
                                @csrf
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
                                                <a href="{{ url('admin/company/assignment/' . $company->id . '/' . $astate->state_code . '/international') }}" id="allowedstateslist" name="allowedstateslist"
                                                    value="{{ $astate->id }}" class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                                    >
                                                {{ $astate->state_code }}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                    <input type="hidden" value="2" name="svc_id" id="svc_id">
                                </div>
                            </form>




                        </div>

                        <div class="row">

                        <form id="mvszselectform" method="POST"
                            action="{{ route('company.mvszinternat', ['company' => $company->id]) }}">
                            @csrf
                            <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                <h3>Job Size</h3>
                                <div name="mvSz[]" id="mvSz" multiple="multiple">
                                    <ul>
                                        @foreach ($movesize as $mvsz)
                                            <li>
                                                <input class="checkItmvszinternat" name="mvsz_id" id="mvsz_id" type="checkbox"
                                                    value="{{ $mvsz->mvsz_id }}"
                                                    @foreach ($jct_svc_mvsz_internat as $jctmvsz) @if ($jctmvsz->mvsz_id == $mvsz->mvsz_id) checked @endif @endforeach>
                                                {{ $mvsz->mvsz_name }}
                                            </li>
                                        @endforeach
                                        <input type="hidden" value="{{ $company->id }}" name="cmp_id"
                                            id="cmp_id">
                                        <input type="hidden" value="2" name="svc_id" id="svc_id">

                                    </ul>
                                </div>
                            </div>
                        </form>

                            {{-- <form id="tostselectform" method="POST"
                                action="{{ route('company.tostcar', ['company' => $company->id]) }}">
                                @csrf --}}
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>To Country</h3>
                                    <div multiple="multiple">
                                        {{-- <ul>
                                            @foreach ($countries as $country)
                                                <li>
                                                    <input class="checkIttocntry" type="checkbox" id="cntry_id" name="cntry_id"
                                                        value="{{ $country->id }}"
                                                        @foreach ($jct_to_cntry as $jct) @if ($jct->cntry_id == $country->id) checked @endif @endforeach>
                                                    {{ $country->country }}
                                                </li>
                                            @endforeach
                                            <input type="hidden" value="{{ $company->id }}" name="cmp_id"
                                                id="cmp_id">
                                            <input type="hidden" value="2" name="svc_id" id="svc_id">
                                        </ul> --}}

                                        <ul class="astates">
                                            @foreach ($continents as $continent)
                                            <li id="astates">
                                                <a href="{{ route('company.assignmentscontinentinternational', ['company' => $company->id, 'continent' => $continent->continent]) }}" id="allowedstateslist" name="allowedstateslist"
                                                    value="{{ $continent->id }}" class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                                    >
                                                {{ $continent->continent }}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>



<script>
    $('.checkItmvszinternat').on('click', function() {
        let mvsz_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('admin/company/assignment/international/mvsz') }}',
                data: {
                    'mvsz_id': mvsz_id,
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
                url: '{{ url('admin/company/assignment/international/mvszrem') }}',
                data: {
                    'mvsz_id': mvsz_id,
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>


@endsection
