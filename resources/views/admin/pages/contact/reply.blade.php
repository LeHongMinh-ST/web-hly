@extends('admin.layouts.master')

@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/contact/reply.js']['file'] }}"></script>
        @else
            @vite(['resources/js/contact/reply.js'])
            @endproduction
            @endsection

            @section('custom_css')
                <style>
                    .contact-content {
                        padding: 10px;
                        border-radius: 5px;
                        background-color: #F2F2F2;
                    }
                </style>
            @endsection

            @section('content')
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><a href="{{ route('admin.contact.index') }}" class="text-link"><i
                                                class="icon-arrow-left52 position-left"></i></a> <span
                                            class="text-semibold">Liên hệ</span> -
                                    Chi tết</h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng
                                        điều khiển</a>
                                </li>
                                <li><a href="{{route('admin.contact.index')}}">Liên hệ</a></li>
                                <li class="active">Chi tiết</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">

                        <!-- Dashboard content -->
                        <div class="row">
                            <form action="{{ route('admin.contact.reply', $contact->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-9">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-mailbox position-left"></i> Thông tin
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="contact-info">
                                                <div class="item-info mb-5">
                                                    <span>Thời gian: </span> <span
                                                            class="text-black">{{ \Carbon\Carbon::create($contact->created_at)->format('H:m d-m-Y')  }}</span>
                                                </div>
                                                <div class="item-info mb-5">
                                                    <span>Họ tên: </span> <span
                                                            class="text-black">{{ $contact->name  }}</span>
                                                </div>
                                                <div class="item-info mb-5">
                                                    <span>Email: </span> <span class="text-black"><a
                                                                href="mailto:{{ $contact->email  }}">{{ $contact->email  }}</a></span>
                                                </div>
                                                <div class="item-info mb-5">
                                                    <span>Số điện thoại: </span> <span class="text-black"><a
                                                                href="tel:{{ $contact->phone  }}">{{ $contact->phone  }}</a></span>
                                                </div>
                                                <div class="item-info mb-5">
                                                    <span>Chủ đề: </span> <span
                                                            class="text-black">{{ $contact->subject  }}</span>
                                                </div>
                                                <div class="item-info mb-5">
                                                    <span>Nội dung: </span>
                                                    <div class="contact-content">
                                                        {!! $contact->content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-mail-read position-left"></i> Trả lời
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Tác vụ</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div>
                                                <a href="{{ route('admin.contact.index') }}" class="btn btn-default"><i
                                                            class=" icon-close2"></i>
                                                    Đóng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <!-- /dashboard content -->


                        <!-- Footer -->
                        @include('admin.includes.footer')
                        <!-- /footer -->

                    </div>
                    <!-- /content area -->

                </div>
            @endsection
