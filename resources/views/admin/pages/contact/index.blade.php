@extends('admin.layouts.master')
@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/contact/index.js']['file'] }}"></script>
        @else
            @vite(['resources/js/contact/index.js'])
            @endproduction
            @endsection

            @section('content')
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><a href="{{ route('admin.dashboard') }}" class="text-link"><i
                                                class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Liên hệ</span>
                                    - Danh sách liên hệ</h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng điều khiển</a>
                                </li>
                                <li class="active">Liên hệ</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">

                        <!-- Dashboard content -->
                        <div class="row">
                            <div class="col">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="q" value="{{ request()->query('q') }}" placeholder="Tìm kiếm...">
                                                                <div class="form-control-feedback">
                                                                    <i class="icon-search4 text-size-base"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button class="btn-primary btn" type="submit">Tìm kiếm</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4 text-right">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel panel-flat">
                                    <div class="panel-body">
                                        <div class="table">

                                            <table class="table table-bordered" id="contact-table">
                                                <thead>
                                                <tr>
                                                    <th style="width: 5%; text-align: center">STT</th>
                                                    <th>Họ và tên</th>
                                                    <th>Email</th>
                                                    <th>Chủ đề</th>
                                                    <th>Trạng thái</th>
                                                    <th style="width: 150px; text-align: center">Hành động</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($contacts as $contact)
                                                    <tr>
                                                        <td style="text-align: center">{{ $loop->index + 1 + $contacts->perPage() * ($contacts->currentPage() - 1)   }}</td>
                                                        <td>
                                                <span style="font-weight: bold"><a
                                                            href="{{ route('admin.contacts.detail', $contact->id) }}">{{ $contact->name ?? ''}}</a></span>
                                                        </td>
                                                        <td>{{ @$contact->email ?? ''}}</td>
                                                        <td>{{ @$contact->subject ?? ''}}</td>
                                                        <td>{{ @$contact->statusText ?? ''}}</td>
                                                        <td style="text-align: center">
                                                            <ul class="icons-list">
                                                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                                       aria-expanded="false"><i class="icon-menu7"></i></a>
                                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                                        <li><a href="{{ route('admin.contacts.show', $contact->id) }}"><i
                                                                                        class="icon-pencil7"></i> Chỉnh sửa</a></li>
                                                                        <li>
                                                                            <a href="javascript:void(0);" class="btn-delete" data-id="{{$contact->id}}"><i class="icon-trash"></i> Xóa</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" style="text-align: center">
                                                            <img src="{{ asset('assets\admin\images\empty.png') }}" width="350px"
                                                                 alt="">
                                                            <div>Không có dữ liệu!</div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px">
                                            <div class="per_page">

                                            </div>
                                            <div class="pagination">
                                                {{ $contacts->appends(request()->input())->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /dashboard content -->


                        <!-- Footer -->
                        @include('admin.includes.footer')
                        <!-- /footer -->
                        <form action="" method="post" id="frm-delete">
                            @csrf
                            @method('delete')
                        </form>

                    </div>
                    <!-- /content area -->

                </div>
            @endsection
