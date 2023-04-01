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
                <div class="col-lg-3">

                    <!-- Members online -->
                    <a href="{{  route('admin.posts.index') }}">
                        <div class="panel bg-teal-400">
                            <div class="panel-body">


                                <h3 class="no-margin"><i class="icon-magazine"></i> {{ $posts }}</h3>
                                Bài viết
                            </div>

                            <div class="container-fluid">
                                <div id="members-online"></div>
                            </div>
                        </div>
                    </a>
                    <!-- /members online -->

                </div>

                <div class="col-lg-3">

                    <a href="{{  route('admin.recruitments.index') }}">
                        <div class="panel bg-pink-400">
                            <div class="panel-body">


                                <h3 class="no-margin"><i class="icon-newspaper2"></i> {{ $recruitments }}</h3>
                                Bài tuyển dụng

                            </div>

                            <div id="server-load"></div>
                        </div>
                    </a>
                    <!-- Current server load -->

                    <!-- /current server load -->

                </div>

                <div class="col-lg-3">

                    <!-- Today's revenue -->
                    <a href="{{  route('admin.categories.index') }}">
                        <div class="panel bg-blue-400">
                            <div class="panel-body">


                                <h3 class="no-margin"><i class="icon-stack2"></i> {{ $categories }}</h3>
                                Danh mục
                            </div>

                            <div id="today-revenue"></div>
                        </div>
                    </a>
                    <!-- /today's revenue -->

                </div>

                <div class="col-lg-3">

                    <!-- Today's revenue -->
                    <div class="panel bg-orange-400">
                        <div class="panel-body">

                            <h3 class="no-margin"><i class=" icon-users"></i> 100</h3>
                            Lượt truy cập
                        </div>

                        <div id="today-revenue"></div>
                    </div>
                    <!-- /today's revenue -->

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
