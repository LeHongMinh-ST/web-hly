@extends('cms.layout.main')
@section('title')
    Giới thiệu - Tập đoàn Abc
@endsection
@section('content')
<section class="introWrap" style="padding-top: 40px;">
    <div class="container">
            <div class="breadcrumb">
                <a href="/"><i class="fas fa-home"></i></a>
                <i class="fas fa-chevron-right"></i>
                <p>Giới thiệu công ty</p>
            </div>
            <div class="content stagger-up">
                <div class="banner">
                    <img src="./assets/fe/images/hg1.jpg" style="height: 500px; object-fit: cover;">
                </div>
                <h2 class="title">{{__("CÔNG TY CỔ PHẦN XÃ HỘI HLY")}}</h2>
                <p style="text-align: justify; font-size: 18px;"><em>
                    {{__("Là một công ty cổ phần, được thành lập từ ngày 4/1/2023 tại Thành phố Hà Nội, Việt Nam. Với sự tham gia sáng lập của 7 thành viên, đến từ nhiều lĩnh vực như: Bất động sản, Luật sư, Nam y, Nông nghiệp và Xây dựng tạo thành một mái nhà chung là hệ sinh thái HLY. Đến ngày 12/1/2023, ra đời Công ty cổ phần Triệu Gia HLY tiền thân là Công ty TNHH Triệu Gia. Mô hình gia nhập vào đại gia đình hệ sinh thái HLY thông qua mô hình liên kết chéo cổ phần.")}}
                </em></p>
                <p style="text-align: justify; font-size: 18px;"><em>{{__("Công ty cổ phần xã hội HLY với 3 nhóm công nghệ tiên phong gồm:")}}</em></p>
                <p style="text-align: justify; font-size: 18px;"><em>{{__("- Công nghệ xanh")}}</em>
                <br /><em>{{__("- Thương mại Dịch vụ")}}</em>
                <br /><em>{{__("- Nam y và Chăm sóc sức khỏe")}}</em></p>
                <p style="text-align: justify; font-size: 18px;"><em>{{__("Với mong muốn đem đến cho mọi người, mọi gia đình có sức khỏe, thực phẩm xanh thân thiện với môi trường và môi trường sống trọn đời vui khỏe hạnh phúc.")}}</em></p>
            </div>
        </div>
    </section>
    <section id="itemPageWrap" class="itemPageWrap">
        <div class="container">
            <ul>
                <li>
                    <div>
                        <h3>Đội ngũ<br /> Nhân sự</h3>
                        <p>{{__("Tại HLY cũng như trong hệ sinh thái HLY, mỗi vị trí làm việc sẽ có những tiêu chuẩn riêng, song mọi thành viên đều đáp ứng yêu cầu: có trình độ chuyên môn, tâm huyết với nghề, có tinh thần trách nhiệm và kỉ luật cao ...")}}</p>
                        <a class="btn-2" href="#">
                            Xem chi ti&#7871;t
                        </a>
                    </div>
                </li>
                <li>
                    <div>
                        <h3>Tầm nhìn, Sứ mệnh<br /> và Giá trị cốt lõi</h3>
                        <p>{{__("Tầm nhìn cùng mọi người xây dựng hạnh phúc cho mình và cho cộng đồng. Sứ mệnh thức tỉnh ý thức và hành động chăm sóc sức khỏe cho mình và cho mọi người; vận dụng sáng tạo kiến thức Nam y để chăm sóc Nam nhân ...")}}</p>
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
    <section id="block1" class="partnerWrap bgGray">

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
        </div>
    </section>
@endsection
