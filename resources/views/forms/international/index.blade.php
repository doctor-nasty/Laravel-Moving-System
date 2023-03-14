<form class="row home-moving-form position-relative mb-0" action="{{ route('internationalForm.create.step.one.post') }}"
    method="POST">
    @csrf

    <div style="margin-bottom: 10px; color:red;">

        @if ($errors->has('intl_fr_zip'))
            <li class="mb4">{{ $errors->first('intl_fr_zip') }}</li>
        @endif

        @if ($errors->has('intl_to_cntr'))
            <li class="mb4">{{ $errors->first('intl_to_cntr') }}</li>
        @endif

        @if ($errors->has('intl_to_cont'))
            <li class="mb4">{{ $errors->first('intl_to_cont') }}</li>
        @endif

        @if ($errors->has('intl_dt'))
            <li class="mb4">{{ $errors->first('intl_dt') }}</li>
        @endif

        @if ($errors->has('intl_sz_id'))
            <li class="mb4">{{ $errors->first('intl_sz_id') }}</li>
        @endif
    </div>


    <div class="form-process">
        <div class="css3-spinner">
            <div class="css3-spinner-scaler"></div>
        </div>
    </div>
    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="fa-sharp fa-solid fa-location-minus"></i></span>
            <input type="number" value="{{ $form->intl_fr_zip ?? '' }}" id="intl_fr_zip"
                class="form-control required" placeholder="Moving From (zip)" name="intl_fr_zip" required>
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
        <p id="citystatefrom2" style="text-transform: capitalize;" class="citystate"></p>
  </div>
    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="icon-calendar3"></i></span>
            <input type="date" class="form-control calendar required" id="intl_dt"
                value="{{ $form->intl_dt ?? '' }}" placeholder="Moving Date" name="intl_dt" required>
        </div>
    </div>
  <h5>Moving To:</h5>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
$('#intl_fr_zip').click(function(){
  $(this).select();
});
});
</script>
    <script>
          var path = "{{ route('autocomplete') }}";
$("#intl_fr_zip").autocomplete({autoFocus: true},{
    source: function(request, response) {
        $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
                intl_fr_zip: request.term
            },
            success: function(data) {
                response(data);
            }
        });
    },
    select: function(event, ui) {

        $('#intl_fr_zip').val(ui.item.label);
        // document.getElementById('#citystatefrom2').value = ''";
        $('#citystatefrom2').empty().append(ui.item.city.toLowerCase() + ", " + ui.item.state_code + ", " + ui
            .item.label);
        $('#cityfrom2').val(ui.item.city + ", " + ui.item.state_code);
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
            <span class="input-group-text bg-transparent"><i class="icon-globe"></i></span>
            <!-- <input type="text" value="{{ $form->movingtocontinent ?? '' }}" id="movingToContinent" class="form-control required" placeholder="Destination Continent" name="movingtocontinent"> -->
            <select class="required form-select" name="intl_to_cont" id="intl_to_cont" required>
                <option value="" disabled selected>-- Continent --</option>
                @foreach ($continents as $continent)
                    <option value="{{ ucfirst($continent->continent) }}">{{ ucfirst($continent->continent) }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#intl_to_cont').on('change', function() {
                var continentTo = this.value;
                $("#intl_to_cntr").html('');
                $.ajax({
                    url: "{{ url('api/fetch-countries') }}",
                    type: "POST",
                    data: {
                        continent: continentTo,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#intl_to_cntr').html('<option value="">Select Country</option>');
                        // alert(result);
                        $.each(result, function(key, value) {
                            $("#intl_to_cntr").append('<option value=' + value
                                .country + '>' + value.country + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="icon-flag2"></i></span>
            <select class="required form-select" name="intl_to_cntr" id="intl_to_cntr" required>
                 <option value="" disabled selected>-- Country --</option>
                {{-- <option selected>-- Country --</option>
                @foreach ($countries as $country)
                    <option value="{{ ucfirst($country->country) }}">{{ ucfirst($country->country) }}</option>
                @endforeach --}}
            </select>
        </div>
    </div>
    <div class="col-sm-6 form-group">
        <div class="input-group tab">
            <span class="input-group-text bg-transparent"><i class="fa-duotone fa-truck-ramp-couch"></i></span>
            <select class="required form-select" value="{{ $form->intl_sz_id ?? '' }}" name="intl_sz_id" id="intl_sz_id" required>
                <option value="" disabled selected>-- Move Size --</option>
                <option value="0">Studio</option>
                <option value="1">1 Bedroom</option>
                <option value="2">2 Bedroom</option>
                <option value="3">3 Bedroom</option>
                <option value="4">4 Bedroom</option>
                <option value="5">5+ Bedroom</option>
            </select>
        </div>
    </div>

    <input type="hidden" name="cityfrom" id="cityfrom2" value="{{ old('cityfrom') }}">


    <div class="col-12">
        <button type="submit" class="btn btn-color text-blue fw-medium w-100 py-2 mt-2">Next</button>
    </div>
</form>
