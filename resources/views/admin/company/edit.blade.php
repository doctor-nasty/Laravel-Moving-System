@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Company</h1>
            <a href="{{ route('company.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
        </div>

        {{-- Alert Messages --}}
        @include('admin.common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Company</h6>
            </div>
            <form method="POST" action="{{ route('company.update', ['company' => $company->id]) }}">
                @csrf
                @method('PUT')
                {{--
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach --}}

                <div class="card-body">
                    <div class="form-group row">

                        {{-- First Name --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Name</label>
                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                id="name" placeholder="Company Name" name="name"
                                value="{{ old('name') ? old('name') : $company->name }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Last Name --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Website</label>
                            <input type="text"
                                class="form-control form-control-user @error('website') is-invalid @enderror" id="website"
                                placeholder="Website" name="website"
                                value="{{ old('website') ? old('website') : $company->website }}">

                            @error('website')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Address</label>
                            <input type="address"
                                class="form-control form-control-user @error('address') is-invalid @enderror" id="address"
                                placeholder="Address" name="address"
                                value="{{ old('address') ? old('address') : $company->address }}">

                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>City</label>
                            <input type="text" class="form-control form-control-user @error('city') is-invalid @enderror"
                                id="city" placeholder="City" name="city"
                                value="{{ old('city') ? old('city') : $company->city }}">

                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>State</label>
                            <input type="text"
                                class="form-control form-control-user @error('state') is-invalid @enderror" id="state"
                                placeholder="State" name="state"
                                value="{{ old('state') ? old('state') : $company->state }}">

                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Zip</label>
                            <input type="text" class="form-control form-control-user @error('zip') is-invalid @enderror"
                                id="zip" placeholder="Zip" name="zip"
                                value="{{ old('zip') ? old('zip') : $company->zip }}">

                            @error('zip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Phone Number</label>
                            <input type="text"
                                class="form-control form-control-user @error('phonenumber') is-invalid @enderror"
                                id="phonenumber" placeholder="Phone Number" name="phonenumber"
                                value="{{ old('phonenumber') ? old('phonenumber') : $company->phonenumber }}">

                            @error('phonenumber')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Description</label>
                            <input type="text"
                                class="form-control form-control-user @error('description') is-invalid @enderror"
                                id="description" placeholder="Description" name="description"
                                value="{{ old('description') ? old('description') : $company->description }}">

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>US DOT</label>
                            <input type="text"
                                class="form-control form-control-user @error('usdot') is-invalid @enderror" id="usdot"
                                placeholder="US DOT" name="usdot"
                                value="{{ old('usdot') ? old('usdot') : $company->usdot }}">

                            @error('usdot')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>MC NO</label>
                            <input type="text" class="form-control form-control-user @error('mcno') is-invalid @enderror"
                                id="mcno" placeholder="MC NO" name="mcno"
                                value="{{ old('mcno') ? old('mcno') : $company->mcno }}">

                            @error('mcno')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;"></span>Intrastate</label>
                            <input type="text"
                                class="form-control form-control-user @error('intrastate') is-invalid @enderror"
                                id="intrastate" placeholder="Intrastate" name="intrastate"
                                value="{{ old('intrastate') ? old('intrastate') : $company->intrastate }}">

                            @error('intrastate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;"></span>Fleetsize</label>
                            <input type="text"
                                class="form-control form-control-user @error('fleetsize') is-invalid @enderror"
                                id="fleetsize" placeholder="Fleetsize" name="fleetsize"
                                value="{{ old('fleetsize') ? old('fleetsize') : $company->fleetsize }}">

                            @error('intrastate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="col-lg-12 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Status</label>
                            <select class="form-control form-control-user @error('status') is-invalid @enderror"
                                name="status">
                                <option selected disabled>Select Status</option>
                                <option value="1" {{ $company->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $company->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                        <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('company.index') }}">Cancel</a>
                    </div>
            </form>
        </div>
        <div id="contact" class="container">
            <h1 class="text-center" style="margin-top: 100px">Image Upload</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{$message}}</strong>
                </div>

                <img src="{{ asset('images/companies/'.Session::get('logo')) }}" />
            @endif
            <img src="{{ asset('images/companies/'.$company->logo) }}" />

            @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
            <form method="POST" action="{{ route('company.imagestore') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" name="logo" />

                <button type="submit" class="btn btn-sm">Upload</button>
            </form>

        </div>

                {{-- <script>
                    $('select[multiple]').multiselect({
                        columns: 2,
                        placeholder: 'Select options',
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


    </div>

@endsection
