@extends('back.admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar  pt-5 pt-lg-10 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack flex-wrap ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            {{ env('APP_NAME') }} - Dashboard
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Dashboards</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-xxl">
            <div class="card-body d-flex flex-column">
    <div class="mt-5 mt-7">
        <div class="row g-0">

            <div class="col px-3 py-8 rounded-2 me-7 mb-7" style="background: #E9DDF9; border: 2px #8625FF solid">
                <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-stretch">
                    <div class="d-flex flex-column ml-2">
                        <div class="m-3 fw-bolder d-flex justify-content-center" style="font-size: 20px">{{ count($reseps) }}</div>
                        <div class="m-3">
                            <a class="fw-bold fs-6 white">Resep</a>
                        </div>
                    </div>
                </span>
            </div>

            <div class="col px-3 py-8 rounded-2 me-7 mb-7" style="background: #E9DDF9; border: 2px #8625FF solid">
                <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-stretch">
                    <div class="d-flex flex-column ml-2">
                        <div class="m-3 fw-bolder d-flex justify-content-center" style="font-size: 20px">{{ count($users) }}</div>
                        <div class="m-3">
                            <a class="fw-bold fs-6 white">User</a>
                        </div>
                    </div>
                </span>
            </div>

            <div class="col px-3 py-8 rounded-2 me-7 mb-7" style="background: #E9DDF9; border: 2px #8625FF solid">
                <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-stretch">
                    <div class="d-flex flex-column ml-2">
                        <div class="m-3 fw-bolder d-flex justify-content-center" style="font-size: 20px">{{ count($kategoris) }}</div>
                        <div class="m-3">
                            <a class="fw-bold fs-6 white">Kategori</a>
                        </div>
                    </div>
                </span>
            </div>

            <div class="col px-3 py-8 rounded-2 me-7 mb-7" style="background: #E9DDF9; border: 2px #8625FF solid">
                <span class="svg-icon svg-icon-3x d-block my-2 d-flex align-items-stretch">
                    <div class="d-flex flex-column ml-2">
                        <div class="m-3 fw-bolder d-flex justify-content-center" style="font-size: 20px">{{ count($pesans) }}</div>
                        <div class="m-3">
                            <a class="fw-bold fs-6 white">Pesan</a>
                        </div>
                    </div>
                </span>
            </div>
           
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
@stop