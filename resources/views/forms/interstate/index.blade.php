
  <form class="row others-moving-form position-relative mb-0" action="{{ route('interstateForm.create.step.one.post') }}"
      method="POST">
      @csrf

      <!-- <div class="card-header">Step 1: Basic Info</div> -->

      <div style="margin-bottom: 10px; color:red;">

          @if ($errors->has('inst_fr_zip'))
              <li class="mb4">{{ $errors->first('inst_fr_zip') }}</li>
          @endif

          @if ($errors->has('inst_to_zip'))
              <li class="mb4">{{ $errors->first('inst_to_zip') }}</li>
          @endif

          @if ($errors->has('inst_dt'))
              <li class="mb4">{{ $errors->first('inst_dt') }}</li>
          @endif

          @if ($errors->has('inst_sz_id'))
              <li class="mb4">{{ $errors->first('inst_sz_id') }}</li>
          @endif
      </div>

      <div class="col-sm-6 form-group">
          <div class="input-group">
              <span class="input-group-text bg-transparent"><i class="fa-sharp fa-solid fa-location-minus"></i></span>
              <input type="number" value="{{ old('inst_fr_zip') }}" class="typeahead form-control mb4"
                  id="inst_fr_zip" placeholder="Moving From (zip)" name="inst_fr_zip" required>

          </div>
          <p id="citystatefrom" style="text-transform: capitalize;" class="citystate"></p>

      </div>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <script>
$(document).ready(function(){
  $('#inst_fr_zip').click(function(){
    $(this).select();
  });
});
</script>
      <script type="text/javascript">
          var path = "{{ route('autocomplete') }}";

          $("#inst_fr_zip").autocomplete({autoFocus: true},{
              source: function(request, response) {
                  $.ajax({
                      url: path,
                      type: 'GET',
                      dataType: "json",
                      data: {
                          inst_fr_zip: request.term
                      },
                      success: function(data) {
                          response(data);
                      }
                  });
              },
              select: function(event, ui) {

                  $('#inst_fr_zip').val(ui.item.label);
                  $('#citystatefrom').empty().append(ui.item.city.toLowerCase() + ", " + ui.item.state_code + ", " + ui
                      .item.label);
                  $('#cityfrom1').val(ui.item.city + ", " + ui.item.state_code);
                  console.log(ui.item);
                  return false;
              },
              change: function(event, ui) {
                  if (ui.item === null || !ui.item)
                      $(this).val('');
              }
          });
      </script>
      <div class="col-sm-6 form-group">
          <div class="input-group">
              <span class="input-group-text bg-transparent"><i class="fa-sharp fa-solid fa-location-plus"></i></span>
              <input type="number" value="{{ old('inst_to_zip') }}" class="typeahead form-control mb4 required"
                  id="inst_to_zip" placeholder="Moving To (zip)" name="inst_to_zip" required>
          </div>
          <p id="citystateto" style="text-transform: capitalize;" class="citystate"></p>
      </div>
      <script type="text/javascript">
          var path2 = "{{ route('autocompletemovingto') }}";

          $("#inst_to_zip").autocomplete({autoFocus: true},{
              source: function(request, response) {
                  $.ajax({
                      url: path2,
                      type: 'GET',
                      dataType: "json",
                      data: {
                          inst_to_zip: request.term
                      },
                      success: function(data) {
                          response(data);
                      }
                  });
              },
              select: function(event, ui) {
                  $('#inst_to_zip').val(ui.item.label);
                  $('#citystateto').empty().append(ui.item.city.toLowerCase() + ", " + ui.item.state_code + ", " + ui.item
                      .label);
                  $('#cityto1').val(ui.item.city + ", " + ui.item.state_code);
                  console.log(ui.item);
                  return false;
              },
              change: function(event, ui) {
                  if (ui.item === null || !ui.item)
                      $(this).val('');
              }
          });
      </script>
      <div class="col-sm-6 form-group">
          <div class="input-group">
              <span class="input-group-text bg-transparent"><a onclick="datepicker()"><i class="icon-calendar3"></i></a></span>
              <input type="date" value="{{ old('inst_dt') }}" class="form-control mb4 calendar required"
                  placeholder="Moving Date" id="inst_dt" name="inst_dt" required>

          </div>
      </div>
      <script>
function datepicker(){
    document.getElementById('inst_dt').select();
};
      </script>

      <div class="col-sm-6 form-group">
          <div class="input-group">
              <span class="input-group-text bg-transparent"><i class="fa-duotone fa-truck-ramp-couch"></i></span>
              <select class="required mb4 form-select" name="inst_sz_id" id="inst_sz_id" required>
                  <option value="" disabled selected>-- Move Size --</option>
                  @foreach($movesize as $mvsz)
                  <option value="{{ $mvsz->mvsz_id }}"{{ old('inst_sz_id') == $mvsz->mvsz_name ? 'selected' : '' }}>{{ $mvsz->mvsz_name }}</option>
                  @endforeach
                  {{-- <option value="2"{{ old('inst_sz_id') == '1 Bedroom' ? 'selected' : '' }}>1 Bedroom</option>
                  <option value="3"{{ old('inst_sz_id') == '2 Bedroom' ? 'selected' : '' }}>2 Bedroom</option>
                  <option value="4"{{ old('inst_sz_id') == '3 Bedroom' ? 'selected' : '' }}>3 Bedroom</option>
                  <option value="5"{{ old('inst_sz_id') == '4 Bedroom' ? 'selected' : '' }}>4 Bedroom</option>
                  <option value="6"{{ old('inst_sz_id') == '5+ Bedroom' ? 'selected' : '' }}>5+ Bedroom
                  </option> --}}
              </select>
          </div>
      </div>


      <input type="hidden" name="cityto" id="cityto1" value="{{ old('cityto') }}">
      <input type="hidden" name="cityfrom" id="cityfrom1" value="{{ old('cityfrom') }}">


      <div class="col-12">
          <button type="submit" class="btn btn-color text-blue fw-medium w-100 py-2 mt-2">Next</button>
      </div>

  </form>
