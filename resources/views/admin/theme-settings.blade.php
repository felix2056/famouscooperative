@extends('layouts.app')

@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Theme Settings</h3>
                    </div>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Website Name</label>
                    <div class="col-lg-9">
                        <input name="website_name" class="form-control" value="{{ $settings->website_name }}" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Light Logo</label>
                    <div class="col-lg-7">
                        <input name="website_logo" type="file" accept="image/*" onchange="previewLogo(event)" class="form-control">
                        <span class="form-text text-muted">Recommended image size is 40px x 40px</span>
                    </div>
                    <div class="col-lg-2">
                        <div class="img-thumbnail float-end">
                            <img id="logo" src="{{ $settings->website_logo ?? '/images/logo2.png' }}" alt="" width="40" height="40">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Favicon</label>
                    <div class="col-lg-7">
                        <input name="website_favicon" type="file" accept="image/*" onchange="previewFavicon(event)" class="form-control">
                        <span class="form-text text-muted">Recommended image size is 16px x 16px</span>
                    </div>
                    <div class="col-lg-2">
                        <div class="settings-image img-thumbnail float-end">
                            <img id="favicon" src="{{ $settings->website_favicon ?? '/images/logo2.png' }}" class="img-fluid" width="16" height="16" alt="">
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

@section('scripts')
    <script>
        var previewLogo = function(event) {
            var logo = document.getElementById('logo');
            logo.src = URL.createObjectURL(event.target.files[0]);
        };

        var previewFavicon = function(event) {
            var favicon = document.getElementById('favicon');
            favicon.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection