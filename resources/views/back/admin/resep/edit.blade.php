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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form method="POST" action="{{ route('admin.resep.update', $reseps->id) }}" enctype="multipart/form-data" id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Gambar</label>   
                                    <div class="col-lg-8">
                                        @if ($reseps->img_resep)
                                            <img src="{{ asset('storage/images/resep/' . $reseps->img_resep) }}" alt="Resep Image" width="150">
                                        @endif
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                            <input type="file" name="img_resep" id="img_resep" class="form-control-file form-control form-control-lg form-control-solid mb-3 mb-lg-0" accept="image/*" require>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Judul</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" id="judul" name="judul" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old('judul', $reseps->judul) }}" require>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Deskripsi</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <textarea id="editor" name="deskripsi" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" rows="5" require>{{ old('deskripsi', $reseps->deskripsi) }}</textarea>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Kategori</label>
                                    
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <select name="kategori_id" id="kategori_id" class="form-control" required>
                                                @foreach($kategoris as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $reseps->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                                        {{ $kategori->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>  
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



