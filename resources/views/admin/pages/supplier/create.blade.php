@extends('admin.layouts.master')

@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/supplier/create.js']['file'] }}"></script>
        @else
            @vite(['resources/js/supplier/create.js'])
            @endproduction
            @endsection

            @section('content')
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><a href="{{ route('admin.suppliers.index') }}" class="text-link"><i
                                                class="icon-arrow-left52 position-left"></i></a> <span
                                            class="text-semibold">Nhà đầu tư</span> -
                                    Tạo mới </h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng
                                        điều khiển</a>
                                </li>
                                <li><a href="{{route('admin.suppliers.index')}}">Nhà đầu tư</a></li>
                                <li class="active">Tạo mới</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">
                        <!-- Dashboard content -->
                        <div class="alert alert-primary alert-styled-left">
                            Bản dịch <img class="icon-flag" src="{{ \App\Enums\Language::getIconFlag($refLanguage) }}" alt="{{ \App\Enums\Language::getDescription($refLanguage) }}"><b>{{ \App\Enums\Language::getDescription($refLanguage) }}</b>
                        </div>
                        <div class="row">
                            <form action="{{ route('admin.suppliers.store', request()->all()) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-9">

                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-info22 position-left"></i> Thông tin
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label text-bold">Tên nhà đầu tư<span
                                                            class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="name" id="title"
                                                           value="{{ old('name') }}" class="form-control">
                                                    @error('name')
                                                    <label id="error-title" class="validation-error-label"
                                                           for="basic">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label text-bold">Mô tả</label>
                                                <div>
                                                    <textarea rows="5" id="editorDescription" style="resize: vertical" cols="5"
                                                              name="description"
                                                              class="form-control"
                                                              aria-required="true"></textarea>
                                                </div>
                                                @error('description')
                                                <label id="error-content" class="validation-error-label"
                                                       for="basic">{{ $message }}</label>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label text-bold">Giới thiệu<span
                                                            class="text-danger">*</span></label>
                                                <div>
                                                    <textarea rows="5" id="editorContent" style="resize: vertical" cols="5" name="introduction"
                                                              class="form-control"
                                                              aria-required="true">{{ old('introduction') }}</textarea>
                                                </div>
                                                @error('introduction')
                                                <label id="error-content" class="validation-error-label"
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
                                                <button class="btn btn-primary"><i class=" icon-paperplane"></i> Tạo
                                                    mới
                                                </button>
                                                <a href="{{ route('admin.suppliers.index') }}" class="btn btn-default"><i
                                                            class=" icon-close2"></i>
                                                    Đóng</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-gradient position-left"></i> Trạng
                                                thái</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div>
                                                <select id="selectIsActive" name="status"
                                                        class="bootstrap-select form-control select-lg">
                                                    <option value="1">Công khai</option>
                                                    <option value="0">Ẩn</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-medal position-left"></i> Nhà đầu tư top
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" class="form-control switchery"
                                                           name="is_top"
                                                           value={{ old('is_top') ? 1 : 0 }} {{ old('is_top') ? 'checked' : '' }}
                                                    >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class=" icon-image2 position-left"></i> Ảnh đại
                                                diện</h6>
                                        </div>
                                        <div class="panel-body">
                                            <div>
                                                <input id="image" type="text" hidden name="thumbnail">
                                                <a class="lfm" data-input="image" data-preview="holder">Chọn ảnh</a>
                                                <div id="holder" class="image-preview"
                                                     style="margin-top:15px;max-height:150px; max-width: 150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('thumbnail')
                                    <label id="error-content" class="validation-error-label"
                                           for="basic">{{ $message }}</label>
                                    @enderror
                                    <div class="panel panel-white">
                                        <div class="panel-heading" >
                                            <h6 class="panel-title"><i class=" icon-image2 position-left"></i> Thương hiệu</h6>
                                        </div>
                                        <div class="panel-heading">
                                            <button id="btn-clone-supplier" type="button" class="btn btn-primary"><i class=" icon-add"></i> Thêm thương hiệu
                                            </button>
                                        </div>
                                        <div class="panel-body" id="multiple-form-supplier">
                                            <div class="hidden">
                                                <div class="panel-heading warpp-form-suppperli d-none " name="warpp-form-suppperli-tmp" style="display: flex; align-items: end; justify-content: space-between">
                                                    <div>
                                                        <div>
                                                            <input class="input-image" id="input-image-tmp" type="text" hidden>
                                                            <a class="lfm" data-input="input-image-0" data-preview="holder-image-tmp">Chọn ảnh</a>
                                                            <div id="holder-image-tmp" class="image-preview"
                                                                 style="margin-top:15px;max-height:150px; max-width: 150px">
                                                            </div>
                                                        </div>
                                                        <input style="margin-top:10px;" type="text" class="input-name-brand form-control" placeholder="Tên thương hiệu">
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-delete-suppperli" id="btn-delete-suppperli-1"><i class=" icon-close2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="panel-heading warpp-form-suppperli" name="warpp-form-suppperli-1" style="display: flex; align-items: end; justify-content: space-between">
                                                <div>
                                                    <div>
                                                        <input class="input-image" id="input-image-1" type="text" hidden name="imgBrand[]">
                                                        <a class="lfm" data-input="input-image-1" data-preview="holder-image-1">Chọn ảnh</a>
                                                        <div id="holder-image-1" class="image-preview"
                                                             style="margin-top:15px;max-height:150px; max-width: 150px">
                                                        </div>
                                                    </div>
                                                    <input type="text" name="nameBrand[]" class="form-control" style="margin-top:10px;" placeholder="Tên thương hiệu">
                                                </div>
                                                <button type="button" class="btn btn-danger btn-delete-suppperli hidden" id="btn-delete-suppperli-1"><i class=" icon-close2"></i>
                                                </button>
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
