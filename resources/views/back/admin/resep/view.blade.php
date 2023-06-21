@extends('back.admin.layouts.app')

@section('title', 'Resep')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar  pt-5 pt-lg-10 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack flex-wrap ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            {{ env('APP_NAME') }} - Resep
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div id="kt_account_settings_profile_details" class="collapse show">
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Gambar</label>   
                                    <div class="col-lg-8">
                                        @if(is_null($reseps->img_resep))
                                            <img src="{{ URL::asset('storage/images/resep/resep.png') }}"  alt="Resep Image" width="150"/>
                                        @else
                                            <img src="{{ URL::asset('storage/images/resep/'.$reseps->img_resep) }}"  alt="Resep Image" width="150"/>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Judul</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                {{ $reseps->judul }}
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Deskripsi</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {{ $reseps->deskripsi }}
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Kategori</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                {{ $reseps->kategori->nama }}
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop



