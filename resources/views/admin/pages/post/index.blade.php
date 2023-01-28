@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Bài viết</span> - Danh sách bài viết</h4>
            </div>

        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng điều khiển</a></li>
                <li class="active">Bài viết</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Dashboard content -->
        <!-- /dashboard content -->


        <!-- Footer -->
    @include('admin.includes.footer')
    <!-- /footer -->

    </div>
    <!-- /content area -->

</div>
@endsection
