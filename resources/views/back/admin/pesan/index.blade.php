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
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-xxl">

            <div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Pesan Masuk</span>
        </h3>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="min-w-50px">No</th>
                        <th class="min-w-125px">Nama</th>
                        <th class="min-w-125px">E-Mail</th>
                        <th class="min-w-125px">Judul</th>
                        <th class="ps-4 min-w-250px rounded-start">Pesan</th>
                        <th class="min-w-100px">Tanggal</th>
                        <th class="min-w-200px text-end rounded-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $i =1 @endphp
                @foreach ($pesans as $pesan)
                    <tr>
                        <td>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $i++ }}</span>    
                        </td>

                        <td>
                            <span class="badge badge-light-info fs-7 fw-bold">{{ $pesan->name }}</span>
                        </td>

                        <td>
                            <span class="badge badge-light-success fs-7 fw-bold">{{ $pesan->email }}</span>
                        </td>

                        <td>
                            <span class="badge badge-light-warning fs-7 fw-bold">{{ $pesan->judul }}</span>
                        </td>

                        <td>
                            <span class="text-muted fw-semibold text-muted d-block fs-7">{{ substr($pesan->pesan, 0, 20) }}</span>
                        </td>

                        <td>
                            <span class="badge badge-light-primary fs-7 fw-bold">{{ $pesan->created_at }}</span>
                        </td>

                        <td class="text-end">
                            <a href="{{ route('admin.pesan.show', $pesan->id) }}" class="btn btn-primary btn-sm" id="kt_account_profile_details_submit">View</a>
                            <form method="POST" action="{{ route('admin.pesan.destroy', $pesan->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin akan manghapus pesan?')">Delete</button>
                            </form>
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