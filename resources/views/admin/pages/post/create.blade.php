@extends('admin.layouts.master')

@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/post/create.js']['file'] }}"></script>
        @else @vite(['resources/js/post/create.js']) @endproduction
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Bài viết</span> -
                        Tạo mới </h4>
                </div>

            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng điều khiển</a>
                    </li>
                    <li><a href="{{route('admin.posts.index')}}">Bài viết</a></li>
                    <li class="active">Tạo mới</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Dashboard content -->
            <div class="row">
                <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-info22 position-left"></i> Thông tin</h6>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label text-bold">Tiêu đề<span
                                            class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" class="form-control">
                                        @error('title')
                                        <label id="basic-error" class="validation-error-label"
                                               for="basic">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label text-bold">Đường dẫn<span class="text-danger">*</span>:
                                    </label>
                                    {{--                                <span>{{ asset('post/' . $slug) }} </span>--}}
                                    @error('slug')
                                    <label id="basic-error" class="validation-error-label"
                                           for="basic">{{ $message }}</label>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="control-label text-bold">Mô tả</label>
                                    <div>
                        <textarea rows="5" id="editorDescription" style="resize: vertical" cols="5" name="textarea"
                                  class="form-control"
                                  aria-required="true"></textarea>
                                    </div>
                                    @error('description')
                                    <label id="basic-error" class="validation-error-label"
                                           for="basic">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label text-bold">Nội dung</label>
                                    <div>
                        <textarea rows="5" id="editorContent" style="resize: vertical" cols="5" name="textarea"
                                  class="form-control"
                                  aria-required="true"></textarea>
                                    </div>
                                    @error('content')
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
                                    <button class="btn btn-primary"><i class=" icon-paperplane"></i> Tạo
                                        mới
                                    </button>
                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-default"><i
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
                                    <select id="selectIsActive" class="select2 form-control select-lg">
                                        <option value="1">Công khai</option>
                                        <option value="0">Ẩn</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-calendar position-left"></i> Ngày đăng</h6>
                            </div>
                            <div class="panel-body">
                                <div>
                                    <input type="text" class="form-control datepicker"
                                           placeholder="Chọn ngày đăng&hellip;">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-folder2 position-left"></i> Danh mục</h6>
                            </div>
                            <div class="panel-body">
                                <div>
                                    @forelse(@$categories ?? [] as $category)
                                        <div>
                                            <label class="checkbox">
                                                <input type="checkbox" name="category_ids" style="cursor: pointer"
                                                       value="{{ $category->id }}">
                                                <span
                                                    style="font-size: 16px; margin-left: 16px">{{ $category->name }}</span>
                                            </label>
                                        </div>
                                    @empty
                                        Chưa có danh mục !
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class=" icon-image2 position-left"></i> Ảnh đại diện</h6>
                            </div>
                            <div class="panel-body">
{{--                                @if($thumbnail)--}}
{{--                                    <img style="width: 150px; height: 150px;object-fit: cover" src="{{ $thumbnail }}"--}}
{{--                                         alt="">--}}
{{--                                    @error('avatar')--}}
{{--                                    <label id="basic-error" class="validation-error-label"--}}
{{--                                           for="basic">{{ $message }}</label>--}}
{{--                                    @enderror--}}
{{--                                @endif--}}
                                <div>
                                    <input id="image" type="text" hidden >
                                    <a href="#" id="lfm" data-input="image">Chọn ảnh</a>
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
