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
                <p>Đối với khách hàng</p>
            </div>
            <div class="content stagger-up" style="padding-top: 0px;">
                <div class="content stagger-up" style="padding-top: 0px;">
                    <div class="banner">
                        <img src="../assets/fe/images/introduce.jpg" style="filter: brightness(50%); height: 500px; object-fit: cover; width: 100%">
                        <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; font-weight: bold; color: white;">ĐỐI VỚI KHÁCH HÀNG</span>
                    </div>
                </div>
                <h2 class="title">{{__("ĐỐI VỚI KHÁCH HÀNG")}}</h2>
                <p style="text-align: justify; font-size: 18px;"><strong>
                        {{__("Hành động")}}
                    </strong></p>
                <p style="text-align: justify; font-size: 18px;">{{__("Nghiên cứu, phân tích, đánh giá và tổng hợp nhu cầu, mong muốn, nguyện vọng của khách hàng một cách sâu sắc và toàn diện (dưới các góc độ: kinh tế, văn hóa, chính trị, xã hội, nghệ thuật…)")}}</p>
                <p style="text-align: justify; font-size: 18px;">{{__("Nghiên cứu, thiết kế và đầu tư xây dựng hệ thống sản phẩm, dịch vụ với chất lượng tốt nhất, đáp ứng tối đa nhu cầu và mang lại sự hài lòng cho khách hàng")}}</p>
                <p style="text-align: justify; font-size: 18px;">{{__("Xây dựng văn hóa kinh doanh dựa trên phương châm “Lấy khách hàng làm trọng tâm”, mọi hoạt động của Công ty và nhân viên đều hướng tới mục tiêu cao nhất là thỏa mãn nhu cầu của khách hàng, luôn đặt mình vào vị trí của khách hàng để đánh giá và xem xét mọi vấn đề")}}</p>
                <p style="text-align: justify; font-size: 18px;">{{__("Xây dựng hệ thống nguyên tắc giao tiếp, ứng xử đối với khách hàng dành cho cán bộ nhân viên, trong đó quy định rõ chức năng, nhiệm vụ và các hành vi chuẩn mực cần thực hiện.")}}</p>
                <p style="text-align: justify; font-size: 18px;">{{__("Thực hiện các chương trình chăm sóc khách hàng với nhiều nội dung hấp dẫn, thiết thực, đảm bảo quyền lợi và gia tăng lợi ích cho khách hàng.")}}</p>
            </div>
        </div>
    </section>
@endsection
