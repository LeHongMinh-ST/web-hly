@extends('cms.layout.main')
@section('title')
    Nhà đầu tư - Tập đoàn Abc
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
                    <div class="title1">
                        Giá cuối cùng (tính bằng VNĐ)
                    </div>
                    <div class="title2">
                        <img src="./assets/fe/images/icons/green.PNG">
                        <div class="bigTitle">
                            81,300.00
                        </div>
                        <div class="smallTitle">
                            +600.00(+0,74%)
                        </div>
                    </div>
                    <div class="title3">
                        Tại ngày 9 tháng 2, 2023
                    </div>
                </div>
                <div class="chart">
                    <img src="./assets/fe/images/chartDemo.PNG">
                </div>
            </div>
            <div class="newWrap">
                <img src="./assets/fe/images/world.PNG">

            </div>
        </div>

    </div>
    @include('cms.components.partners')
@endsection
