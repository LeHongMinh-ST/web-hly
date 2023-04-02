@extends('admin.layouts.master')
@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
//        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/setting/edit.js']['file'] }}"></script>
        @else
            @vite(['resources/js/setting/edit.js'])
            @endproduction
            @endsection
            @section('content')
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span
                                        class="text-semibold">Danh mục</span> - Danh sách cài đặt</h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng
                                        điều khiển</a></li>
                                <li class="active">Cài đặt</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /page header -->

                    <!-- Content area -->
                    <div class="content">
                        <div class="row">
                            <form method="post" action="{{ route('admin.settings.update') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <!--@method('post') -->
                                <div class="col">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i class="icon-info22 position-left"></i> Thông tin
                                            </h6>
                                        </div>
                                        <div class="panel-body"
                                             style="justify-content: center; height: 100%">
                                            <div class="form-group">
                                                <label class="control-label text-bold">
                                                    Tiêu đề
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div>
                                                    <input type="text" name="seo_title" id="seo_title"
                                                           value="{{ old('seo_title', @$settings['seo_title']) }}"
                                                           class="form-control">
                                                    @error('seo_title')
                                                    <label id="error-title" class="validation-error-label"
                                                           for="basic">{{ $message }}
                                                    </label>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label text-bold">Mô tả</label>
                                                <textarea rows="5" id="editorDescription" style="resize: vertical"
                                                          cols="5"
                                                          name="seo_description"
                                                          class="form-control"
                                                          aria-required="true">{{ old('seo_description', @$settings['seo_description']) }}
                                                </textarea>

                                                @error('seo_description')
                                                <label id="error-title" class="validation-error-label"
                                                       for="basic">{{ $message }}
                                                </label>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div>
                                                    <label class="control-label text-bold">
                                                        Địa chỉ
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="contact_address" id="contact_address"
                                                           value="{{ old('contact_address', @$settings['contact_address']) }}"
                                                           class="form-control">
                                                    @error('contact_address')
                                                    <label id="error-title" class="validation-error-label"
                                                           for="basic">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">
                                                <i class=" icon-image2 position-left"></i> Logo
                                            </h6>
                                        </div>

                                        <div class="panel-body">
                                            <div>
                                                <input id="image" type="text"
                                                       value="{{ old('logo', @$settings['logo']) }}"
                                                       hidden name="logo">
                                                <a class="lfm" data-input="image" data-preview="holder">
                                                    Chọn ảnh
                                                </a>
                                                <div id="holder" class="image-preview"
                                                     style="margin-top:15px;max-height:150px; max-width: 150px">
                                                    @if(old('logo', @$settings['logo']))
                                                        <img style="width: 100%; height: 100%"
                                                             src="{{ @$settings['logo'] }}" alt="Ảnh logo">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @error('logo')
                                        <label id="error-content" class="validation-error-label"
                                               for="basic">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h6 class="panel-title"><i
                                                    class=" icon-image2 position-left"></i> Favicon
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div>
                                                <input id="image" type="text"
                                                       value="{{ old('favicon', @$settings['favicon']) }}"
                                                       hidden name="favicon">
                                                <a class="lfm" data-input="image" data-preview="holder2">
                                                    Chọn ảnh
                                                </a>
                                                <div id="holder2" class="image-preview"
                                                     style="margin-top:15px;max-height:150px; max-width: 150px">
                                                    @if(old('favicon', @$settings['favicon']))
                                                        <img style="width: 100%; height: 100%"
                                                             src="{{ @$settings['favicon'] }}"
                                                             alt="Ảnh favicon">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @error('favicon')
                                        <label id="error-content" class="validation-error-label"
                                               for="basic">{{ $message }}</label>
                                        @enderror
                                    </div>

                                </div>
                                <div>
                                    <button class="btn btn-success" type="submit">
                                        <i class=" icon-paperplane"></i>
                                        Lưu
                                    </button>
                                </div>

                                {{ implode(', ', $errors->all()) }}
                            </form>
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
