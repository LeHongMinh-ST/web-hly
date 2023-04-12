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
                                    Chỉnh sửa </h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng
                                        điều khiển</a>
                                </li>
                                <li><a href="{{route('admin.suppliers.index')}}">Nhà đầu tư</a></li>
                                <li class="active">Chỉnh sửa</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">
                        <!-- Dashboard content -->
                        <div class="alert alert-primary alert-styled-left">
                            Bản dịch <img class="icon-flag"
                                          src="{{ \App\Enums\Language::getIconFlag($supplier->language()->first()->language_code) }}"
                                          alt="{{ \App\Enums\Language::getDescription($supplier->language()->first()->language_code) }}"><b>{{ \App\Enums\Language::getDescription($supplier->language()->first()->language_code) }}</b>

                        </div>
                        <div class="row">
                            <form action="{{ route('admin.suppliers.update',  @$supplier->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
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
                                                           value="{{ old('name', @$supplier->name) }}" class="form-control">
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
                                                              aria-required="true">
                                                        {{ old('description', @$supplier->description) }}

                                                    </textarea>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label text-bold">Giới thiệu<span
                                                        class="text-danger">*</span></label>
                                                <div>
                                                    <textarea rows="5" id="editorContent" style="resize: vertical" cols="5" name="introduction"
                                                              class="form-control"
                                                              aria-required="true">{!! old('introduction', @$supplier->introduction) !!}</textarea>
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
                                                <button class="btn btn-primary"><i class=" icon-paperplane"></i> Lưu
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
                                                <select id="selectIsActive" name="status" class="bootstrap-select form-control select-lg">
                                                    <option value="1" {{old('status', @$supplier->status) == 1 ? 'selected' : ''}}>Công khai</option>
                                                    <option value="0" {{old('status', @$supplier->status) == 0 ? 'selected' : ''}}>Ẩn</option>
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
                                                        @if(in_array($keyLocale, @$supplier->locales))
                                                            @if($supplier->language()->first()->language_code === $keyLocale)
                                                                <img class="icon-flag"
                                                                     src="{{ \App\Enums\Language::getIconFlag($keyLocale)}}"
                                                                     alt="{{ $localeDes }}">{{ $localeDes }}
                                                                <span class="check"><i class="icon-check"></i></span>
                                                            @else
                                                                <a href="{{ route('admin.suppliers.edit', @$supplier->localeIds[$keyLocale]['reference_id']) }}"
                                                                   title="Bản dịch {{ $localeDes }}">
                                                                    <img class="icon-flag"
                                                                         src="{{ \App\Enums\Language::getIconFlag($keyLocale)}}"
                                                                         alt="{{ $localeDes }}">{{ $localeDes }}
                                                                    <span class="check"><i
                                                                            class="icon-check"></i></span>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('admin.suppliers.create', ['ref_language' => $keyLocale, 'from_id' => $supplier->id ]) }}"
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
                                            <h6 class="panel-title"><i class="icon-medal position-left"></i> Nhà đầu tư top
                                            </h6>
                                        </div>
                                        <div class="panel-body">
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" class="form-control switchery"
                                                           name="is_top"
                                                           value={{ old('is_top', @$supplier->is_top) ? 1 : 0 }} {{ old('is_top', @$supplier->is_top) ? 'checked' : '' }}>
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
                                                <input
                                                    value="{{ old('description', @$supplier->thumbnail) }}"
                                                    id="image" type="text" hidden name="thumbnail">
                                                <a class="lfm" data-input="image" data-preview="holder">Chọn ảnh</a>
                                                <div id="holder" class="image-preview"
                                                     style="margin-top:15px;max-height:150px; max-width: 150px">
                                                    @if(old('description', @$supplier->thumbnail))
                                                        <img style="width: 100%; height: 100%"
                                                             src="{{ @$supplier->thumbnail }}" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                            @forelse (@$supplier->brands ?? [] as $brand)
                                            <div class="panel-heading warpp-form-suppperli" name="warpp-form-suppperli-1" style="display: flex; align-items: end; justify-content: space-between">
                                                <div>
                                                    <div>
                                                        <input
                                                            value="{{ old('description', @$brand[0]) }}"
                                                            class="input-image" id="input-image-{{ $loop->index }}" type="text" hidden name="imgBrand[]">
                                                        <a class="lfm" data-input="input-image-{{ $loop->index }}" data-preview="holder-image-{{ $loop->index }}">Chọn ảnh</a>
                                                        <div id="holder-image-{{ $loop->index }}" class="image-preview"
                                                             style="margin-top:15px;max-height:150px; max-width: 150px">
                                                            @if(old('description', @$brand[0]))
                                                                <img style="width: 100%; height: 100%"
                                                                     src="{{ @$brand[0] }}" alt="">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <input
                                                        value="{{ old('description', @$brand[1]) }}"
                                                        type="text" name="nameBrand[]" class="form-control" style="margin-top:10px;" placeholder="Tên thương hiệu">
                                                </div>
                                                <button type="button" class="btn btn-danger btn-delete-suppperli " id="btn-delete-suppperli-{{ $loop->index }}"><i class=" icon-close2"></i>
                                                </button>
                                            </div>
                                                @empty
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
                                            @endforelse
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
