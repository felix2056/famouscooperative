@extends('layouts.app')

@section('title')
    Company Settings
@endsection

@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Company Settings</h3>
                    </div>
                </div>
            </div>

            <form method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Company Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="company_name" value="{{ $settings->company_name ?? NULL }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input class="form-control" name="company_owner" value="{{ $settings->company_owner ?? NULL }}" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="company_address" value="{{ $settings->company_address ?? NULL }}" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control select" name="country">
                                <option>Select Country</option>
                                <option value="Nigeria" {{ $settings->country == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                <option value="Ghana" {{ $settings->country == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                <option value="Kenya" {{ $settings->country == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                <option value="South Africa" {{ $settings->country == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                <option value="Tanzania" {{ $settings->country == 'Tanzania' ? 'selected' : '' }}>Tanzania</option>
                                <option value="Uganda" {{ $settings->country == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                                <option value="United Kingdom" {{ $settings->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="United States" {{ $settings->country == 'United States' ? 'selected' : '' }}>United States</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>City</label>
                            <input class="form-control" name="city" value="{{ $settings->city  ?? NULL }}" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>State/Province</label>
                            <select class="form-control select" name="state">
                                <option value="Niger" selected>Niger</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Abuja">Abuja</option>
                                <option value="Delta">Delta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input class="form-control" name="zip_code" value="{{ $settings->zip_code ?? NULL }}" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="company_email" value="{{ $settings->company_email ?? NULL }}" type="email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" name="company_phone" value="{{ $settings->company_phone ?? NULL }}" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Website Url</label>
                            <input class="form-control" name="company_website" value="{{ $settings->company_website ?? NULL }}" type="url">
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
