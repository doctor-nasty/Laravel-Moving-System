<form class="row others-moving-form position-relative mb-0" action="{{ route('carForm.create.step.one.post') }}"
    method="POST">
    @csrf

    <div style="margin-bottom: 10px; color:red;">

        @if ($errors->has('carshp_fr_zip'))
            <li class="mb4">{{ $errors->first('carshp_fr_zip') }}</li>
        @endif

        @if ($errors->has('carshp_to_zip'))
            <li class="mb4">{{ $errors->first('carshp_to_zip') }}</li>
        @endif

        @if ($errors->has('carshp_vhmk'))
            <li class="mb4">{{ $errors->first('carshp_vhmk') }}</li>
        @endif

        @if ($errors->has('carshp_vhmdl'))
            <li class="mb4">{{ $errors->first('carshp_vhmdl') }}</li>
        @endif

        @if ($errors->has('carshp_vhyr'))
            <li class="mb4">{{ $errors->first('carshp_vhyr') }}</li>
        @endif

        @if ($errors->has('carshp_dt'))
            <li class="mb4">{{ $errors->first('carshp_dt') }}</li>
        @endif

        @if ($errors->has('type3'))
            <li class="mb4">{{ $errors->first('type3') }}</li>
        @endif
    </div>

    <div class="form-process">
        <div class="css3-spinner">
            <div class="css3-spinner-scaler"></div>
        </div>
    </div>
    <div class="col-12 form-group">

    </div>

    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="fa-sharp fa-solid fa-location-minus"></i></span>
            <input type="number" value="{{ $form->carshp_fr_zip ?? '' }}" class="form-control required"
                id="carshp_fr_zip" placeholder="Moving From (zip)" name="carshp_fr_zip" required>
        </div>
        <style>
            .citystate {
                text-indent: 50px;
                margin-bottom: 0.1em;
                font-size: .8em;
                height: 4px;
            }

            input[type="date"]::-webkit-calendar-picker-indicator {
                background: transparent;
                bottom: 0;
                color: transparent;
                cursor: pointer;
                height: auto;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                width: auto;
            }
        </style>
        <p id="citystatefrom3" style="text-transform: capitalize;" class="citystate"></p>

    </div>

    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="fa-sharp fa-solid fa-location-plus"></i></span>
            <input type="number" value="{{ $form->carshp_to_zip ?? '' }}" class="form-control required"
                id="carshp_to_zip" placeholder="Moving To (zip)" name="carshp_to_zip" required>
        </div>
        <p id="citystateto3" style="text-transform: capitalize;" class="citystate"></p>

    </div>

    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="icon-calendar3"></i></span>
            <input type="date" value="{{ $form->carshp_dt ?? '' }}" class="form-control calendar required"
                placeholder="Moving Date" id="carshp_dt" name="carshp_dt" required>

        </div>
    </div>
    <h5>Car Information</h5>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#carshp_fr_zip').click(function() {
                $(this).select();
            });
        });
    </script>
    <script>
        var path = "{{ route('autocomplete') }}";
        $("#carshp_fr_zip").autocomplete({
            autoFocus: true
        }, {
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        carshp_fr_zip: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {

                $('#carshp_fr_zip').val(ui.item.label);
                // document.getElementById('#citystatefrom2').value = ''";
                $('#citystatefrom3').empty().append(ui.item.city.toLowerCase() + ", " + ui.item.state_code +
                    ", " + ui
                    .item.label);
                $('#cityfrom3').val(ui.item.city + ", " + ui.item.state_code);
                console.log(ui.item);;
                return false;
            },
            change: function(event, ui) {
                if (ui.item === null || !ui.item)
                    $(this).val(''); /* clear the value */
            }
        });
    </script>
    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="fa-sharp fa-solid fa-cars"></i></span>
            <select class="required form-select" tabindex=4 name="carshp_vhmk" id="carshp_vhmk" required>
                <option value="" disabled selected>-- Vehicle Make --</option>
                @foreach ($carsUnique as $carUnique)
                    <option value="{{ ucfirst($carUnique->make) }}">{{ ucfirst($carUnique->make) }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <script type="text/javascript">
        var path2 = "{{ route('autocompletemovingto') }}";

        $("#carshp_to_zip").autocomplete({
            autoFocus: true
        }, {
            source: function(request, response) {
                $.ajax({
                    url: path2,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        carshp_to_zip: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('#carshp_to_zip').val(ui.item.label);
                $('#citystateto3').empty().append(ui.item.city.toLowerCase() + ", " + ui.item.state_code +
                    ", " + ui.item
                    .label);
                $('#cityto3').val(ui.item.city + ", " + ui.item.state_code);
                console.log(ui.item);
                return false;
            },
            change: function(event, ui) {
                if (ui.item === null || !ui.item)
                    $(this).val(''); /* clear the value */
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#carshp_vhmk').on('change', function() {
                var makeCar = this.value;
                $("#carshp_vhmdl").html('');
                $.ajax({
                    url: "{{ url('api/fetch-models') }}",
                    type: "POST",
                    data: {
                        make: makeCar,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#carshp_vhmdl').html('<option value="">Select Model</option>');
                        $('#carshp_vhyr').html('<option value="">Select Year</option>');
                        // alert(result);
                        $.each(result, function(key, value) {
                            $("#carshp_vhmdl").append('<option value=' + value.model +
                                '>' + value.model + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="icon-car"></i></span>
            <select class="required form-select" id="carshp_vhmdl" tabindex=5 name="carshp_vhmdl" required>
                <option value="" disabled selected>-- Vehicle Model --</option>
            </select>
        </div>
    </div>

    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="icon-calendar-alt"></i></span>
            <select class="required form-select" " tabindex=6 name="carshp_vhyr" id="carshp_vhyr" required>
                                <option value="" disabled selected>-- Vehicle Year --</option>

            </select>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#carshp_vhmdl').on('change', function() {
                var modelCar = this.value;
                $("#carshp_vhyr").html('');
                $.ajax({
                    url: "{{ url('api/fetch-years') }}",
                    type: "GET",
                    data: {
                        get_param: 'year'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#carshp_vhyr').html('<option value="">Select Year</option>');
                        // alert(result);
                        $.each(result, function(key, value) {
                            $("#carshp_vhyr").append('<option value=' + value.year +
                                '>' + value.year + '</option>');
                        });
                    }
                });
            });
        });
    </script>

        <input type="hidden" name="cityto3" id="cityto3" value="{{ old('cityto3') }}">
        <input type="hidden" name="cityfrom3" id="cityfrom3" value="{{ old('cityfrom3') }}">

    {{-- <div class="col-12 d-none">
        <input type="text" id="others-moving-form-botcheck" name="others-moving-form-botcheck" value="" />
    </div> --}}
    <div class="col-12">
        <button type="submit" name="others-moving-form-submit"
            class="btn btn-color text-blue fw-medium w-100 py-2 mt-2" tabindex=7><i>Next >></i></button>
    </div>

</form>
