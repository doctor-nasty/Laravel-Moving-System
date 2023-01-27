@extends('layouts.app')

@section('title', 'Add Users')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Users</h1>
        <a href="{{route('company.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
    @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
        </div>
        <form method="POST" action="{{route('company.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Name</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('name') is-invalid @enderror"
                            id="Name"
                            placeholder="Company Name"
                            name="name"
                            value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Website</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('website') is-invalid @enderror"
                            id="Website"
                            placeholder="Website"
                            name="website"
                            value="{{ old('website') }}">

                        @error('website')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

{{-- Email --}}
<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
    <span style="color:red;">*</span>Address</label>
    <input
        type="address"
        class="form-control form-control-user @error('address') is-invalid @enderror"
        id="Address"
        placeholder="Address"
        name="address"
        value="{{ old('address') }}">

    @error('address')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- Email --}}
<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
    <span style="color:red;">*</span>Logo</label>
    <input
        type="logo"
        class="form-control form-control-user @error('logo') is-invalid @enderror"
        id="Logo"
        placeholder="Logo"
        name="logo"
        value="{{ old('logo') }}">

    @error('logo')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- Email --}}
<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
    <span style="color:red;">*</span>Email</label>
    <input
        type="address"
        class="form-control form-control-user @error('email') is-invalid @enderror"
        id="Email"
        placeholder="Email"
        name="email"
        value="{{ old('email') }}">

    @error('email')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>City</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('city') is-invalid @enderror"
                            id="City"
                            placeholder="City"
                            name="city"
                            value="{{ old('city') }}">

                        @error('city')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

{{-- Mobile Number --}}
<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
    <span style="color:red;">*</span>State</label>
    <input
        type="text"
        class="form-control form-control-user @error('state') is-invalid @enderror"
        id="State"
        placeholder="State"
        name="state"
        value="{{ old('state') }}">

    @error('state')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

{{-- Mobile Number --}}
<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
    <span style="color:red;">*</span>Fleetsize</label>
    <input
        type="text"
        class="form-control form-control-user @error('state') is-invalid @enderror"
        id="Fleetsize"
        placeholder="Fleetsize"
        name="fleetsize"
        value="{{ old('fleetsize') }}">

    @error('fleetsize')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Zip</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('zip') is-invalid @enderror"
                            id="Zip"
                            placeholder="Zip"
                            name="zip"
                            value="{{ old('zip') }}">

                        @error('zip')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Phone Number</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('phonenumber') is-invalid @enderror"
                            id="PhoneNumber"
                            placeholder="Phone Number"
                            name="phonenumber"
                            value="{{ old('phonenumber') }}">

                        @error('phonenumber')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Description</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('description') is-invalid @enderror"
                            id="Description"
                            placeholder="Description"
                            name="description"
                            value="{{ old('description') }}">

                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>US DOT</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('usdot') is-invalid @enderror"
                            id="USDOT"
                            placeholder="US DOT"
                            name="usdot"
                            value="{{ old('usdot') }}">

                        @error('usdot')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>MC NO</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('mcno') is-invalid @enderror"
                            id="MCNO"
                            placeholder="MC NO"
                            name="mcno"
                            value="{{ old('mcno') }}">

                        @error('mcno')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Intrastate</label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('intrastate') is-invalid @enderror"
                            id="Intrastate"
                            placeholder="Intrastate"
                            name="intrastate"
                            value="{{ old('intrastate') }}">

                        @error('intrastate')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- Status --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Status</label>
                        <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('company.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection
