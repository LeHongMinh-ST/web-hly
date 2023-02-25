@extends('cms.layout.main')
@section('title')
    Nhà đầu tư - Tập đoàn Abc
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('/assets/fe/js/libraries/canvasjs.stock.min.js') }}"></script>

    <script type="text/javascript">
      window.onload = function () {
        var dataPoints = [];
        var stockChart = new CanvasJS.StockChart("stockChartContainer",{
          charts: [{
            data: [{
              type: "splineArea",
              color: "#ff9357",
              yValueFormatString: "€1 = $#,###.##",
              dataPoints : dataPoints
            }]
          }],
          rangeSelector: {
            enabled: false
      },
        });
        $.getJSON("https://canvasjs.com/data/gallery/stock-chart/usdeur.json", function(data) {
          for(var i = 0; i < data.length; i++){
            dataPoints.push({x: new Date(data[i].date), y: Number(data[i].price)});
          }
          stockChart.render();
        });
      }
    </script>
@endsection
@section('content')
    <div class="inventorsWrap">
        <div class="container">
            <div class="events">
                <div class="item-event">
                    <div class="top">
                        <div class="title-event">Đại hội cổ đông</div>
                        <div class="description-event">
                            <p class="content">
                                <img src="./assets/fe/images/icons/right.png">
                                Nghị quyết và biên bản đại hội cổ đông 2022
                            </p>
                            <p class="content">
                                <img src="./assets/fe/images/icons/right.png">
                                Lorem ipsum dolor sit amet, consectetur.
                            </p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="icon-event">
                            <img src="./assets/fe/images/icons/icon1.png">
                        </div>
                        <div class="show-more-text">
                            <a href="#">
                                <span>XEM THÊM</span>
                                <img src="./assets/fe/images/icons/right.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item-event">
                    <div class="top">
                        <div class="title-event">Đại hội cổ đông</div>
                        <div class="description-event">
                            <p class="content">
                                <img src="./assets/fe/images/icons/right.png">
                                Lorem ipsum dolor sit amet, consectetur.
                            </p>
                            <p class="content">
                                <img src="./assets/fe/images/icons/right.png">
                                Lorem ipsum dolor sit amet, consectetur.
                            </p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="icon-event">
                            <img src="./assets/fe/images/icons/icon1.png">
                        </div>
                        <div class="show-more-text">
                            <a href="#">
                                <span>XEM THÊM</span>
                                <img src="./assets/fe/images/icons/right.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item-event">
                    <div class="top">
                        <div class="title-event">Đại hội cổ đông</div>
                        <div class="description-event">
                            <p class="content">
                                <img src="./assets/fe/images/icons/right.png">
                                Lorem ipsum dolor sit amet, consectetur.
                            </p>
                            <p class="content">
                                <img src="./assets/fe/images/icons/right.png">
                                Lorem ipsum dolor sit amet, consectetur.
                            </p>
                            <p class="content">
                                <img src="./assets/fe/images/icons/right.png">
                                Lorem ipsum dolor sit amet, consectetur.
                            </p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="icon-event">
                            <img src="./assets/fe/images/icons/icon1.png">
                        </div>
                        <div class="show-more-text">
                            <a href="#">
                                <span>XEM THÊM</span>
                                <img src="./assets/fe/images/icons/right.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stockInformation">
            <div class="chartStockWrap">
                <div class="titleChartWrap">
                    THÔNG TIN CỔ PHIẾU
                </div>
                <div class="titleChart">
                    <div class="titleStock1">
                        Giá cuối cùng (tính bằng VNĐ)
                    </div>
                    <div class="titleStock2">
                        <img src="./assets/fe/images/icons/green.PNG">
                        <div class="bigTitle">
                            81,300.00
                        </div>
                        <div class="smallTitle">
                            +600.00(+0,74%)
                        </div>
                    </div>
                    <div class="titleStock3">
                        Tại ngày 9 tháng 2, 2023
                    </div>
                </div>
                <div class="chart">
                    <div>
                        <div id="stockChartContainer" style="height: 450px; width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="newWrap">
                <img class="bgWrap" src="./assets/fe/images/world.PNG">
                <div class="contentWrap">
                    <div class="titleContentLeft">
                        THÔNG CÁO BÁO CHÍ
                    </div>
                    <div class="descriptionContentLeft">
                        FPT Software là đối tác chến lược triển khai nhà máy thông minh cho Jullie Sandue
                    </div>
                    <div class="show-more-text">
                        XEM THÊM
                        <img class="ar" src="./assets/fe/images/ar-w.png">
                    </div>
                </div>
            </div>
        </div>
        <section class="newsHomeWrap">
            <div class="container paralax">
                <a href="/tin-tuc-su-kien.html">
                    <h2 class="title" style="text-align: center">Tin tức nhà đầu tư</h2>
                </a>
                <div class="newsHomeList" style="display: flex; gap: 20px">
                @php($i=0)
                @foreach($posts as $post)
                    @if($i < 4)
                        <!-- <div> -->
                            <div class="itemNews" style="width: 25%; padding: 0 10px">
                                <div class="img">
                                    <div style="background: url('{{ $post->thumbnail }}') center; width: 100%; height: 250px; object-fit: cover"></div>
                                    <img src="{{ $post->thumbnail }}" style="width: 100%; height: 250px;">
                                </div>
                                <div class="copy">
                                    <h4>Tin {{$post->categories[0]->name}}</h4>
                                    <h3>{{$post->title}}</h3>
                                    <p>{{date_format(date_create($post->created_at), 'd-m-Y')}}</p>
                                </div>
                                <a class="link" href="/tin-tuc-su-kien/bai-viet/{{$post->slug?->content}}"></a>
                            </div>
                            <!-- </div> -->
                        @endif
                        @php($i++)
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    @include('cms.components.partners')
@endsection
