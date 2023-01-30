@extends('layouts.app')

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
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Assign Services to {{ $company->name }}</h6>
            </div>


        </div>
        <div class="row">
            <div class="card shadow col-lg-12">
                <ul id="myTabs" class="nav nav-pills nav-justified bg-white py-2 collapse-inner rounded" role="tablist"
                    data-tabs="tabs">
                    <li class="nav-item"><a class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            href="#Interstate" data-toggle="tab">Interstate</a>
                        {{-- <button type="button" class="close"
                            aria-label="Close">X</button> --}}
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="Interstate">

                        <div class="row">

                            <form method="POST"
                                action="{{ route('company.mindaysinterstate', ['company' => $company->id]) }}">
                                @csrf

                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Minimum Days</h3>
                                    <input type="text" class="form-control form-control-user" id="mindaysinter"
                                        placeholder="Minimum Days" name="mindaysinter" value="{{ $jct_fr_days->days }}">
                                </div>

                                <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                <input type="hidden" value="1" name="svc_id" id="svc_id">

                            </form>





                        </div>
                        <div class="row">

                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Select counties in </h3>
                                        <ul class="astates">
                                            @foreach ($allowedstates as $astate)
                                            <li id="astates">
                                                <a href="{{ url('/company/assignment/' . $company->id . '/' . $astate->state_code . '/interstate') }}" id="allowedstateslist" name="allowedstateslist"
                                                    value="{{ $astate->id }}" class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                                    @foreach ($jct_cmp_st as $jct) @if ($jct->st_id == $astate->id) checked @endif @endforeach>
                                                {{ $astate->state_code }}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                    <input type="hidden" value="1" name="svc_id" id="svc_id">
                                </div>
                        </div>

                        <div class="row">

                            <form id="mvszselectform" method="POST"
                                action="{{ route('company.mvszinterstate', ['company' => $company->id]) }}">
                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Job Size</h3>
                                    <div name="mvSz[]" id="mvSz" multiple="multiple">
                                        <ul>
                                            @foreach ($movesize as $mvsz)
                                                <li>
                                                    <input class="checkItmvsz" name="mvsz_id" id="mvsz_id" type="checkbox"
                                                        value="{{ $mvsz->mvsz_id }}"
                                                        @foreach ($jct_svc_mvsz as $jctmvsz) @if ($jctmvsz->mvsz_id == $mvsz->mvsz_id) checked @endif @endforeach>
                                                    {{ $mvsz->mvsz_name }}
                                                </li>
                                            @endforeach
                                            <input type="hidden" value="{{ $company->id }}" name="cmp_id"
                                                id="cmp_id2">
                                            <input type="hidden" value="1" name="svc_id" id="svc_id2">

                                        </ul>
                                    </div>
                                </div>
                            </form>

                            <form id="tostselectform" method="POST"
                                action="{{ route('company.tostinterstate', ['company' => $company->id]) }}">
                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>To State</h3>
                                    <div name="tostSelect[]" id="tostSelect" multiple="multiple">
                                        <ul>
                                            @foreach ($states as $state)
                                                <li>
                                                    <input class="checkIttost" type="checkbox" id="st_id" name="st_id"
                                                        value="{{ $state->zipcode }}"
                                                        @foreach ($jct_to_stt as $jct) @if ($jct->st_id == $state->zipcode) checked @endif @endforeach>
                                                    {{ $state->z_state_code }}
                                                </li>
                                            @endforeach
                                            <input type="hidden" value="{{ $company->id }}" name="cmp_id"
                                                id="cmp_id">
                                            <input type="hidden" value="1" name="svc_id" id="svc_id">
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
    $('.checkItmvsz').on('click', function() {
        let mvsz_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/interstate/mvsz') }}',
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
                url: '{{ url('company/assignment/interstate/mvszrem') }}',
                data: {
                    'mvsz_id': mvsz_id,
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>

<script>
    $('.checkIttost').on('click', function() {
        let st_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/interstate/tost') }}',
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
                url: '{{ url('company/assignment/interstate/tostrem') }}',
                data: {
                    'st_id': st_id,
                    'cmp_id': $("#cmp_id").val(),
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>

@endsection
