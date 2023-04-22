@extends('cms.layout.main')
@section('title')
    Công nghệ - Công nghiệp - Công ty cổ phần xã hội HLY
@endsection
@section('content')

    <section class="bannerPd stagger-up" >
        <div class="content stagger-up">
            <div class="banner">
                <img src="../assets/fe/images/contact.jpg" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                <span style="position: absolute; white-space: nowrap; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">LĨNH VỰC TIÊN PHONG / THỰC PHÂM XANH</span>
            </div>
        </div>

        <div class="linkPage">
            <a  href="/linh-vuc-hoat-dong/cong-nghe-xanh">{{__("Công nghệ xanh")}}</a>
            <a  href="/linh-vuc-hoat-dong/thuong-mai-dich-vu">{{__("Thương mai dịch vụ")}}</a>
            <a class=active href="/linh-vuc-hoat-dong/thuc-pham-xanh">{{__("Thực phẩm xanh")}}</a>
            <a href="/linh-vuc-hoat-dong/nam-y-va-cham-soc-suc-khoe">{{__("Nam y và Chăm sóc sức khỏe")}}</a>
        </div>
        <select class="slNews js-select-redirect">
            <option value="/linh-vuc-hoat-dong/cong-nghe-xanh">{{__("Công nghệ xanh")}}</option>
            <option value="/linh-vuc-hoat-dong/thuong-mai-dich-vu">{{__("Thương mai dịch vụ")}}</option>
            <option selected=selected  value="/linh-vuc-hoat-dong/thuc-pham-xanh">{{__("Thực phẩm xanh")}}</option>
            <option value="/linh-vuc-hoat-dong/nam-y-va-cham-soc-suc-khoe">{{__("Nam y và Chăm sóc sức khỏe")}}</option>
        </select>
    </section>
    <section class="content" style="max-width: 1700px; padding: 0 20px; margin: 50px auto;">
        <h1 style="text-align:center; font-size: 54px;">{{__("THỰC PHẨM XANH")}}</h1>
        <h1 style="text-align:justify"><br/>
        </h1>
        <h2 style="text-align:justify"><span style="font-size:18pt"><span style="background-color:white"><strong><span
                            style="font-size:14.0pt">{{trans('cms.about_trade_service_1')}}</span></strong></span></span>
        </h2>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_2')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_3')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><strong><span
                            style="font-size:14.0pt">{{trans('cms.about_trade_service_4')}}</span></strong></span></span></p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_5')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_6')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_7')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_8')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_9')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_10')}}</span></span></span>
        </p>
        <div style="margin: 0 auto; width: 100%; text-align: center;">
            <img src="../assets/fe/images/contact.jpg" style="height: 500px; object-fit: cover; width: 70%; margin: 20px 0; ">
        </div>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_11')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_12')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_13')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_14')}}</span></span></span>
        </p>
        <p style="text-align:justify"><span style="font-size:12pt"><span style="background-color:white"><span
                        style="font-size:14.0pt">{{trans('cms.about_trade_service_15')}}</span></span></span>
        </p>
    </section>

    <section class="partnertPd">
        <div class="container">
            <h2 class="title">{{__("Các thương hiệu")}}</h2>
            <ul>
                <li>
                    <div class="item" style="display: flex; gap: 10px; align-items: center;">
                        <div style=" display: flex; flex-direction: column; width: 30%; justify-content: center; align-items: center; gap: 10px">
                            <span style="font-size: 20px; font-weight: 700;">HÀ YÊN</span>
                            <img src="../assets/fe/images/logo.png" alt="" style="width: 90%;">
                            <span style="text-align: center; font-weight: 600;">{{__("Cơ sương khớp")}}</span>
                        </div>
                        <div style="width: 70%">{{trans('cms.about_brand_title_1')}}</div>
                    </div>
                </li>
                <li>
                    <div class="item" style="display: flex; gap: 10px; align-items: center;">
                        <div style=" display: flex; flex-direction: column; width: 30%; justify-content: center; align-items: center; gap: 10px">
                            <span style="font-size: 20px; font-weight: 700;">HÀ YÊN</span>
                            <img src="../assets/fe/images/logo.png" alt="" style="width: 90%;">
                            <span style="text-align: center; font-weight: 600;">{{__("Cơ sương khớp")}}</span>
                        </div>
                        <div style="width: 70%">{{trans('cms.about_brand_title_2')}}</div>
                    </div>
                </li>
                <li>
                    <div class="item" style="display: flex; gap: 10px; align-items: center;">
                        <div style=" display: flex; flex-direction: column; width: 30%; justify-content: center; align-items: center; gap: 10px">
                            <span style="font-size: 20px; font-weight: 700;">HÀ YÊN</span>
                            <img src="../assets/fe/images/logo.png" alt="" style="width: 90%;">
                            <span style="text-align: center; font-weight: 600;">{{__("Cơ sương khớp")}}</span>
                        </div>
                        <div style="width: 70%">{{trans('cms.about_brand_title_3')}}</div>
                    </div>
                </li>
                <li>
                    <div class="item" style="display: flex; gap: 10px; align-items: center;">
                        <div style=" display: flex; flex-direction: column; width: 30%; justify-content: center; align-items: center; gap: 10px">
                            <span style="font-size: 20px; font-weight: 700;">HÀ YÊN</span>
                            <img src="../assets/fe/images/logo.png" alt="" style="width: 90%;">
                            <span style="text-align: center; font-weight: 600;">{{__("Cơ sương khớp")}}</span>
                        </div>
                        <div style="width: 70%">{{trans('cms.about_brand_title_4')}}</div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

@endsection
