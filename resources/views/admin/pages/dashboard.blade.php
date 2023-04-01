@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><span class="text-semibold">Bảng điều khiển</span></h4>
                </div>

            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><i class="icon-home2 position-left"></i> Bảng điều khiển</li>
                </ul>


            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Dashboard content -->
            <div class="row">
                <div class="col-lg-8">


                    <!-- /latest posts -->

                </div>

            </div>
            <!-- /dashboard content -->


            <!-- Footer -->
            @include('admin.includes.footer')
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
@endsection
