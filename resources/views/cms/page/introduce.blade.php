@extends('cms.layout.main')
@section('title')
    Giới thiệu - Tập đoàn Abc
@endsection
@section('content')
<section class="introWrap" style="padding-top: 40px;">
    <div class="container">
            <div class="breadcrumb">
                <p>Giới thiệu HLY</p>
            </div>
            <div class="content stagger-up">
                <div class="banner">
                    <img src="./assets/fe/images/hg1.jpg" style="height: 500px; object-fit: cover;">
                </div>
                <h2 class="title">T&#7852;P ĐOÀN Abcgroup - CÔNG TY CP</h2>
                <p style="text-align: justify;"><em>Tiền th&acirc;n của Abcgroup l&agrave; Tập đo&agrave;n Technocom, th&agrave;nh lập năm 1993 tại Ucraina. Đầu những năm 2000, Technocom trở về Việt Nam, tập trung đầu tư v&agrave;o lĩnh vực du lịch v&agrave; bất động sản với hai thương hiệu chiến lược ban đầu l&agrave; Vinpearl v&agrave; Vincom. Đến th&aacute;ng 1/2012, c&ocirc;ng ty CP Vincom v&agrave; C&ocirc;ng ty CP Vinpearl s&aacute;p nhập, ch&iacute;nh thức hoạt động dưới m&ocirc; h&igrave;nh Tập đo&agrave;n với t&ecirc;n gọi Tập đo&agrave;n Abcgroup &ndash; C&ocirc;ng ty CP.</em></p>
                <p style="text-align: justify;"><em>3 nh&oacute;m hoạt động trọng t&acirc;m của Tập đo&agrave;n bao gồm:</em></p>
                <p style="text-align: justify;"><em>- C&ocirc;ng nghệ - C&ocirc;ng nghiệp</em><br /><em>- Thương mại Dịch vụ</em><br /><em>- Thiện nguyện X&atilde; hội</em></p>
                <p style="text-align: justify;"><em>Với mong muốn đem đến cho thị trường những sản phẩm - dịch vụ theo ti&ecirc;u chuẩn quốc tế v&agrave; những trải nghiệm ho&agrave;n to&agrave;n mới về phong c&aacute;ch sống hiện đại, ở bất cứ lĩnh vực n&agrave;o Abcgroup cũng chứng tỏ vai tr&ograve; ti&ecirc;n phong, dẫn dắt sự thay đổi xu hướng ti&ecirc;u d&ugrave;ng.&nbsp;</em></p>
            </div>
        </div>
    </section>
    <section id="itemPageWrap" class="itemPageWrap">
        <div class="container">
            <ul>
                <li>
                    <div>
                        <h3>Đội ngũ<br /> Nhân sự</h3>
                        <p>Tr&#7843;i qua ch&#7863;ng đư&#7901;ng dài trư&#7903;ng thành và phát tri&#7875;n, chính nh&#7919;ng con ngư&#7901;i Abcgroup đã làm nên nh&#7919;ng giá tr&#7883; t&#7889;t đ&#7865;p, đóng góp vào thành công c&#7911;a T&#7853;p
                            đoàn hôm nay.</p>
                        <a class="btn-2" href="#">
                            Xem chi ti&#7871;t
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <h3>Tầm nhìn, Sứ mệnh<br /> và Giá trị cốt lõi</h3>
                        <p>Abcgroup đ&#7863;t cho mình s&#7913; m&#7879;nh &quot;Vì m&#7897;t cu&#7897;c s&#7889;ng t&#7889;t đ&#7865;p hơn cho m&#7885;i ngư&#7901;i&quot;, v&#7899;i 3 tr&#7909; c&#7897;t c&#7889;t lõi là Công ngh&#7879; - Công nghi&#7879;p,
                            Thương m&#7841;i D&#7883;ch v&#7909;, Thi&#7879;n nguy&#7879;n Xã h&#7897;i.</p>
                        <a class="btn-2" href="#">
                            Xem chi ti&#7871;t
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <h3>Đối với<br /> Khách hàng</h3>
                        <p>T&#7841;o nên nh&#7919;ng s&#7843;n ph&#7849;m, d&#7883;ch v&#7909; có ch&#7845;t lư&#7907;ng t&#7889;i ưu, mang l&#7841;i s&#7921; hài lòng cho khách hàng &#7903; m&#7913;c đ&#7897; cao nh&#7845;t</p>
                        <a class="btn-2" href="#">
                            Xem chi ti&#7871;t
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    @include('cms.components.ecosystem')
    <section id="block1" class="partnerWrap">

        <div class="container">
            <div section="#block1" data="-200" class="copy paralax-hor">
                <h2 class="title">CÁC THƯƠNG HIỆU</h2>
                <p>V&#7899;i mong mu&#7889;n đem đ&#7871;n cho th&#7883; trư&#7901;ng nh&#7919;ng s&#7843;n ph&#7849;m - d&#7883;ch v&#7909; theo tiêu chu&#7849;n qu&#7889;c t&#7871; và nh&#7919;ng tr&#7843;i nghi&#7879;m hoàn toàn m&#7899;i v&#7873;
                    phong cách s&#7889;ng hi&#7879;n đ&#7841;i, &#7903; b&#7845;t c&#7913; lĩnh v&#7921;c nào Abcgroup cũng ch&#7913;ng t&#7887; vai trò tiên phong, d&#7851;n d&#7855;t s&#7921; thay đ&#7893;i xu hư&#7899;ng tiêu dùng.&#160;</p>
            </div>
            <ul section="#block1" data="200" class="crsPartner paralax-hor" style="display: flex; justify-content: space-evenly;">
                    <li style="width: 180px;">
                    <img style="width: 100%;" src="https://ircdn.vingroup.net/storage/public/2019/07/logo_Vinfast-20190724T075546806189.png">
                    <img style="width: 100%;" src="https://ircdn.vingroup.net/storage/public/2019/07/Logo_Vinsmart-20190724T080557080845.png">
                    </li>
                    <li style="width: 180px;">
                    <img style="width: 100%;" src="https://ircdn.vingroup.net/storage/public/2019/07/logo_Vinhomes-20190724T080402028663.png">
                    <img style="width: 100%;" src="https://ircdn.vingroup.net/storage/public/2019/07/logo_Vinpearl-20190724T075858560451.png">
                    </li><li style="width: 180px;">
                    <img style="width: 100%;" src="https://ircdn.vingroup.net/storage/public/2019/07/Logo_vinschool-20190724T080746392057.png">
                    <img style="width: 100%;" src="https://ircdn.vingroup.net/storage/public/2019/07/logo_Vinmec-20190724T080653218385.png">
                    </li><li style="width: 180px;">
                    <img style="width: 100%;" src="https://ircdn.vingroup.net/storage/public/2019/07/Logo_vinuni-20190724T080031613411.png">
                    <img style="width: 100%;" src="https://ircdn.vingroup.net/storage/Public/2022/VFP.png">
                    </li>
            </li>
        </ul>
                           <!-- <ul section="#block1" data="200" class="crsPartner paralax-hor">
                               <li>

                                   <img src="https://ircdn.Abcgroup.net/storage/public/2019/07/logo_Vinfast-20190724T075546806189.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/public/2019/07/Logo_Vinsmart-20190724T080557080845.png">
                               </li>
                               <li>
                                   <img src="https://ircdn.Abcgroup.net/storage/public/2019/07/logo_Vinhomes-20190724T080402028663.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/public/2019/07/logo_Vinpearl-20190724T075858560451.png">
                               </li>
                               <li>
                                   <img src="https://ircdn.Abcgroup.net/storage/public/2019/07/Logo_vinschool-20190724T080746392057.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/public/2019/07/logo_Vinmec-20190724T080653218385.png">
                               </li>
                               <li>
                                   <img src="https://ircdn.Abcgroup.net/storage/public/2019/07/Logo_vinuni-20190724T080031613411.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/Public/2022/VFP.png">
                               </li>
                               <li>
                                   <img src="https://ircdn.Abcgroup.net/storage/Public/2022/QTT.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/public/2019/07/logo_Vincom-20190724T080508073752.png">
                               </li>
                               <li>
                                   <img src="https://ircdn.Abcgroup.net/storage/Public/2022/VinIF.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/Uploads/Logos/VinAI.png">
                               </li>
                               <li>
                                   <img src="https://ircdn.Abcgroup.net/storage/Uploads/Logos/2021/Vinbigdata.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/Uploads/Logos/CSS.png">
                               </li>
                               <li>
                                   <img src="https://ircdn.Abcgroup.net/storage/Public/2022/Logo Vinbiocare.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/Public/VinHMS Logo.png">
                               </li>
                               <li>
                                   <img src="https://ircdn.Abcgroup.net/storage/Uploads/Logos/2021/Vinbus.png">
                                   <img src="https://ircdn.Abcgroup.net/storage/Public/logo-VB.png">
                               </li>
                               <li>
                               </li>
                           </ul> -->
        </div>
    </section>
@endsection
