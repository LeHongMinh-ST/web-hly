@extends('admin.layouts.master')

@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/category/create.js']['file'] }}"></script>
        @else
            @vite(['resources/js/category/create.js'])
            @endproduction
            @endsection

            @section('content')
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Tài khoản</span> -
                                    Tạo mới </h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng điều khiển</a>
                                </li>
                                <li><a href="{{route('admin.users.index')}}">Tài khoản</a></li>
                                <li class="active">Tạo mới</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">

                        <!-- Dashboard content -->
                        <div class="row">
                            <form action="{{ route('admin.users.store') }}" method="post" >
                                @csrf
                                <div class="col-md-9">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-info22 position-left"></i> Thông tin</h6>
                                        </div>
                                        <div class="panel-body row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label text-bold">Họ và tên<span
                                                        class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="fullname" id="fullname" class="form-control">
                                                    @error('fullname')
                                                    <label id="basic-error" class="validation-error-label"
                                                           for="basic">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label text-bold">Tên tài khoản<span
                                                        class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="username" id="username" class="form-control">
                                                    @error('username')
                                                    <label id="basic-error" class="validation-error-label"
                                                           for="basic">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label text-bold">Email<span
                                                        class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="email" id="email" class="form-control">
                                                    @error('email')
                                                    <label id="basic-error" class="validation-error-label"
                                                           for="basic">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label text-bold">Số điện thoại<span
                                                        class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="phone_number" id="phone_number" class="form-control">
                                                    @error('phone_number')
                                                    <label id="basic-error" class="validation-error-label"
                                                           for="basic">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label text-bold">Mật khẩu<span
                                                        class="text-danger">*</span></label>
                                                <div>
                                                    <input type="password" name="password" id="password" class="form-control">
                                                    @error('password')
                                                    <label id="basic-error" class="validation-error-label"
                                                           for="basic">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label text-bold">Nhóm quyền<span
                                                        class="text-danger">*</span></label>
                                                <div>
                                                    <select id="selectIsActive" name="role_id" class="bootstrap-select form-control select-lg">
                                                        <option selected disabled >{{@count($roles) ? 'Chọn danh mục ...' : 'Chưa có danh mục'}} </option>
                                                        @forelse(@$roles ?? [] as $role)
                                                            <option value="{{$role['id']}}">{{$role['name']}}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                    @error('role_id')
                                                    <label id="basic-error" class="validation-error-label"
                                                           for="basic">{{ $message }}</label>
                                                    @enderror
                                                </div>
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
                                                <button class="btn btn-primary"><i class=" icon-paperplane"></i> Tạo
                                                    mới
                                                </button>
                                                <a href="{{ route('admin.users.index') }}" class="btn btn-default"><i
                                                        class=" icon-close2"></i>
                                                    Đóng</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-gradient position-left"></i> Trạng thái</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div>
                                                <select id="selectIsActive" name="status" class="bootstrap-select form-control select-lg">
                                                    <option value="1">Công khai</option>
                                                    <option value="0">Ẩn</option>
                                                </select>
                                            </div>
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
