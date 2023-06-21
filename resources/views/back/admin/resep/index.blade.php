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
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="{{ route('admin.resep.create') }}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
                            Add Resep
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-xxl">

            <div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Resep List</span>
        </h3>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="min-w-50px">No</th>
                        <th class="min-w-125px">Judul</th>
                        <th class="min-w-125px">Gambar</th>
                        <th class="min-w-125px">Deskripsi</th>
                        <th class="min-w-125px">Kategori</th>
                        <th class="min-w-200px text-end rounded-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $i =1 @endphp
                @foreach ($reseps as $resep)
                    <tr>
                        <td>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $i++ }}</span>    
                        </td>

                        <td>
                            <span class="badge badge-light-info fs-7 fw-bold">{{ $resep->judul }}</span>
                        </td>
                        <td>
                        <div class="symbol symbol-50px me-5">
                            @if(is_null($resep->img_resep))
                                <img src="{{ URL::asset('storage/images/resep/resep.png') }}" />
                            @else
                                <img src="{{ URL::asset('storage/images/resep/'.$resep->img_resep) }}" />
                            @endif
                        </div>
                        </td>
                        <td>
                            <span class="badge badge-light-success fs-7 fw-bold">{!!  substr($resep->deskripsi, 0, 50,) !!}</span>
                        </td>

                        <td>
                            <span class="badge badge-light-warning fs-7 fw-bold">{{ $resep->kategori->nama }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.resep.edit', $resep->id) }}" class="btn btn-warning btn-sm" id="kt_account_profile_details_submit">Edit</a>
                            <form method="POST" action="{{ route('admin.resep.destroy', $resep->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin akan manghapus Resep?')">Delete</button>
                            </form>
                            <a href="{{ route('admin.resep.show', $resep->id) }}" class="btn btn-primary btn-sm" id="kt_account_profile_details_submit">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
                
            </div>
        </div>
    </div>
</div>
@stop