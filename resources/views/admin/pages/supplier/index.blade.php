@extends('admin.layouts.master')
@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/supplier/index.js']['file'] }}"></script>
        @else
            @vite(['resources/js/supplier/index.js'])
            @endproduction
            @endsection

            @section('content')
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><a href="{{ route('admin.dashboard') }}" class="text-link"><i
                                            class="icon-arrow-left52 position-left"></i></a> <span
                                        class="text-semibold">Nhà đầu tư</span>
                                    - Danh sách nhà đầu tư</h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng
                                        điều khiển</a>
                                </li>
                                <li class="active">Nhà đầu tư</li>
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
                                                <form
                                                    action="{{ route('admin.suppliers.index', array_merge(request()->all())) }}"
                                                    method="get">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <input type="hidden" hidden="" class="form-control"
                                                                       name="locale"
                                                                       value="{{ request()->query('locale', \App\Enums\Language::Vietnamese) }}">
                                                                <input type="text" class="form-control" name="q"
                                                                       value="{{ request()->query('q') }}"
                                                                       placeholder="Tìm kiếm...">
                                                                <div class="form-control-feedback">
                                                                    <i class="icon-search4 text-size-base"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button class="btn-primary btn" type="submit">Tìm kiếm
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4 text-right">
                                                <div class="form-group has-feedback has-feedback-left"
                                                     style="text-align: end">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"><img
                                                                class="icon-flag"
                                                                src="{{ \App\Enums\Language::getIconFlag(request()->query('locale', \App\Enums\Language::Vietnamese)) }}"
                                                                alt="flag">{{ \App\Enums\Language::getDescription(request()->query('locale', \App\Enums\Language::Vietnamese)) }}
                                                            <span class="caret"></span></button>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            @foreach(\App\Enums\Language::toSelectArray() as $key => $locale)
                                                                <li>
                                                                    <a href="{{ route('admin.suppliers.index', array_merge(request()->all(), ['locale' => $key])) }}">
                                                                        <img
                                                                            class="icon-flag"
                                                                            src="{{ \App\Enums\Language::getIconFlag($key) }}"
                                                                            alt="flag">
                                                                        {{ $locale }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @if(checkPermission('post-create'))
                                                        <a type="button" href="{{ route('admin.suppliers.create', ['ref_language' => request()->query('locale', \App\Enums\Language::Vietnamese)]) }}"
                                                           class="btn btn-primary"><i
                                                                class="icon-add"></i>
                                                            Thêm mới</a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel panel-flat">
                                    <div class="panel-body">
                                        <div class="table">
                                            <table class="table table-bordered table-scroll" id="supplier-table">
                                                <thead>
                                                <tr>
                                                    <th style="width: 5%; text-align: center">STT</th>
                                                    <th width="56px" style="text-align: center">Ảnh</th>
                                                    <th>Tên nhà đầu tư</th>
                                                    <th>Slug</th>
                                                    <th style="text-align: center">Ngày tạo</th>
                                                    <th style="text-align: center">Ngôn ngữ</th>
                                                    <th style="text-align: center">Hiển thị</th>
                                                    <th style="width: 150px; text-align: center">Hành động</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($suppliers as $supplier)
                                                    <tr>
                                                        <td style="text-align: center">{{ $loop->index + 1 + $suppliers->perPage() * ($suppliers->currentPage() - 1)   }}</td>
                                                        <td>
                                                            <a href="{{ localized_route('cms.news.post',@$supplier->slug->content, @$supplier->language()->first()->language_code) }}">
                                                                @if($supplier->thumbnail)
                                                                    <img
                                                                        style="width: 56px; height: 56px;object-fit: cover"
                                                                        src="{{ $supplier->thumbnail }}" alt="">
                                                                @else
                                                                    <img
                                                                        style="width: 56px; height: 56px;object-fit: cover"
                                                                        src="{{ asset('assets/admin/images/default.jpg') }}"
                                                                        alt="">
                                                                @endif
                                                            </a>
                                                        </td>
                                                        <td>
                                                <span style="font-weight: bold"><a
                                                        href="{{ localized_route('cms.news.post',@$supplier->slug->content, @$supplier->language()->first()->language_code) }}">{{ $supplier->name ?? ''}}</a></span>
                                                        </td>
                                                        <td>{{ @$supplier->slug->content ?? '' }}</td>
                                                        <td style="text-align: center">{{ @$supplier->textDatePublish }}</td>
                                                        <td style="text-align: center;width: 150px;"><img
                                                                class="icon-flag" src="{{ @$supplier->languageIcon }}"
                                                                alt="">{{ @$supplier->languageText}}</td>
                                                        <td style="text-align: center">{!! @$supplier->isActiveText !!}</td>
                                                        <td style="text-align: center">
                                                            <ul class="icons-list">
                                                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                       data-toggle="dropdown"
                                                                       aria-expanded="false"><i class="icon-menu7"></i></a>
                                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                                        @if(checkPermission('supplier-update'))
                                                                            <li>
                                                                                <a href="{{ route('admin.suppliers.edit', $supplier->id) }}"><i
                                                                                        class="icon-pencil7"></i> Chỉnh
                                                                                    sửa</a>
                                                                            </li>
                                                                        @endif
                                                                        @if(checkPermission('supplier-delete'))
                                                                            <li>
                                                                                <a href="javascript:void(0);"
                                                                                   class="btn-delete"
                                                                                   data-id="{{$supplier->id}}"><i
                                                                                        class="icon-trash"></i> Xóa</a>
                                                                            </li>
                                                                        @endif

                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10" style="text-align: center">
                                                            <img src="{{ asset('assets\admin\images\empty.png') }}"
                                                                 width="350px"
                                                                 alt="">
                                                            <div>Không có dữ liệu</div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <div
                                            style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px">
                                            <div class="per_page">

                                            </div>
                                            <div class="pagination">
                                                {{ $suppliers->appends(request()->input())->links() }}
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
