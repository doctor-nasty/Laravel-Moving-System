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
            <div class="card shadow col-md-6">
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
                                    <input type="text" class="form-control form-control-user" id="mindaysinter"
                                        placeholder="Minimum Days" name="mindaysinter" value="{{ $jct_fr_days->days }}">
                                </div>

                                <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                <input type="hidden" value="1" name="svc_id" id="svc_id">

                            </form>

                            <form id="cntyselectform" method="POST"
                                action="{{ route('company.cntyinterstate', ['company' => $company->id]) }}">
                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Please select counties in {{ $company->state }}</h3>
                                    <div name="cntSelect[]" id="cntSelect">
                                        <ul>
                                            {{-- <input type="checkbox" onClick="toggle(this)" /> Toggle All<br /> --}}
                                            @foreach ($counties as $county)
                                                <li>
                                                    <input class="checkIt" type="checkbox" id="cnty_id" name="cnty_id"
                                                        value="{{ $county->id }}"
                                                        @foreach ($jct_fr_cnty as $jct) @if ($jct->cnty_id == $county->id) checked @endif @endforeach>
                                                    {{ $county->county }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                    <input type="hidden" value="1" name="svc_id" id="svc_id">
                                </div>
                            </form>




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
                                                        value="{{ $state->id }}"
                                                        @foreach ($jct_to_stt as $jct) @if ($jct->st_id == $state->id) checked @endif @endforeach>
                                                    {{ $state->state_code }}
                                                </li>
                                            @endforeach
                                            <input type="hidden" value="{{ $company->id }}" name="cmp_id"
                                                id="cmp_id3">
                                            <input type="hidden" value="1" name="svc_id" id="svc_id3">
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow col-md-6">
                <ul id="myTabs" class="nav nav-pills nav-justified bg-white py-2 collapse-inner rounded"
                    role="tablist" data-tabs="tabs">
                    <li class="nav-item"><a class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            href="#CarShipping" data-toggle="tab">Car Shipping</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="CarShipping">
                        <div class="row">

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
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Please select counties in {{ $company->state }}</h3>
                                    <div name="cntSelect[]" id="cntSelect">
                                        <ul>
                                            {{-- <input type="checkbox" onClick="toggle(this)" /> Toggle All<br /> --}}
                                            @foreach ($counties as $county)
                                                <li>
                                                    <input class="checkItcar" type="checkbox" id="cnty_id" name="cnty_id"
                                                        value="{{ $county->id }}"
                                                        @foreach ($jct_fr_cnty_car as $jct) @if ($jct->cnty_id == $county->id) checked @endif @endforeach>
                                                    {{ $county->county }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                    <input type="hidden" value="3" name="svc_id" id="svc_id_car">
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
                                            <input type="hidden" value="3" name="svc_id" id="svc_id_car2">
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card shadow col-md-6">
                <ul id="myTabs" class="nav nav-pills nav-justified bg-white py-2 collapse-inner rounded"
                    role="tablist" data-tabs="tabs">
                    <li class="nav-item"><a class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            href="#International" data-toggle="tab">International</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="International">
                        <div class="row">

                            <form method="POST"
                                action="{{ route('company.mindaysinternat', ['company' => $company->id]) }}">
                                @csrf

                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="mindaysinter"
                                        placeholder="Minimum Days" name="mindaysinter" value="{{ $jct_fr_days_internat->days }}">
                                </div>

                                <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                <input type="hidden" value="2" name="svc_id" id="svc_id_internat">

                            </form>

                            <form id="cntyselectform" method="POST"
                                action="{{ route('company.cntyinternat', ['company' => $company->id]) }}">
                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Please select counties in {{ $company->state }}</h3>
                                    <div name="cntSelect[]" id="cntSelect">
                                        <ul>
                                            {{-- <input type="checkbox" onClick="toggle(this)" /> Toggle All<br /> --}}
                                            @foreach ($counties as $county)
                                                <li>
                                                    <input class="checkItinternat" type="checkbox" id="cnty_id" name="cnty_id"
                                                        value="{{ $county->id }}"
                                                        @foreach ($jct_fr_cnty_internat as $jct) @if ($jct->cnty_id == $county->id) checked @endif @endforeach>
                                                    {{ $county->county }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                    <input type="hidden" value="2" name="svc_id" id="svc_id_internat">
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
                                            id="cmp_id2">
                                        <input type="hidden" value="1" name="svc_id" id="svc_id_internat">

                                    </ul>
                                </div>
                            </div>
                        </form>

                            <form id="tostselectform" method="POST"
                                action="{{ route('company.tostcar', ['company' => $company->id]) }}">
                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>To Country</h3>
                                    <div name="tostSelect[]" id="tostSelect" multiple="multiple">
                                        <ul>
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
                                            <input type="hidden" value="2" name="svc_id" id="svc_id_internat">
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow col-md-6">
                <ul id="myTabs" class="nav nav-pills nav-justified bg-white py-2 collapse-inner rounded"
                    role="tablist" data-tabs="tabs">
                    <li class="nav-item"><a class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            href="#Storage" data-toggle="tab">Storage</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="Storage">
                        <div class="row">

                            <form id="cntyselectform" method="POST"
                                action="{{ route('company.cntystrg', ['company' => $company->id]) }}">
                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Please select counties in {{ $company->state }}</h3>
                                    <div name="cntSelect[]" id="cntSelect">
                                        <ul>
                                            {{-- <input type="checkbox" onClick="toggle(this)" /> Toggle All<br /> --}}
                                            @foreach ($counties as $county)
                                                <li>
                                                    <input class="checkItstrg" type="checkbox" id="cnty_id" name="cnty_id"
                                                        value="{{ $county->id }}"
                                                        @foreach ($jct_fr_cnty_strg as $jct) @if ($jct->cnty_id == $county->id) checked @endif @endforeach>
                                                    {{ $county->county }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <input type="hidden" value="{{ $company->id }}" name="cmp_id" id="cmp_id">
                                    <input type="hidden" value="4" name="svc_id" id="svc_id_strg">
                                </div>
                            </form>


                            <form id="strgselectform" method="POST"
                            action="{{ route('company.strg', ['company' => $company->id]) }}">
                            @csrf
                            <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                <h3>Storage Size</h3>
                                <div name="mvsz[]" id="mvSz" multiple="multiple">
                                    <ul>
                                        @foreach ($storages as $strg)
                                            <li>
                                                <input class="checkItstrg" name="strg_id" id="strg_id" type="checkbox"
                                                    value="{{ $strg->id }}"
                                                    @foreach ($jct_svc_strg as $jct) @if ($jct->strg_id == $strg->id) checked @endif @endforeach>
                                                {{ $strg->name }}
                                            </li>
                                        @endforeach
                                        <input type="hidden" value="{{ $company->id }}" name="cmp_id"
                                            id="cmp_id2">
                                        <input type="hidden" value="4" name="svc_id" id="svc_id_strgsz">

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
    {{-- <script>
$(document).ready(function() {
    $("#cntyselect-button").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('company/assignment/interstate/cntys') }}",
            data: $("#cntyselectform").serialize(),
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
});
</script> --}}

<script>
    $('.checkIt').on('click', function() {
        let cnty_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/interstate/cntys') }}',
                data: {
                    'cnty_id': cnty_id,
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
                url: '{{ url('company/assignment/interstate/cntysrem') }}',
                data: {
                    'cnty_id': cnty_id,
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>
<script>
    $('.checkItstrg').on('click', function() {
        let cnty_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/storage/cntys') }}',
                data: {
                    'cnty_id': cnty_id,
                    'cmp_id': $("#cmp_id").val(),
                    'svc_id': $("#svc_id_strg").val(),
                    _token: '{{ csrf_token() }}'
                }
            }).done(function(result) {
                console.log(result);
            });
        } else {
            $.ajax({
                type: "DELETE",
                url: '{{ url('company/assignment/storage/cntysrem') }}',
                data: {
                    'cnty_id': cnty_id,
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>

<script>
    $('.checkItcar').on('click', function() {
        let cnty_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/car/cntys') }}',
                data: {
                    'cnty_id': cnty_id,
                    'cmp_id': $("#cmp_id").val(),
                    'svc_id': $("#svc_id_car").val(),
                    _token: '{{ csrf_token() }}'
                }
            }).done(function(result) {
                console.log(result);
            });
        } else {
            $.ajax({
                type: "DELETE",
                url: '{{ url('company/assignment/car/cntysrem') }}',
                data: {
                    'cnty_id': cnty_id,
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>

<script>
    $('.checkItinternat').on('click', function() {
        let cnty_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/international/cntys') }}',
                data: {
                    'cnty_id': cnty_id,
                    'cmp_id': $("#cmp_id").val(),
                    'svc_id': $("#svc_id_internat").val(),
                    _token: '{{ csrf_token() }}'
                }
            }).done(function(result) {
                console.log(result);
            });
        } else {
            $.ajax({
                type: "DELETE",
                url: '{{ url('company/assignment/international/cntysrem') }}',
                data: {
                    'cnty_id': cnty_id,
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>
<script>
    $('.checkItmvsz').on('click', function() {
        let mvsz_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/interstate/mvsz') }}',
                data: {
                    'mvsz_id': mvsz_id,
                    'cmp_id': $("#cmp_id2").val(),
                    'svc_id': $("#svc_id2").val(),
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
    $('.checkItstrg').on('click', function() {
        let strg_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/storage/strg') }}',
                data: {
                    'strg_id': strg_id,
                    'cmp_id': $("#cmp_id").val(),
                    'svc_id': $("#svc_id_strgsz").val(),
                    _token: '{{ csrf_token() }}'
                }
            }).done(function(result) {
                console.log(result);
            });
        } else {
            $.ajax({
                type: "DELETE",
                url: '{{ url('company/assignment/storage/strgrem') }}',
                data: {
                    'strg_id': strg_id,
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>
<script>
    $('.checkItmvszinternat').on('click', function() {
        let mvsz_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/international/mvsz') }}',
                data: {
                    'mvsz_id': mvsz_id,
                    'cmp_id': $("#cmp_id").val(),
                    'svc_id': $("#svc_id_internat").val(),
                    _token: '{{ csrf_token() }}'
                }
            }).done(function(result) {
                console.log(result);
            });
        } else {
            $.ajax({
                type: "DELETE",
                url: '{{ url('company/assignment/international/mvszrem') }}',
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
                    'cmp_id': $("#cmp_id3").val(),
                    'svc_id': $("#svc_id3").val(),
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
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>
<script>
    $('.checkIttocntry').on('click', function() {
        let cntry_id = $(this).val();

        if ($(this).is(":checked")) {
            $.ajax({
                type: "POST",
                url: '{{ url('company/assignment/international/tocntry') }}',
                data: {
                    'cntry_id': cntry_id,
                    'cmp_id': $("#cmp_id3").val(),
                    _token: '{{ csrf_token() }}'
                }
            }).done(function(result) {
                console.log(result);
            });
        } else {
            $.ajax({
                type: "DELETE",
                url: '{{ url('company/assignment/international/tocntryrem') }}',
                data: {
                    'cntry_id': cntry_id,
                    _token: '{{ csrf_token() }}'
                }
            })
        }
    });
</script>
    <script>
        $('.checkIttostcar').on('click', function() {
            let st_id = $(this).val();

            if ($(this).is(":checked")) {
                $.ajax({
                    type: "POST",
                    url: '{{ url('company/assignment/car/tost') }}',
                    data: {
                        'st_id': st_id,
                        'cmp_id': $("#cmp_id3").val(),
                        'svc_id': $("#svc_id_car2").val(),
                        _token: '{{ csrf_token() }}'
                    }
                }).done(function(result) {
                    console.log(result);
                });
            } else {
                $.ajax({
                    type: "DELETE",
                    url: '{{ url('company/assignment/car/tostrem') }}',
                    data: {
                        'st_id': st_id,
                        _token: '{{ csrf_token() }}'
                    }
                })
            }
        });
    </script>
    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByName('cnty_id');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
                console.log("Checked");
                $.ajax({
                    type: "POST",
                    url: '{{ url('company/assignment/interstate/cntys') }}',
                    data: $("#cntyselectform").serialize()
                }).done(function(result) {
                    console.log(result);
                });
            }
        }
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#stSelect').on('change', function() {

                var State = new Array();


                $.each($('option[name="stSelect[]"]:checked'), function() {
                    var value = $(this).val()

                    State.push(value)

                })
                console.log(State)


                $("#cntSelect").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        STATE_CODE: State,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#cntSelect').html('<option value="">Select County</option>');
                        // alert(result);
                        $.each(result, function(key, value) {
                            $("#cntSelect").append('<option value=' + value
                                .county + '>' + value.county + '</option>');
                        });
                    }
                });
            });
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            $('#stSelect').multiselect({
                columns: 4,
                placeholder: 'Select options',
                includeSelectAllOption: true,
                enableFiltering: true,
                maxHeight: 250,
                includeFilterClearBtn: true,
                enableCaseInsensitiveFiltering: true,
            });
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            $('#cntSelect').multiselect({
                columns: 2,
                placeholder: 'Select options',
                includeSelectAllOption: true,
                enableFiltering: true,
                maxHeight: 250,
                includeFilterClearBtn: true,
                enableCaseInsensitiveFiltering: true,
            });

        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            $('#tostSelect').multiselect({
                columns: 2,
                placeholder: 'Select options',
                includeSelectAllOption: true,
                enableFiltering: true,
                maxHeight: 250,
                includeFilterClearBtn: true,
                enableCaseInsensitiveFiltering: true,
            });
        });
    </script> --}}
    <script>
        $("button.close").click(function() {
            $("ul li a").removeClass("active", "show");
            $(".tab-content div").removeClass("active", "show");
        });
    </script>
    {{-- <script>
        $('#cntSelect').multiselect({
            columns: 2,
            placeholder: 'Select options',
            includeSelectAllOption: true,
            enableFiltering: true,
            maxHeight: 450,
            includeFilterClearBtn: true,
            enableCaseInsensitiveFiltering: true,
            onChange: function(element, checked) {
                var options = $('#cntSelect option:selected');
                var selected = [];
                $(options).each(function(index, brand) {
                    selected.push($(this).val());
                });
                $('#selcnt').text("You selected: " + selected.join(','));
            }
        });

        $('#selcnt').text("You selected: " + $('#cntSelect').val()); // to show the selected on page load
    </script> --}}
@endsection
