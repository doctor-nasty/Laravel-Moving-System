
<form class="row others-moving-form position-relative mb-0" action="{{ route('storageForm.create.step.one.post') }}"
    method="POST">
    @csrf
    <div style="margin-bottom: 10px; color:red;">

        @if ($errors->has('strg_zip'))
            <li class="mb4">{{ $errors->first('strg_zip') }}</li>
        @endif

        @if ($errors->has('strg_sz_id'))
            <li class="mb4">{{ $errors->first('strg_sz_id') }}</li>
        @endif

        @if ($errors->has('strg_dt'))
            <li class="mb4">{{ $errors->first('strg_dt') }}</li>
        @endif
    </div>
    <div class="col-sm-6 form-group">
        <div class="input-group">
            <span class="input-group-text bg-transparent"><i class="fa-sharp fa-solid fa-location-minus"></i></span>
            <input type="number" value="{{ $form->strg_zip ?? '' }}" class="form-control required"
                id="strg_zip" placeholder="Storage (zip)" name="strg_zip" required>
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
        <p id="citystatefrom4" style="text-transform: capitalize;" class="citystate"></p>

    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function(){
  $('#strg_zip').click(function(){
    $(this).select();
  });
  });
  </script>
      <script>
            var path = "{{ route('autocomplete') }}";
  $("#strg_zip").autocomplete({autoFocus: true},{
      source: function(request, response) {
          $.ajax({
              url: path,
              type: 'GET',
              dataType: "json",
              data: {
                strg_zip: request.term
              },
              success: function(data) {
                  response(data);
              }
          });
      },
      select: function(event, ui) {

          $('#strg_zip').val(ui.item.label);
          // document.getElementById('#citystatefrom2').value = ''";
          $('#citystatefrom4').empty().append(ui.item.city.toLowerCase() + ", " + ui.item.state_code + ", " + ui
              .item.label);
          $('#cityfrom4').val(ui.item.city + ", " + ui.item.state_code);
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
        <div class="input-group">
            <span class="input-group-text bg-transparent"><i class="icon-calendar3"></i></span>
            <input type="date" value="{{ $form->strg_dt ?? '' }}" class="form-control calendar required"
                placeholder="Moving Date" id="strg_dt" name="strg_dt" required>

        </div>
    </div>

    <div class="col-sm-6 form-group">
        <div class="input-group">
            <span class="input-group-text bg-transparent"><i class="fa-duotone fa-truck-ramp-couch"></i></span>
            <select class="required form-select" value="{{ $form->strg_sz_id ?? '' }}" name="strg_sz_id" id="strg_sz_id" required>
                <option value="" disabled selected>-- Storage Size --</option>
                {{-- <option value="Studio">Studio</option>
                <option value="1 Bedroom">1 Bedroom</option>
                <option value="1 Bedroom">2 Bedroom</option>
                <option value="1 Bedroom">3 Bedroom</option>
                <option value="1 Bedroom">4 Bedroom</option>
                <option value="1 Bedroom">5+ Bedroom</option> --}}
                <option value="1">Small 5' x 5'</option>
                <option value="2">Small 5' x 10'</option>
                <option value="3">Medium 7.5' x 10'</option>
                <option value="4">Medium 10' X 10'</option>
                <option value="5">Large 10' x 15'</option>
                <option value="6">Other</option>
            </select>
        </div>
    </div>


    <input type="hidden" name="cityfrom" id="cityfrom4" value="{{ old('cityfrom') }}">


    <div class="col-12">
        <button type="submit" class="btn btn-color text-blue fw-medium w-100 py-2 mt-2">Next</button>
    </div>

</form>
