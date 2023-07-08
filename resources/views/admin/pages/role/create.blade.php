@extends('admin.layouts.master')

@section('custom_js')
    @vite(['resources/js/role/create.js'])
@endsection

@section('custom_css')
    <style >

    </style>
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><a href="{{ route('admin.roles.index') }}" class="text-link"><i
                                    class="icon-arrow-left52 position-left"></i></a>  <span class="text-semibold">Vai trò</span> -
                        Tạo mới </h4>
                </div>

            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng điều khiển</a>
                    </li>
                    <li><a href="{{route('admin.roles.index')}}">Vai trò</a></li>
                    <li class="active">Tạo mới</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Dashboard content -->
            <div class="row">
                <form action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-info22 position-left"></i> Thông tin</h6>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label text-bold">Tên vai trò<span
                                            class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" name="name" id="title" value="{{ old('name') }}" class="form-control">
                                        @error('title')
                                        <label id="error-name" class="validation-error-label"
                                               for="basic">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-bold">Mô tả</label>
                                    <div>
                                <textarea rows="5" style="resize: vertical" cols="5" name="description"
                                  class="form-control"
                                  aria-required="true"></textarea>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-flag3 position-left"></i> Cờ đánh dấu quyền hạn</h6>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <ul class="tree">
                                        @forelse($permissions as $group)
                                            <li class="has">
                                                <input type="checkbox" name="group[]" value="{{ $group->id }}">
                                                <label>{{ $group->name }} <span class="total">({{ count($group->permissions) }})</span></label>
                                                <ul>
                                                    @foreach($group->permissions as $permission)
                                                        <li class="">
                                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                                            <label>{{ $permission->name }} </label>
                                                        </li>
                                                    @endforeach


                                                </ul>
                                            </li>
                                        @empty
                                             <div></div>
                                        @endforelse

                                    </ul>
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
                                    <a href="{{ route('admin.roles.index') }}" class="btn btn-default"><i
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
