@extends('admin.layouts.master')

@section('custom_js')
    @vite(['resources/js/category/edit.js'])
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><a href="{{ route('admin.categories.index') }}" class="text-link"><i
                                class="icon-arrow-left52 position-left"></i></a> <span
                            class="text-semibold">Danh mục</span> -
                        Chỉnh sửa </h4>
                </div>

            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng điều khiển</a>
                    </li>
                    <li><a href="{{route('admin.categories.index')}}">Danh mục</a></li>
                    <li class="active">Chỉnh sửa</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Dashboard content -->
            <div class="row">
                <form action="{{ route('admin.categories.update', @$category->id) }}" method="post" >
                    @csrf
                    @method('put')
                    <div class="col-md-9">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-info22 position-left"></i> Thông tin</h6>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label text-bold">Tên<span
                                            class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', @$category->name) }}" >
                                        @error('name')
                                        <label id="basic-error" class="validation-error-label"
                                               for="basic">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label text-bold">Thứ tự</label>
                                    <div>
                                    <input class="form-control" type="number" name="order"  min="0"
                                    value="{{ old('order', @$category->order) }}"
                                    >
                                    </div>
                                    @error('description')
                                    <label id="basic-error" class="validation-error-label"
                                           for="basic">{{ $message }}</label>
                                    @enderror
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
                                     <button class="btn btn-success"><i class=" icon-paperplane"></i> Lưu
                                    </button>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-default"><i
                                            class=" icon-close2"></i>
                                        Đóng</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-stack3 position-left"></i> Loại danh mục</h6>
                            </div>
                            <div class="panel-body">
                                <div>
                                    <select id="selectIsActive" name="type" class="bootstrap-select form-control select-lg">
                                        @foreach($categoryTypes as $type)
                                            <option value="{{$type['key']}}" {{old('order', @$category->type) == $type['key'] ? 'selected' : ''}}>{{$type['name']}}</option>
                                        @endforeach
                                    </select>
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
                                        <option value="1" {{old('order', @$category->status) == 1 ? 'selected' : ''}}>Công khai</option>
                                        <option value="0" {{old('order', @$category->status) == 0 ? 'selected' : ''}}>Ẩn</option>
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
