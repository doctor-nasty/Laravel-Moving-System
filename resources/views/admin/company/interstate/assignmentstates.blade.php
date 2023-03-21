@extends('layouts.admin')

@section('title', 'Company Assignment')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Company Assignment</h1>
            <a href="{{ route('company.assignmentinterstate', ['company' => $company->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                <ul id="myTabs" class="nav nav-pills nav-justified bg-white py-2 collapse-inner rounded" role="tablist"
                    data-tabs="tabs">
                    <li class="nav-item"><a class="nav-link d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                            href="#Storage" data-toggle="tab">Storage</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="Storage">
                        <div class="row">
                            {{-- <form method="POST" action="{{ url('api/fetch-allowedstates') }}">
    @csrf
    <select class="required form-select" name="allowedstateslist" id="allowedstateslist" required>
        <option value="" disabled selected>Select State</option>
        @foreach ($allowedstates as $astate)
            <option value="{{ ucfirst($astate->state_code) }}">{{ ucfirst($astate->state_code) }}</option>
        @endforeach
    </select>
    <button type="submit">Change</button>
</form> --}}
                            <form id="cntyselectform" method="POST" action="">
                                @csrf
                                <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                                    <h3>Please select counties in {{ $st }} </h3>
                                    <div name="cntSelect[]" id="cntSelect">
                                        <button type="button" id="select-all">Select All</button>

                                        <ul>

                                            @foreach ($counties as $county)
                                                <li>
                                                    <input class="checkIt" type="checkbox" id="cnty_id" name="cnty_id[]"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script>
        $('.checkIt').on('click', function() {

            let cnty_id = $(this).val();

            if ($(this).is(":checked")) {
                $.ajax({
                    type: "POST",
                    url: '{{ url('admin/company/assignment/interstate/cntys') }}',
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
                    url: '{{ url('admin/company/assignment/interstate/cntysrem') }}',
                    data: {
                        'cnty_id': cnty_id,
                        'cmp_id': $("#cmp_id").val(),
                        'svc_id': $("#svc_id").val(),
                        _token: '{{ csrf_token() }}'
                    }
                }).done(function(result) {
                console.log(result);
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
            });
            }
        });
    </script>
  <script>
$(document).ready(function() {
    $("#select-all").click(function() {
        // Get all checkboxes
        let checkboxes = $("input[type='checkbox']");

        if ($(this).data('checked')) {
            // Deselect all checkboxes and update the data attribute
            checkboxes.prop('checked', false);
            $(this).data('checked', false);

            // Perform AJAX request for each checkbox
            checkboxes.each(function() {
                let cnty_id = $(this).val();
                $.ajax({
                    type: "DELETE",
                    url: '{{ url('admin/company/assignment/interstate/cntysrem') }}',
                    data: {
                        'cnty_id': cnty_id,
                        'cmp_id': $("#cmp_id").val(),
                        'svc_id': $("#svc_id").val(),
                        _token: '{{ csrf_token() }}'
                    }
                }).done(function(result) {
                    console.log(result);
                });
            });

        } else {
            // Select all checkboxes and update the data attribute
            checkboxes.prop('checked', true);
            $(this).data('checked', true);

            // Perform AJAX request for each checkbox
            checkboxes.each(function() {
                let cnty_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '{{ url('admin/company/assignment/interstate/cntys') }}',
                    data: {
                        'cnty_id': cnty_id,
                        'cmp_id': $("#cmp_id").val(),
                        'svc_id': $("#svc_id").val(),
                        _token: '{{ csrf_token() }}'
                    }
                }).done(function(result) {
                    console.log(result);
                });
            });
        }
    });
});

    </script>
@endsection
