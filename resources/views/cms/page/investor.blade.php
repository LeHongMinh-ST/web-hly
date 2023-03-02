@extends('cms.layout.main')
@section('title')
    Nhà đầu tư - Tập đoàn Abc
@endsection

@section('content')
    <div class="inventorsWrap">
        <div class="container">
            <ul class="listCateInvestor" >
                <div class="item cate-1">
                    <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                    <h2>ĐẠI HỘI CỔ ĐÔNG</h2>
                    <div class="content">
                        <div class="img" style="background: url('./assets/fe/images/hl1.jpg') center">
                            <img src="./assets/fe/images/thumb-cate.gif">
                        </div>
                        <div class="copy">
                            <!-- <p>- Sản xuất thuốc</p> -->
                            <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                        </div>
                    </div>
                    <a class="link" href="/linh-vuc-hoat-dong"></a>
                </div>
                <div class="item cate-3">
                    <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                    <h2>CÔNG BỐ THÔNG TIN</h2>
                    <div class="content">
                        <div class="img" style="background: url('./assets/fe/images/hl2.jpg') center">
                            <img src="./assets/fe/images/thumb-cate.gif">
                        </div>
                        <div class="copy">
                            <!-- <p>- Du lịch nghỉ dưỡng</p>
                            <p>- Dưỡng sinh</p> -->
                            <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                        </div>
                    </div>
                    <a class="link" href="/linh-vuc-hoat-dong"></a>
                </div>
                <div class="item cate-3">
                        <div class="ico"><img src="./assets/fe/images/b.gif"></div>
                        <h2>QUẢN TRỊ CÔNG TY</h2>
                        <div class="content">
                            <div class="img" style="background: url('./assets/fe/images/hg1.jpg') center">
                                <img src="./assets/fe/images/thumb-cate.gif">
                            </div>
                            <div class="copy text-white">
                                <a class="btn-2" href="/linh-vuc-hoat-dong">Xem thêm</a>
                            </div>
                        </div>
                        <a class="link" href="/linh-vuc-hoat-dong"></a>
                    </div>
            </ul>
        </div>
    </div>
    @include('cms.components.partners')
@endsection
