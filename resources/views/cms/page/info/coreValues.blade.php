@extends('cms.layout.main')
@section('title')
    Giới thiệu - Tập đoàn HLY
@endsection
@section('content')
    <section class="introWrap" style="padding-top: 40px;">
        <div class="container">
            <div class="breadcrumb" style="margin: 20px 0;">
                <a href="/"><i class="fas fa-home"></i></a>
                <i class="fas fa-chevron-right"></i>
                <p><a href="/gioi-thieu">Giới thiệu công ty</a></p>
                <i class="fas fa-chevron-right"></i>
                <p>Tầm nhìn, sứ mệnh và giá trị cốt lõi</p>
            </div>
            <div class="content stagger-up" style="padding-top: 0px;">
                <div class="content stagger-up" style="padding-top: 0px;">
                    <div class="banner">
                        <img src="../assets/fe/images/introduce.jpg" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                        <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">TẦM NHÌN, SỨ MỆNH, GIÁ TRỊ CỐT LÕI</span>
                    </div>
                </div>
                <h2 class="title">{{__("TẦM NHÌN, SỨ MỆNH, GIÁ TRỊ CỐT LÕI")}}</h2>
                <p style="text-align: justify; font-size: 18px;"><strong>
                        {{__("Tầm nhìn")}}
                    </strong></p>
                <p style="text-align: justify; font-size: 18px;">{{__("Cùng mọi người xây dựng hạnh phúc cho mình và cho cộng đồng")}}</p>
                <p style="text-align: justify; font-size: 18px;"><strong>
                        {{__("Sứ mệnh")}}
                    </strong></p>
                <p style="text-align: justify; font-size: 18px;">{{__("Thức tỉnh ý thức và hành động chăm sóc sức khỏe cho mình và cho mọi người; vận dụng sáng tạo kiến thức Nam y để chăm sóc Nam nhân; xây dựng mô hình phân phối tốt nhất về thực phẩm và thảo dược thiên nhiên cho cộng đồng; tạo dựng hệ thống và phong cách chăm sóc sức khỏe cộng đồng hiệu quả trọn đời.")}}</p>
                <p style="text-align: justify; font-size: 18px;"><strong>
                        {{__("Giá trị cốt lõi")}}
                    </strong></p>
                <p style="text-align: justify; font-size: 18px;">{{__("HLY định hướng phát triển thành công ty đi đầu trong lĩnh vực ứng dụng Công nghệ xanh - thương mại dịch vụ - phong cách mới chăm sóc sức khỏe cộng đồng, không ngừng đổi mới, sáng tạo để kiến tạo hệ sinh thái với các sản phẩm phục vụ sức khỏe và môi trường của cộng đồng người Việt Nam. ")}}</p>
            </div>
        </div>
    </section>

@endsection
