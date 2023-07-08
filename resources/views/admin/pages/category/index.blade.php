@php use App\Enums\CategoryType;use App\Enums\Language; @endphp
@extends('admin.layouts.master')
@section('custom_js')
    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/category/index.js']['file'] }}"></script>
        <script type="text/javascript" src="assets/admin/js/plugins/forms/selects/bootstrap_select.min.js"></script>

        @else
            @vite(['resources/js/category/index.js'])
            @endproduction
            @endsection
            @section('content')
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span
                                        class="text-semibold">Danh mục</span> - Danh sách danh mục</h4>
                            </div>

                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="{{route('admin.dashboard')}}"><i class="icon-home2 position-left"></i> Bảng
                                        điều khiển</a></li>
                                <li class="active">Danh mục</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">
                        <div class="row">
                            <div class="col">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <form action="{{ route('admin.categories.index', array_merge(request()->all())) }}"
                                              method="get">
                                            <div class="row display-flex">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                               name="q"
                                                               value="{{ request()->query('q') }}"
                                                               placeholder="Tìm kiếm...">
                                                        <div class="form-control-feedback">
                                                            <i class="icon-search4 text-size-base"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" style="height: 100%">
                                                        <select class="bootstrap-select form-control"
                                                                name="type"
                                                                data-width="100%">
                                                            @foreach(CategoryType::toSelectArray() as $categoryType => $categoryTypeDesc)
                                                                <option
                                                                    value="{{$categoryType}}"
                                                                    @selected(request()->query('type') == $categoryType)>
                                                                    {{$categoryTypeDesc}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <button class="btn-primary btn" type="submit">Tìm kiếm
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <div class="form-group has-feedback has-feedback-left"
                                                         style="text-align: end">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"><img
                                                                    class="icon-flag"
                                                                    src="{{ Language::getIconFlag(request()->query('locale', Language::Vietnamese)) }}"
                                                                    alt="flag">{{ Language::getDescription(request()->query('locale', Language::Vietnamese)) }}
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                @foreach(Language::toSelectArray() as $key => $locale)
                                                                    <li>
                                                                        <a href="{{ route('admin.categories.index', array_merge(request()->all(), ['locale' => $key])) }}">
                                                                            <img
                                                                                class="icon-flag"
                                                                                src="{{ Language::getIconFlag($key) }}"
                                                                                alt="flag">
                                                                            {{ $locale }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <a type="button" href="{{ route('admin.categories.create') }}"
                                                           class="btn btn-primary"><i
                                                                class="icon-add"></i>
                                                            Thêm mới</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="panel panel-flat">
                                    <div class="panel-body">
                                        <div class="table">

                                <table class="table table-bordered" id="category-table">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%; text-align: center">STT</th>
                                        <!-- <th width="100px" style="text-align: center">Ảnh</th> -->
                                        <th>Tên danh mục</th>
                                        <th>Slug</th>
                                        <th style="text-align: center">Ngày đăng</th>
                                        <th style="text-align: center">Người đăng</th>
                                        <th style="text-align: center">Hiển thị</th>
                                        <th style="width: 150px; text-align: center">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td style="text-align: center">{{ $loop->index + 1 + $categories->perPage() * ($categories->currentPage() - 1)   }}</td>
                                            <td>
                                                <span style="font-weight: bold"><a
                                                            href="">{{ $category->name ?? ''}}</a></span>
                                            </td>
                                            <td>{{ @$category->slug->content ?? '' }}</td>
                                            <td style="text-align: center">{{ @$category->textDatePublish }}</td>
                                            <td style="text-align: center"><span><img
                                                            class="img-circle img-xs mr-5"
                                                            src="{{ Avatar::create(@$category->createBy->fullname)->toBase64()  }}"
                                                            alt="{{ @$category->createBy->fullname }}"></span>{{ @$category->createBy->fullname }}</td>
                                            <td style="text-align: center">{!! @$category->isActiveText !!}</td>
                                            <td style="text-align: center">
                                                <ul class="icons-list">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                           aria-expanded="false"><i class="icon-menu7"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="{{ route('admin.categories.edit', $category->id) }}"><i
                                                                            class="icon-pencil7"></i> Chỉnh sửa</a></li>
                                                            <li>
                                                                <a href="javascript:void(0);" class="btn-delete" data-id="{{$category->id}}"><i class="icon-trash"></i> Xóa</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" style="text-align: center">
                                                <img src="{{ asset('assets\admin\images\empty.png') }}" width="350px"
                                                     alt="">
                                                <div>Không có dữ liệu</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px">
                                <div class="per_page">

                                            </div>
                                            <div class="pagination">
                                                {{ $categories->appends(request()->input())->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Dashboard content -->
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
