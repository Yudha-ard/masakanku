@extends('back.admin.layouts.app')

@section('title', 'Message')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar  pt-5 pt-lg-10 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack flex-wrap ">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            {{ env('APP_NAME') }} - Pesan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
            <div id="kt_app_content_container" class="app-container  container-xxl ">
    <div class="row g-5 g-xl-8">
        <div class="col-xl-6">
            <div class="card mb-5 mb-xl-8">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center mb-5">
                        <div class="d-flex align-items-center flex-grow-1">
                            <div class="d-flex flex-column">
                                <span class="badge badge-light-bold fs-5 fw-bold">{{ $pesans->judul }}</span>
                                </br>
                                <span class="badge badge-light-success fs-7 fw-bold">Nama   :{{ $pesans->name }}</span>
                                <span class="badge badge-light-warning fs-7 fw-bold">E-Mail : {{ $pesans->email }}</span>
                            </div>
                        </div>
                        <div class="my-0">
                            <span class="badge badge-light-success fs-7 fw-bold">Date : {{ $pesans->created_at }}</span>
                        </div>
                    </div>
                    <div class="mb-5">
                        <p class="text-gray-800 fw-normal mb-5">
                            {{ $pesans->pesan }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
@stop