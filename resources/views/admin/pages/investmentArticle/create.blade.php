@extends('admin.layouts.master')

@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/investmentArticle/create.js']['file'] }}"></script>
        @else
            @vite(['resources/js/investmentArticle/create.js'])
            @endproduction
            @endsection

            @section('content')
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><a href="{{ route('admin.investment-article.index') }}" class="text-link"><i
                                                class="icon-arrow-left52 position-left"></i></a> <span
                                            class="text-semibold">Bài viết đầu tư</span> -
                                    Tạo mới </h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng
                                        điều khiển</a>
                                </li>
                                <li><a href="{{route('admin.investment-article.index')}}">Bài viết</a></li>
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
                            <form action="{{ route('admin.investment-article.store', request()->all()) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-9">

                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-info22 position-left"></i> Thông tin
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label text-bold">Tiêu đề<span
                                                            class="text-danger">*</span></label>
                                                <div>
                                                    <input type="text" name="title" id="title"
                                                           value="{{ old('title') }}" class="form-control">
                                                    @error('title')
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

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label text-bold">Nội dung<span
                                                            class="text-danger">*</span></label>
                                                <div>
                                                    <textarea rows="5" id="editorContent" style="resize: vertical" cols="5" name="content"
                                                              class="form-control"
                                                              aria-required="true">{{ old('content') }}</textarea>
                                                </div>
                                                @error('content')
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
                                                <a href="{{ route('admin.investment-article.index') }}" class="btn btn-default"><i
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
                                            <h6 class="panel-title"><i class="icon-medal position-left"></i> Nổi bật
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" class="form-control switchery"
                                                           name="is_featured"
                                                           value={{ old('is_featured', @$post->is_featured) ? 1 : 0 }} {{ old('is_featured', @$post->is_featured) ? 'checked' : '' }}>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-folder2 position-left"></i> Danh mục
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div>
                                                <select id="selectIsActive" name="category_id"
                                                        class="bootstrap-select form-control select-lg">
                                                    <option selected
                                                            disabled>{{@count($categories) ? 'Chọn danh mục ...' : 'Chưa có danh mục'}} </option>
                                                    @forelse(@$categories ?? [] as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
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
                                                <a id="lfm" data-input="image" data-preview="holder">Chọn ảnh</a>
                                                <div id="holder" class="image-preview"
                                                     style="margin-top:15px;max-height:150px; max-width: 150px">
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
