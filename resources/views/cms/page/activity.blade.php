@extends('cms.layout.main')
@section('title')
    Công nghệ - Công nghiệp - Công ty cổ phần xã hội HLY
@endsection
@section('content')

    <section class="bannerPd stagger-up" style="padding-top: 40px;">


        <img src="./assets/fe/images/hl3.jpg">


        <div class="linkPage">
            <a class=active href="/linh-vuc-hoat-dong/cong-nghe-br-cong-nghiep">Công ngh&#7879; - Công nghi&#7879;p</a>
            <a href="/linh-vuc-hoat-dong/thuong-mai-br-dich-vu">Thương m&#7841;i D&#7883;ch v&#7909;</a>
            <a href="/linh-vuc-hoat-dong/thien-nguyen-br-xa-hoi">Thi&#7879;n nguy&#7879;n Xã h&#7897;i</a>
        </div>
        <select class="slNews js-select-redirect">
            <option selected=selected value="/linh-vuc-hoat-dong/cong-nghe-br-cong-nghiep">Công ngh&#7879; - Công nghi&#7879;p</option>
            <option value="/linh-vuc-hoat-dong/thuong-mai-br-dich-vu">Thương m&#7841;i D&#7883;ch v&#7909;</option>
            <option value="/linh-vuc-hoat-dong/thien-nguyen-br-xa-hoi">Thi&#7879;n nguy&#7879;n Xã h&#7897;i</option>
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
                    <div class="item">
                        <a href="#">
                            <img src="./assets/fe/images/hg3.jpg">
                        </a>
                        <div>
                            <h2>HLYFast</h2>
                            <a href="#" target="_blank">HLYfastauto.com</a>
                        </div>
                        <p>Là thương hi&#7879;u ô tô Vi&#7879;t Nam, HLYFast hư&#7899;ng t&#7847;m nhìn tr&#7903; thành
                            hãng xe đi&#7879;n thông minh toàn c&#7847;u.</p>
                        <a class="btn-2" href="#">Xem chi ti&#7871;t</a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <a href="#">
                            <img src="./assets/fe/images/hg2.jpg">
                        </a>
                        <div>
                            <h2>HLYSmart</h2>
                            <a href="." target="_blank"></a>
                        </div>
                        <p>Công ty Nghiên c&#7913;u và S&#7843;n xu&#7845;t HLYSmart là đơn v&#7883; tiên phong trong
                            lĩnh v&#7921;c công ngh&#7879; v&#7899;i s&#7913; m&#7879;nh tr&#7903; thành công ty công
                            ngh&#7879; toàn c&#7847;u, ki&#7871;n t&#7841;o
                            nh&#7919;ng s&#7843;n ph&#7849;m đi&#7879;n t&#7917; và công ngh&#7879; thông minh, ch&#7845;t
                            lư&#7907;ng, &#7913;ng d&#7909;ng trí tu&#7879; nhân t&#7841;o AI và k&#7871;t n&#7889;i v&#7899;i
                            các thi&#7871;t b&#7883;
                            trên n&#7873;n t&#7843;ng IoT.</p>
                        <a class="btn-2" href="#">Xem chi ti&#7871;t</a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <a href="#">
                            <img src="./assets/fe/images/hg3.jpg">
                        </a>
                        <div>
                            <h2>HLYAI</h2>
                            <a href="#" target="_blank">www.HLYai.io</a>
                        </div>
                        <p>Công ty C&#7893; ph&#7847;n Nghiên c&#7913;u và &#7912;ng d&#7909;ng Trí tu&#7879; nhân t&#7841;o
                            HLYAI, ti&#7873;n thân là Vi&#7879;n nghiên c&#7913;u Trí tu&#7879; nhân t&#7841;o
                            HLYAI.</p>
                        <a class="btn-2" href="#">Xem chi ti&#7871;t</a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <a href="#">
                            <img src="./assets/fe/images/hl1.jpg">
                        </a>
                        <div>
                            <h2>HLYBigdata </h2>
                            <a href="#" target="_blank">HLYbigdata.org</a>
                        </div>
                        <p>Công ty C&#7893; ph&#7847;n HLYBigData đư&#7907;c thành l&#7853;p trên n&#7873;n t&#7843;ng
                            thành qu&#7843; nghiên c&#7913;u khoa h&#7885;c c&#7911;a Vi&#7879;n Nghiên c&#7913;u D&#7919;
                            Li&#7879;u l&#7899;n (thu&#7897;c T&#7853;p
                            đoàn HLYgroup) trong lĩnh v&#7921;c&#160;Khoa H&#7885;c D&#7919; Li&#7879;u và Trí Tu&#7879;
                            Nhân T&#7841;o, đ&#7863;c bi&#7879;t v&#7873; x&#7917; lý hình &#7843;nh và ngôn
                            ng&#7919;.</p>
                        <a class="btn-2" href="#">Xem chi ti&#7871;t</a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <a href="#">
                            <img src="./assets/fe/images/hl2.jpg">
                        </a>
                        <div>
                            <h2>HLYCSS </h2>
                            <a href="#" target="_blank">HLYcss.net</a>
                        </div>
                        <p>Công ty TNHH D&#7883;ch v&#7909; An ninh m&#7841;ng HLYCSS ho&#7841;t đ&#7897;ng chính trong
                            lĩnh v&#7921;c nghiên c&#7913;u &#8211; phát tri&#7875;n, s&#7843;n xu&#7845;t và cung c&#7845;p
                            các s&#7843;n ph&#7849;m, d&#7883;ch
                            v&#7909; an ninh m&#7841;ng toàn di&#7879;n - thông minh - t&#7921; đ&#7897;ng và xác th&#7921;c
                            m&#7841;nh không m&#7853;t kh&#7849;u.</p>
                        <a class="btn-2" href="#">Xem chi ti&#7871;t</a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <a href="#">
                            <img src="./assets/fe/images/hg2.jpg">
                        </a>
                        <div>
                            <h2>HLYHMS</h2>
                            <a href="https://www.HLYhms.com/en/" target="_blank">www.HLYhms.com</a>
                        </div>
                        <p>HLYHMS là công ty s&#7843;n xu&#7845;t và kinh doanh ph&#7847;n m&#7873;m, chuyên cung c&#7845;p
                            nh&#7919;ng s&#7843;n ph&#7849;m công ngh&#7879; ch&#7845;t lư&#7907;ng cao nh&#7857;m t&#7889;i
                            ưu hóa ho&#7841;t đ&#7897;ng
                            kinh doanh c&#7911;a doanh nghi&#7879;p.</p>
                        <a class="btn-2" href="#">Xem chi ti&#7871;t</a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <a href="#">
                            <img src="./assets/fe/images/hg1.jpg">
                        </a>
                        <div>
                            <h2>HLYBrain</h2>
                            <a href="#" target="_blank">HLYbrain.net</a>
                        </div>
                        <p>HLYBrain là công ty công ngh&#7879; tiên phong phát tri&#7875;n các s&#7843;n ph&#7849;m
                            &#7913;ng d&#7909;ng trí tu&#7879; nhân t&#7841;o (AI) cho Y T&#7871;.</p>
                        <a class="btn-2" href="#">Xem chi ti&#7871;t</a>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <a href="#">
                            <img src="./assets/fe/images/hg1.jpg">
                        </a>
                        <div>
                            <h2>HLYBrain</h2>
                            <a href="https://HLYbrain.net/" target="_blank">HLYbrain.net</a>
                        </div>
                        <p>HLYBrain là công ty công ngh&#7879; tiên phong phát tri&#7875;n các s&#7843;n ph&#7849;m
                            &#7913;ng d&#7909;ng trí tu&#7879; nhân t&#7841;o (AI) cho Y T&#7871;.</p>
                        <a class="btn-2" href="#">Xem chi ti&#7871;t</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

@endsection
