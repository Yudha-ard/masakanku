@extends('back.admin.layouts.app')

@section('title', 'User')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar  pt-5 pt-lg-10 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack flex-wrap ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            {{ env('APP_NAME') }} - User
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">User Edit</h3>
                        </div>
                    </div>
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
                            <form method="POST" action="{{ route('admin.user.update', $users->id) }}" enctype="multipart/form-data" id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>   
                                    <div class="col-lg-8">
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                            @if(is_null($users->img_profile))
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ URL::asset('storage/images/user/default.png')}} )"></div>
                                            @else
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ URL::asset('storage/images/user/'.$users->img_profile)}} )"></div>
                                            @endif
                                            <input type="file" name="img_profile" id="img_profile" class="form-control-file form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Name</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" id="name" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old('name', $users->name) }}" require>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">E-Mail</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="email" id="email" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old('email', $users->email) }}" require>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Password</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="password" id="password" name="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="" require>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Password</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <select name="is_admin" id="is_admin" class="form-control" required>
                                                    <option value="1" {{ old('is_admin', $users->is_admin) == 1 ? 'selected' : '' }}>Admin</option>
                                                    <option value="0" {{ old('is_admin', $users->is_admin) == 0 ? 'selected' : '' }}>User</option>
                                                </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                            </div>

                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
