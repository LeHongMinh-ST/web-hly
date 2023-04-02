@extends('admin.layouts.master')

@section('custom_js')
    <script src="{{ asset('libs/echarts/echarts.js') }}"></script>


@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><span class="text-semibold">Bảng điều khiển</span></h4>
                </div>

            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><i class="icon-home2 position-left"></i> Bảng điều khiển</li>
                </ul>


            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            <!-- Dashboard content -->
            <div class="row">
                <div class="col-lg-3">

                    <!-- Members online -->
                    <a href="{{  route('admin.posts.index') }}">
                        <div class="panel bg-teal-400">
                            <div class="panel-body">


                                <h3 class="no-margin"><i class="icon-magazine"></i> {{ abbreviateNumber($posts) }}</h3>
                                Bài viết
                            </div>

                            <div class="container-fluid">
                                <div id="members-online"></div>
                            </div>
                        </div>
                    </a>
                    <!-- /members online -->

                </div>

                <div class="col-lg-3">

                    <a href="{{  route('admin.recruitments.index') }}">
                        <div class="panel bg-pink-400">
                            <div class="panel-body">


                                <h3 class="no-margin"><i class="icon-newspaper2"></i> {{ abbreviateNumber($recruitments) }}</h3>
                                Bài tuyển dụng
                            </div>

                            <div id="server-load"></div>
                        </div>
                    </a>
                    <!-- Current server load -->

                    <!-- /current server load -->

                </div>

                <div class="col-lg-3">

                    <!-- Today's revenue -->
                    <a href="{{  route('admin.categories.index') }}">
                        <div class="panel bg-blue-400">
                            <div class="panel-body">


                                <h3 class="no-margin"><i class="icon-stack2"></i> {{ abbreviateNumber($categories) }}</h3>
                                Danh mục
                            </div>

                            <div id="today-revenue"></div>
                        </div>
                    </a>
                    <!-- /today's revenue -->

                </div>

                <div class="col-lg-3">

                    <!-- Today's revenue -->
                    <div class="panel bg-orange-400">
                        <div class="panel-body">

                            <h3 class="no-margin"><i class=" icon-users"></i> {{ abbreviateNumber($viewPage) }}</h3>
                            Lượt truy cập
                        </div>

                        <div id="today-revenue"></div>
                    </div>
                    <!-- /today's revenue -->

                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="icon-podium  position-left"></i>Top bài viết được xem
                                nhiều nhất
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table text-nowrap">
                                <tbody>
                                @foreach($postViewCount as $post)
                                    <tr>
                                        <td class="">
                                            <div class="media-left media-middle">
                                                <a href="{{ localized_route('cms.news.post',@$post->slug->content) }}">
                                                    @if($post->thumbnail)
                                                        <img style="width: 30px; height: 30px;object-fit: cover"
                                                             src="{{ $post->thumbnail }}" alt="">
                                                    @else
                                                        <img style="width: 30px; height: 30px;object-fit: cover"
                                                             src="{{ asset('assets/admin/images/default.jpg') }}"
                                                             alt="">
                                                    @endif
                                                </a>
                                            </div>

                                            <div class="media-body">
                                                <div class="media-heading text-break">
                                                    <a href="{{ localized_route('cms.news.post',@$post->slug->content) }}"
                                                       title="{{ $post->title }}"
                                                       class="letter-icon-title">{{ $post->title }}</a>
                                                </div>

                                                <div class="text-muted text-size-small">
                                                    <i class="icon-hour-glass text-size-mini position-left"></i> {{ @$post->textDatePublish }}
                                                    -
                                                    <i class="icon-user text-size-mini position-left"></i> {{ @$post->createBy->fullname }}
                                                </div>
                                            </div>
                                        </td>
                                        {{--                                        <td>--}}
                                        {{--                                            <span class="text-muted text-size-small">{{ @$post->textDatePublish }}</span>--}}
                                        {{--                                        </td>--}}
                                        <td class="text-center">
                                            <div><span class="text-semibold no-margin">{{ abbreviateNumber($post->view_count)}}</span>
                                                <span>lượt xem</span></div>
                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="icon-stats-growth  position-left"></i>Thống kê lượt truy cập 15 ngày gần nhất</div>
                        </div>
                        <div class="panel-body">
                            <div id="chart" style="height: calc(100vh - 481px); width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /dashboard content -->


            <!-- Footer -->
            @include('admin.includes.footer')
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>

    <script type="text/javascript">

        (async function createChart() {
            const res = await $.get('/admin/dashboard/view-page');
            const myChart = echarts.init(document.getElementById('chart'));

            const option = {
                tooltip: {},
                legend: {
                    data: ['Lượt truy cập']
                },
                xAxis: {
                    data: res.date
                },
                yAxis: {},
                series: [
                    {
                        name: 'Lượt truy cập',
                        type: 'bar',
                        data: res.value
                    }
                ]
            };

            myChart.setOption(option);
        })();


    </script>
@endsection
