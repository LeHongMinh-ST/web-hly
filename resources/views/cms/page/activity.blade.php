@extends('cms.layout.main')
@section('title')
    Công nghệ - Công nghiệp - Công ty cổ phần xã hội HLY
@endsection
@section('content')

    <section class="bannerPd stagger-up" >


        <img src="./assets/fe/images/hl3.jpg">


        <div class="linkPage">
            <a class=active href="/linh-vuc-hoat-dong/cong-nghe-br-cong-nghiep">{{__("Công nghệ xanh")}}</a>
            <a href="/linh-vuc-hoat-dong/thuong-mai-br-dich-vu">{{__("Thương mai dịch vụ")}}</a>
            <a href="/linh-vuc-hoat-dong/thien-nguyen-br-xa-hoi">{{__("Thực phẩm xanh")}}</a>
            <a href="/linh-vuc-hoat-dong/thien-nguyen-br-xa-hoi">{{__("Nam y và Chăm sóc sức khỏe")}}</a>
        </div>
        <select class="slNews js-select-redirect">
            <option selected=selected value="/linh-vuc-hoat-dong/cong-nghe-br-cong-nghiep">{{__("Công nghệ xanh")}}</option>
            <option value="/linh-vuc-hoat-dong/thuong-mai-br-dich-vu">{{__("Thương mai dịch vụ")}}</option>
            <option value="/linh-vuc-hoat-dong/thien-nguyen-br-xa-hoi">{{__("Thực phẩm xanh")}}</option>
            <option value="/linh-vuc-hoat-dong/thien-nguyen-br-xa-hoi">{{__("Nam y và Chăm sóc sức khỏe")}}</option>
        </select>
    </section>
    <section class="infoDetailPd stagger-up">
        <div class="container">
            <h2 class="title">Thông tin chi ti&#7871;t</h2>

        </div>
    </section>
    <section class="historyPd">
        <div class="container">
            <div section=".historyPd" data="-200" class="img paralax-hor">
                <img src="./assets/fe/images/hl1.jpg">
            </div>
            <div section=".historyPd" data="200" class="copy paralax-hor">
                <div>
                    <h2>2022</h2>
                    <h3>Công nghệ <br> - Công nghiệp</h3>
                    <p>HLYgroupđ&#7863;t cho mình s&#7913; m&#7879;nh &quot;Vì m&#7897;t cu&#7897;c s&#7889;ng t&#7889;t
                        đ&#7865;p hơn cho m&#7885;i ngư&#7901;i&quot;, v&#7899;i 3 nhóm ho&#7841;t đ&#7897;ng tr&#7885;ng
                        tâm là Công ngh&#7879; - Công
                        nghi&#7879;p, Thương m&#7841;i D&#7883;ch v&#7909;, Thi&#7879;n nguy&#7879;n Xã h&#7897;i.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="partnertPd">
        <div class="container">
            <h2 class="title">Các thương hi&#7879;u</h2>
            <ul>
                <li>
                    <div class="item" style="display: flex; gap: 10px; align-items: center;">
                        <div style=" display: flex; flex-direction: column; width: 30%; justify-content: center; align-items: center; gap: 10px">
                            <span style="font-size: 20px; font-weight: 700;">HÀ YÊN</span>
                            <img src="../assets/fe/images/logo.png" alt="" style="width: 90%;">
                            <span style="text-align: center; font-weight: 600;">Cơ sương khớp</span>
                        </div>
                        <div style="width: 70%">Thương hiệu chăm sóc sức khỏe xương khớp, hồi phục thể lực sau chấn thương</div>
                    </div>
                </li>
                <li>
                    <div class="item" style="display: flex; gap: 10px; align-items: center;">
                        <div style=" display: flex; flex-direction: column; width: 30%; justify-content: center; align-items: center; gap: 10px">
                            <span style="font-size: 20px; font-weight: 700;">HÀ YÊN</span>
                            <img src="../assets/fe/images/logo.png" alt="" style="width: 90%;">
                            <span style="text-align: center; font-weight: 600;">Cơ sương khớp</span>
                        </div>
                        <div style="width: 70%">Thương hiệu chăm sóc sức khỏe xương khớp, hồi phục thể lực sau chấn thương</div>
                    </div>
                </li>
                <li>
                <div class="item" style="display: flex; gap: 10px; align-items: center;">
                        <div style=" display: flex; flex-direction: column; width: 30%; justify-content: center; align-items: center; gap: 10px">
                            <span style="font-size: 20px; font-weight: 700;">HÀ YÊN</span>
                            <img src="../assets/fe/images/logo.png" alt="" style="width: 90%;">
                            <span style="text-align: center; font-weight: 600;">Cơ sương khớp</span>
                        </div>
                        <div style="width: 70%">Thương hiệu chăm sóc sức khỏe xương khớp, hồi phục thể lực sau chấn thương</div>
                    </div>
                </li>
                <li>
                <div class="item" style="display: flex; gap: 10px; align-items: center;">
                        <div style=" display: flex; flex-direction: column; width: 30%; justify-content: center; align-items: center; gap: 10px">
                            <span style="font-size: 20px; font-weight: 700;">HÀ YÊN</span>
                            <img src="../assets/fe/images/logo.png" alt="" style="width: 90%;">
                            <span style="text-align: center; font-weight: 600;">Cơ sương khớp</span>
                        </div>
                        <div style="width: 70%">Thương hiệu chăm sóc sức khỏe xương khớp, hồi phục thể lực sau chấn thương</div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

@endsection
