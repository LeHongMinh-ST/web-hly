@extends('admin.layouts.master')


@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/recruitment/edit.js']['file'] }}"></script>
        @else
            @vite(['resources/js/recruitment/edit.js'])
            @endproduction
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><a href="{{ route('admin.recruitments.index') }}" class="text-link"><i
                                class="icon-arrow-left52 position-left"></i></a> <span
                            class="text-semibold">Bài tuyển dụng</span> -
                        Chỉnh sửa </h4>
                </div>

            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng điều khiển</a>
                    </li>
                    <li><a href="{{route('admin.recruitments.index')}}">Bài tuyển dụng</a></li>
                    <li class="active">Chỉnh sửa</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">
            <div class="alert alert-primary alert-styled-left">
                Bản dịch <img class="icon-flag"
                              src="{{ \App\Enums\Language::getIconFlag($recruitment->language()->first()->language_code) }}"
                              alt="{{ \App\Enums\Language::getDescription($recruitment->language()->first()->language_code) }}"><b>{{ \App\Enums\Language::getDescription($recruitment->language()->first()->language_code) }}</b>
            </div>
            <!-- Dashboard content -->
            <div class="row">
                <form action="{{ route('admin.recruitments.update', @$recruitment->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
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
                                        <input type="text" name="title" id="title" value="{{ old('title', @$recruitment->title) }}"
                                               class="form-control">
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
                                          aria-required="true">
                                    {{ old('description', @$recruitment->description) }}
                                </textarea>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label text-bold">Nội dung<span
                                            class="text-danger">*</span></label>
                                    <div>
                                        <textarea rows="5" id="editorContent" style="resize: vertical" cols="5"
                                                  name="content"
                                                  class="form-control"
                                                  aria-required="true">
                                            {!! old('content', @$recruitment->content) !!}
                                        </textarea>
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
                                    <button class="btn btn-success"><i class=" icon-paperplane"></i> Lưu
                                    </button>
                                    <a href="{{ route('admin.recruitments.index') }}" class="btn btn-default"><i
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
                                        <option value="1" {{old('status', @$recruitment->status) == 1 ? 'selected' : ''}}>Công khai</option>
                                        <option value="0" {{old('status', @$recruitment->status) == 0 ? 'selected' : ''}}>Ẩn</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class=" icon-sphere position-left"></i> Ngôn ngữ
                                </h6>
                            </div>
                            <div class="panel-body">
                                <div class="list-locale">
                                    @foreach(\App\Enums\Language::toSelectArray() as $keyLocale =>  $localeDes)
                                        <div class="item">
                                            @if(in_array($keyLocale, @$recruitment->locales))
                                                @if($recruitment->language()->first()->language_code === $keyLocale)
                                                    <img class="icon-flag"
                                                         src="{{ \App\Enums\Language::getIconFlag($keyLocale)}}"
                                                         alt="{{ $localeDes }}">{{ $localeDes }}
                                                    <span class="check"><i class="icon-check"></i></span>
                                                @else
                                                    <a href="{{ route('admin.recruitments.edit', @$recruitment->localeIds[$keyLocale]['reference_id']) }}"
                                                       title="Bản dịch {{ $localeDes }}">
                                                        <img class="icon-flag"
                                                             src="{{ \App\Enums\Language::getIconFlag($keyLocale)}}"
                                                             alt="{{ $localeDes }}">{{ $localeDes }}
                                                        <span class="check"><i
                                                                class="icon-check"></i></span>
                                                    </a>
                                                @endif
                                            @else
                                                <a href="{{ route('admin.recruitments.create', ['ref_language' => $keyLocale, 'from_id' => $recruitment->id, 'category_id' => @$recruitment->category_id]) }}"
                                                   title="Thêm mới bản dịch {{ $localeDes }}">
                                                    <img class="icon-flag"
                                                         src="{{ \App\Enums\Language::getIconFlag($keyLocale)}}"
                                                         alt="{{ $localeDes }}">{{ $localeDes }}
                                                    <span class="check"><i class="icon-plus2"></i></span>
                                                </a>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-folder2 position-left"></i> Danh mục</h6>
                            </div>
                            <div class="panel-body">
                                <div>
                                    <select id="selectIsActive" name="category_id" class="bootstrap-select form-control select-lg">
                                        <option selected disabled >{{@count($categories) ? 'Chọn danh mục ...' : 'Chưa có danh mục'}} </option>
                                        @forelse(@$categories ?? [] as $category)
                                            <option
                                                @if($category->id == $recruitment->category_id) selected
                                                @endif style="cursor: pointer"
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class=" icon-image2 position-left"></i> Ảnh đại diện</h6>
                            </div>
                            <div class="panel-body">
                                <div>
                                    <input id="image" type="text" value="{{ old('description', @$recruitment->thumbnail) }}" hidden name="thumbnail">
                                    <a id="lfm" data-input="image" data-preview="holder">Chọn ảnh</a>
                                    <div id="holder" class="image-preview"
                                         style="margin-top:15px;max-height:150px; max-width: 150px">
                                        @if(old('description', @$recruitment->thumbnail))
                                            <img style="width: 100%; height: 100%" src="{{ @$recruitment->thumbnail }}" alt="">
                                        @endif
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
