@extends('back.admin.layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar  pt-5 pt-lg-10 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack flex-wrap ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            {{ env('APP_NAME') }} - Kategori
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin.kategori.store') }}" enctype="multipart/form-data" id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            @csrf
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Gambar</label>   
                                    <div class="col-lg-8">
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                            <input type="file" name="img_kategori" id="img_kategori" class="form-control-file form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" require>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Nama</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" id="nama" name="nama" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old('nama') }}" require>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Deskripsi</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <textarea id="deskripsi" name="deskripsi" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" rows="5" require>{{ old('deskripsi') }}</textarea>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>                                    

                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
                            </div>

                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


